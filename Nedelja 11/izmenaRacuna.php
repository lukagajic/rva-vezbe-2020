<?php
    $racunId = filter_input(INPUT_GET, 'racunId', FILTER_SANITIZE_NUMBER_INT);

    $bp = mysqli_connect(
        '192.168.55.32',
        'S2017200046_V11',
        'S2017200046_V11',
        'S2017200046_V11'
    );

    if(!$bp) {
        die('Došlo je do greške prilikom povezivanja na bazu podataka!');
    }

    $query = "SELECT * FROM Racun WHERE idRacun = $racunId";
    $result = mysqli_query($bp, $query);

    if(!$result) {
        die('Došlo je do greške prilikom izvršavanja upita!');
    }

    if(mysqli_num_rows($result) != 1) {
        die('Ne postoji knjiga sa datim identifikatorom');
    }

    $racun = mysqli_fetch_object($result);

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
            Izmena računa
        </h1>
        <ul>
            <li>
                <a href="index.php">Povratak na spisak računa</a>
            </li>
        </ul>
        <hr/>
        <form action="izmenaRacunaDB.php" method="POST">
            <div>
                <div>
                    <label for="racunId">ID</label>
                </div>
                <div>
                    <input readonly value="<?php echo $racun->idRacun; ?>" type="text" name="racunId" required />
                </div>
            </div>
            <div>
                <div>
                    <label for="brojRacuna">Broj računa</label>
                </div>
                <div>
                    <input value="<?php echo $racun->Broj_racuna; ?>" type="text" name="brojRacuna" required />
                </div>
            </div>
            <div>
                <div>
                    <label for="prezime">Iznos</label>
                </div>
                <div>
                    <input value="<?php echo $racun->Iznos; ?>" type="number" name="iznos" required />
                </div>
            </div>
            <div>
                <div>
                    <label for="klijentId">Klijent</label>
                </div>
                <div>
                    <select name="klijentId">
                        <?php foreach($klijenti as $klijent): ?>
                        <?php if($klijent->idKlijent == $racun->Klijent_id): ?>
                            <option selected value="<?php echo $klijent->idKlijent; ?>"><?php echo $klijent->Ime; ?></option>
                        <?php else: ?>
                            <option value="<?php echo $klijent->idKlijent; ?>"><?php echo $klijent->Ime; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                </div>
            </div>

            <button type="submit">
                Izmeni
            </button>
        </form>
    </body>
</html>