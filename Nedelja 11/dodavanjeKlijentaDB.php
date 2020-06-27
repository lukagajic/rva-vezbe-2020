<?php
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

    $query = "INSERT INTO Klijent(Ime) VALUES ('$ime')";
    $result = mysqli_query($bp, $query);

    if(!$result) {
        die('Došlo je do greške prilikom upita nad bazom podataka: ' . mysqli_error($bp));
    }

    header('Location: klijenti.php');
?>