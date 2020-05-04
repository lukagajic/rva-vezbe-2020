<?php
    $naslov = filter_input(INPUT_POST, 'naslov', FILTER_SANITIZE_STRING);
    $izdavac = filter_input(INPUT_POST, 'izdavac', FILTER_SANITIZE_STRING);
    $godina = filter_input(INPUT_POST, 'godina', FILTER_SANITIZE_NUMBER_INT);
    $autorId = filter_input(INPUT_POST, 'autorId', FILTER_SANITIZE_NUMBER_INT);

    $database = mysqli_connect('192.168.55.32', 'S2017200046_V7', 'S2017200046_V7', 'S2017200046_V7');
    if(!$database) {
        die('Greška pri povezivanju na bazu podataka!');
    }

    $query = "INSERT INTO knjiga (naslov, izdavac, godina, autor_id) VALUES ('$naslov', '$izdavac', '$godina', '$autorId')";

    $result = mysqli_query($database, $query);

    if(!$result) {
        die('Došlo je do greške prilikom upita nad bazom podataka: ' . mysqli_error($database));
    }

    mysqli_close($database);

    header('Location: index.php');