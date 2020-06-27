<?php
    $robaId = filter_input(INPUT_GET, 'robaId', FILTER_SANITIZE_NUMBER_INT);


    $db = mysqli_connect('192.168.55.32', 'S2017200046_V12', 'S2017200046_V12', 'S2017200046_V12');

    if(!$db) { die('Doslo je do greske prilikom povezivanja na bazu podataka!' ); }

    $query = "DELETE FROM roba WHERE roba_id = '$robaId'";
    $res = mysqli_query($db, $query);

    if(!$res) { die('Doslo je do greske prilikom izvrsavanja upita!'); }

    header('Location: index.php');