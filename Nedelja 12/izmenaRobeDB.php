<?php
    $robaId = filter_input(INPUT_POST, 'robaId', FILTER_SANITIZE_NUMBER_INT);
    $naziv = filter_input(INPUT_POST, 'naziv', FILTER_SANITIZE_STRING);
    $kolicina = filter_input(INPUT_POST, 'kolicina', FILTER_SANITIZE_NUMBER_FLOAT);
    $magacinId = filter_input(INPUT_POST, 'magacin', FILTER_SANITIZE_NUMBER_INT);

    $db = mysqli_connect('192.168.55.32', 'S2017200046_V12', 'S2017200046_V12', 'S2017200046_V12');

    if(!$db) { die('Doslo je do greske prilikom povezivanja na bazu podataka!' ); }

    $query = "UPDATE roba SET naziv = '$naziv', kolicina = '$kolicina', magacin_id = '$magacinId' WHERE roba_id = '$robaId'";
    $res = mysqli_query($db, $query);

    if(!$res) { die('Doslo je do greske prilikom izvrsavanja upita!'); }

    header('Location: index.php');
