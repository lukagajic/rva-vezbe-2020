<?php
    $studentId = filter_input(INPUT_POST, 'studentId', FILTER_SANITIZE_NUMBER_INT);
    $ime = filter_input(INPUT_POST, 'ime', FILTER_SANITIZE_STRING);
    $prezime = filter_input(INPUT_POST, 'prezime', FILTER_SANITIZE_STRING);
    $indeks = filter_input(INPUT_POST, 'indeks', FILTER_SANITIZE_STRING);


    $database = mysqli_connect('192.168.55.32', 'S2017200046_V6', 'S2017200046_V6', 'S2017200046_V6');
    if(!$database) {
        die('Greška pri povezivanju na bazu podataka!');
    }

    $query = "UPDATE student SET ime = '$ime', prezime = '$prezime', indeks='$indeks' WHERE student_id = '$studentId'";

    $result = mysqli_query($database, $query);

    if(!$result) {
        die('Došlo je do greške prilikom upita nad bazom podataka: ' . mysqli_error($database));
    }

    mysqli_close($database);

    header('Location: index.php');