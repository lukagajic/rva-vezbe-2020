<?php
    $bp = mysqli_connect(
        '192.168.55.32',
        'S2017200046_V11',
        'S2017200046_V11',
        'S2017200046_V11'
    );

    if(!$bp) {
        die('Došlo je do greške prilikom povezivanja na bazu podataka!');
    }

    $query = 'SELECT * FROM Klijent';
    $result = mysqli_query($bp, $query);

    if(!$result) {
        die('Došlo je do greške prilikom izvršavanja upita!');
    }

    $klijenti = [];

    while($row = mysqli_fetch_object($result)) {
        array_push($klijenti, $row);
    }

    $query = 'SELECT Klijent_id, IFNULL(SUM(Iznos), 0) AS suma FROM Racun GROUP BY Klijent_id';
    $result = mysqli_query($bp, $query);

    if(!$result) {
        die('Došlo je do greške prilikom izvršavanja upita!');
    }

    $sume = [];

    while($row = mysqli_fetch_object($result)) {
        $sume[$row->Klijent_id] = $row;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pregled klijenata</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="main.css"; />
    </head>
    <body>
        <div id="logo-wrapper">
            <img id="logo" alt="banka" src="https://clipartart.com/images/bank-clipart-free-2.jpg"/>
        </div>
        <hr />
        <h1>
            Pregled klijenata
        </h1>
        <ul>
            <li>
                <a href="index.php">Povratak na listu računa</a>
            </li>
            <li>
                <a href="dodavanjeKlijenta.php">Dodaj novog klijenta</a>
            </li>
        </ul>
        <hr/>
        <?php if($klijenti): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>
                           ID
                        </th>
                        <th>
                           Ime
                        </th>
                        <th>
                           Zbirno
                        </th>
                        <th colspan="2">
                            Akcije
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($klijenti as $klijent): ?>
                        <tr>
                            <td>
                                <?php echo $klijent->idKlijent; ?>
                            </td>
                            <td>
                                <?php echo $klijent->Ime; ?>
                            </td>
                            <td>
                                <?php 
                                    if(!empty($sume[$klijent->idKlijent])) {
                                        echo $sume[$klijent->idKlijent]->suma;
                                    } else {
                                        echo 0;
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="izmenaKlijenta.php?klijentId=<?php echo $klijent->idKlijent; ?>">
                                    Izmeni
                                </a>
                            </td>
                            <td>
                                <a onclick="if(!confirm('Da li ste sigurni da želite da obrišete klijenta: <?php echo $klijent->Ime; ?>?')) return false;" href="brisanjeKlijenta.php?klijentId=<?php echo $klijent->idKlijent; ?>">
                                    Obriši
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>
                Ne postoji nijedan klijent u bazi podataka!
            </p>
        <?php endif; ?>
        <p class="warning">
            NAPOMENA: Brisanjem klijenta se brišu i svi njegovi računi iz baze podataka!
        </p>
    </body>
</html>