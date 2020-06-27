<?php
    $racunId = filter_input(INPUT_POST, 'racunId', FILTER_SANITIZE_NUMBER_INT);
    $brojRacuna = filter_input(INPUT_POST, 'brojRacuna', FILTER_SANITIZE_STRING);
    $iznos = filter_input(INPUT_POST, 'iznos', FILTER_SANITIZE_NUMBER_INT);
    $klijentId = filter_input(INPUT_POST, 'klijentId', FILTER_SANITIZE_NUMBER_INT);

    //debug
    //echo $brojRacuna . ' ' . $racunId . ' ' . $iznos . ' ' . $klijentId;
    //exit;

    $bp = mysqli_connect(
        '192.168.55.32',
        'S2017200046_V11',
        'S2017200046_V11',
        'S2017200046_V11'
    );

    if(!$bp) {
        die('Došlo je do greške prilikom povezivanja na bazu podataka!');
    }

    $query = "UPDATE Racun SET Broj_racuna = '$brojRacuna', Iznos = '$iznos', Klijent_id = '$klijentId' WHERE idRacun = '$racunId'";
    $result = mysqli_query($bp, $query);

    if(!$result) {
        die('Došlo je do greške prilikom upita nad bazom podataka: ' . mysqli_error($bp));
    }

    header('Location: index.php');
?>