<?php
    $magacinId = filter_input(INPUT_POST, 'magacinId', FILTER_SANITIZE_NUMBER_INT);
    $naziv = filter_input(INPUT_POST, 'naziv', FILTER_SANITIZE_STRING);
    $adresa = filter_input(INPUT_POST, 'adresa', FILTER_SANITIZE_STRING);

    //echo $magacinId . ' ' . $naziv . ' ' . $adresa;
    //exit;

    $db = mysqli_connect('192.168.55.32', 'S2017200046_V12', 'S2017200046_V12', 'S2017200046_V12');

    if(!$db) { die('Doslo je do greske prilikom povezivanja na bazu podataka!' ); }

    $query = "UPDATE magacin SET naziv = '$naziv', adresa = '$adresa' WHERE magacin_id = '$magacinId'";
    $res = mysqli_query($db, $query);

    if(!$res) { die('Doslo je do greske prilikom izvrsavanja upita!'); }

    header('Location: listaMagacina.php');

