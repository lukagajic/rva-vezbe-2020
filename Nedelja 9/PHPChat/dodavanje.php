<?php
    session_start();

    if(!isset($_SESSION['username'])) {
        die(header('Location: prijava.html'));
    }

    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if(empty($message)) {
        die(header('Location: index.php'));
    }

    $database = mysqli_connect('192.168.55.32', 'S2017200046_V8', 'S2017200046_V8', 'S2017200046_V8');
    if(!$database) {
        echo 'Doslo je do greske pri povezivanju na bazu podataka!';
        exit;
    }

    $username = filter_var($_SESSION['username'], FILTER_SANITIZE_STRING);
    $ip = $_SERVER['REMOTE_ADDR'];

    //echo $message . ' ' . $username . ' ' . $ip;
    //exit;

    $query = "INSERT INTO message (username, content, ip_address) VALUES ('$username', '$message', '$ip')";

    $result = mysqli_query($database, $query);

    if(mysqli_error($database)) {
        die(mysqli_error($database));
    }

    die(header('Location: index.php'));