<?php
    $klijentId = filter_input(INPUT_GET, 'klijentId', FILTER_SANITIZE_NUMBER_INT);

    $bp = mysqli_connect(
        '192.168.55.32',
        'S2017200046_V11',
        'S2017200046_V11',
        'S2017200046_V11'
    );

    if(!$bp) {
        die('Došlo je do greške prilikom povezivanja na bazu podataka!');
    }

    $query = "SELECT * FROM Klijent WHERE idKlijent = '$klijentId'";
    $result = mysqli_query($bp, $query);

    if(!$result) {
        die('Došlo je do greške prilikom izvršavanja upita!');
    }

    if(mysqli_num_rows($result) != 1) {
        die('Ne postoji knjiga sa datim identifikatorom');
    }

    $klijent = mysqli_fetch_object($result);
?>

<!doctype html>
<html>
    <head>
        <title>Izmena klijenta</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="main.css"; />
    </head>
    <body>
        <div id="logo-wrapper">
            <img id="logo" alt="banka" src="https://clipartart.com/images/bank-clipart-free-2.jpg"/>
        </div>
        <hr />
        <h1>
            Izmena klijenta
        </h1>
        <ul>
            <li>
                <a href="klijenti.php">Povratak na spisak klijenata</a>
            </li>
            <li>
                <a href="index.php">Povratak na spisak računa</a>
            </li>
        </ul>
        <hr/>
        <form action="izmenaKlijentaDB.php" method="POST">
            <div>
                <div>
                    <label for="klijentId">ID</label>
                </div>
                <div>
                    <input value="<?php echo $klijent->idKlijent; ?>" type="text" name="klijentId" required readonly />
                </div>
            </div>
            <div>
                <div>
                    <label for="ime">Ime</label>
                </div>
                <div>
                    <input value="<?php echo $klijent->Ime; ?>" type="text" name="ime" required />
                </div>
            </div>
            <button type="submit">
                Izmeni
            </button>
        </form>
    </body>
</html>