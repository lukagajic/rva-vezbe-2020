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

    $query = 'SELECT * FROM Racun';
    $result = mysqli_query($bp, $query);

    if(!$result) {
        die('Došlo je do greške prilikom izvršavanja upita!');
    }

    $racuni = [];

    while($row = mysqli_fetch_object($result)) {
        array_push($racuni, $row);
    }

    $query = 'SELECT * FROM Klijent';

    $result = mysqli_query($bp, $query);

    if(!$result) {
        die('Došlo je do greške prilikom izvršavanja upita!');
    }

    $klijenti = [];

    while($row = mysqli_fetch_object($result)) {
        $klijenti[$row->idKlijent] = $row;
    }


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pregled računa</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="main.css"; />
    </head>
    <body>
        <div id="logo-wrapper">
            <img id="logo" alt="banka" src="https://clipartart.com/images/bank-clipart-free-2.jpg"/>
        </div>
        <hr />
        <h1>
            Pregled računa
        </h1>
        <ul>
            <li>
                <a href="dodavanjeRacuna.php">Dodaj novi račun</a>
            </li>
            <li>
                <a href="dodavanjeKlijenta.php">Dodaj novog klijenta</a>
            </li>
            <li>
                <a href="klijenti.php">Lista svih klijenata</a>
            </li>
        </ul>
        <hr/>
        <?php if($racuni): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>
                           ID
                        </th>
                        <th>
                           Klijent
                        </th>
                        <th>
                           Broj računa
                        </th>
                        <th>
                           Iznos
                        </th>
                        <th colspan="2">
                            Akcije
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($racuni as $racun): ?>
                        <tr>
                            <td>
                                <?php echo $racun->idRacun; ?>
                            </td>
                            <td>
                                <?php echo $klijenti[$racun->Klijent_id]->Ime; ?>
                            </td>
                            <td>
                                <?php echo $racun->Broj_racuna; ?>
                            </td>
                            <td>
                                <?php echo $racun->Iznos; ?>
                            </td>
                            <td>
                                <a href="izmenaRacuna.php?racunId=<?php echo $racun->idRacun; ?>">
                                    Izmeni
                                </a>
                            </td>
                            <td>
                                <a onclick="if(!confirm('Da li ste sigurni da želite da obrišete račun: <?php echo $racun->Broj_racuna; ?>?')) return false;" href="brisanjeRacuna.php?racunId=<?php echo $racun->idRacun; ?>">
                                    Obriši
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>
                Ne postoji nijedan račun u bazi podataka!
            </p>
        <?php endif; ?>
    </body>
</html>