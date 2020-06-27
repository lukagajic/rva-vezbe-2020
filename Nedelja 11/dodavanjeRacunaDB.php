<?php
    $brojRacuna = filter_input(INPUT_POST, 'brojRacuna', FILTER_SANITIZE_STRING);
    $iznos = filter_input(INPUT_POST, 'iznos', FILTER_SANITIZE_NUMBER_INT);
    $klijentId = filter_input(INPUT_POST, 'klijentId', FILTER_SANITIZE_NUMBER_INT);

    $bp = mysqli_connect(
        '192.168.55.32',
        'S2017200046_V11',
        'S2017200046_V11',
        'S2017200046_V11'
    );

    if(!$bp) {
        die('Došlo je do greške prilikom povezivanja na bazu podataka!');
    }

    $query = "INSERT INTO Racun(Broj_racuna, Iznos, Klijent_id) VALUES ('$brojRacuna', '$iznos', '$klijentId')";
    $result = mysqli_query($bp, $query);

    if(!$result) {
        die('Došlo je do greške prilikom upita nad bazom podataka: ' . mysqli_error($bp));
    }

    header('Location: index.php');
?>