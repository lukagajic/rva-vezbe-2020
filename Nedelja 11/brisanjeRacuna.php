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

    $query = "DELETE FROM Racun WHERE idRacun = $racunId";
    $result = mysqli_query($bp, $query);

    if(!$result) {
        die('Došlo je do greške prilikom izvršavanja upita!');
    }

    header('Location: index.php');