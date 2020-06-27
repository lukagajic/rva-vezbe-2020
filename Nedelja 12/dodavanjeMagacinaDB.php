<?php
    $naziv = filter_input(INPUT_POST, 'naziv', FILTER_SANITIZE_STRING);
    $adresa = filter_input(INPUT_POST, 'adresa', FILTER_SANITIZE_STRING);

    $db = mysqli_connect('192.168.55.32', 'S2017200046_V12', 'S2017200046_V12', 'S2017200046_V12');

    if(!$db) { die('Doslo je do greske prilikom povezivanja na bazu podataka!' ); }

    $query = "INSERT INTO magacin (naziv, adresa) VALUES ('$naziv', '$adresa')";

    $res = mysqli_query($db, $query);

    if(!$res) {
        die('Došlo je do greške prilikom upita nad bazom podataka: ' . mysqli_error($db));
    }

    header('Location: listaMagacina.php');
