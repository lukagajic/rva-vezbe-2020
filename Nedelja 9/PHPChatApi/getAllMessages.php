<?php
    $database = mysqli_connect('192.168.55.32', 'S2017200046_V8', 'S2017200046_V8', 'S2017200046_V8');
    if(!$database) {
        echo 'Doslo je do greske pri povezivanju na bazu podataka!';
        exit;
    }

    $getAllMessagesQuery = "SELECT * FROM message ORDER BY sent_at ASC LIMIT 10";
    $result = mysqli_query($database, $getAllMessagesQuery);

    $messages = [];

    while($row = mysqli_fetch_object($result)) {
        array_push($messages, $row);
    }

    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json');
    echo json_encode($messages);