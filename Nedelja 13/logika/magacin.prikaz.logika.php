<?php
    function izvrsavanje() {
        $DB = new mysqli('192.168.55.32', 'S2017200046_V13', 'S2017200046_V13', 'S2017200046_V13');
        $query = 'SELECT * FROM Magacin';

        $Magacini = [];
        $Rezultat = $DB->query($query);
        while($Magacin = $Rezultat->fetch_object()) {
            $Magacini[] = $Magacin;
        }
        return $Magacini;
    }