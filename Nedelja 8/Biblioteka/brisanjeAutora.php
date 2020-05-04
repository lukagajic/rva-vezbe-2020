<?php
    $autorId = filter_input(INPUT_GET, 'autorId', FILTER_SANITIZE_NUMBER_INT);

    $database = mysqli_connect('192.168.55.32', 'S2017200046_V7', 'S2017200046_V7', 'S2017200046_V7');
    if(!$database) {
        die('Greška pri povezivanju na bazu podataka!');
    }

    $query = "DELETE FROM autor WHERE autor_id='$autorId'";
    $result = mysqli_query($database, $query);

    if(!$result) {
        die('Došlo je do greške prilikom upita nad bazom podataka');
    }

    mysqli_close($database);
    header('Location: index.php');