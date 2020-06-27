<?php
    $klijentId = filter_input(INPUT_POST, 'klijentId', FILTER_SANITIZE_NUMBER_INT);
    $ime = filter_input(INPUT_POST, 'ime', FILTER_SANITIZE_STRING);

    $bp = mysqli_connect(
        '192.168.55.32',
        'S2017200046_V11',
        'S2017200046_V11',
        'S2017200046_V11'
    );

    if(!$bp) {
        die('Došlo je do greške prilikom povezivanja na bazu podataka!');
    }

    $query = "UPDATE Klijent SET Ime = '$ime' WHERE idKlijent = '$klijentId'";
    $result = mysqli_query($bp, $query);

    if(!$result) {
        die('Došlo je do greške prilikom upita nad bazom podataka: ' . mysqli_error($bp));
    }

    header('Location: klijenti.php');
?>