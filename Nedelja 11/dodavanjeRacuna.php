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
?>

<!doctype html>
<html>
    <head>
        <title>Dodavanje novog računa</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="main.css"; />
    </head>
    <body>
        <div id="logo-wrapper">
            <img id="logo" alt="banka" src="https://clipartart.com/images/bank-clipart-free-2.jpg"/>
        </div>
        <hr />
        <h1>
            Dodavanje novog računa
        </h1>
        <ul>
            <li>
                <a href="index.php">Povratak na spisak računa</a>
            </li>
        </ul>
        <hr/>
        <form action="dodavanjeRacunaDB.php" method="POST">
            <div>
                <div>
                    <label for="brojRacuna">Broj računa</label>
                </div>
                <div>
                    <input type="text" name="brojRacuna" required />
                </div>
            </div>
            <div>
                <div>
                    <label for="prezime">Iznos</label>
                </div>
                <div>
                    <input type="number" name="iznos" required />
                </div>
            </div>
            <div>
                <div>
                    <label for="klijentId">Klijent</label>
                </div>
                <div>
                    <select name="klijentId">
                        <?php foreach($klijenti as $klijent): ?>
                        <option value="<?php echo $klijent->idKlijent; ?>"><?php echo $klijent->Ime; ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
            </div>

            <button type="submit">
                Dodaj
            </button>
        </form>
    </body>
</html>