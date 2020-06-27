<?php
    function izvrsavanje() {

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            return;
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Naziv = filter_input(INPUT_POST, 'naziv', FILTER_SANITIZE_STRING);
            $Adresa = filter_input(INPUT_POST, 'adresa', FILTER_SANITIZE_STRING);

            $DB = new mysqli('192.168.55.32', 'S2017200046_V13', 'S2017200046_V13', 'S2017200046_V13');
            $query = "INSERT INTO Magacin(Naziv, Adresa) VALUES ('$Naziv', '$Adresa')";
            $Rezultat = $DB->query($query);
            if($Rezultat) {
                die(header('Location: index.php?akcija=magacin.prikaz'));
            }
        }

    }