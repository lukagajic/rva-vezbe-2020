<?php
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json');
    session_start();

    $greske = [];

    $content = trim(file_get_contents("php://input"));

    $message = json_decode($content, true);


    $database = mysqli_connect('192.168.55.32', 'S2017200046_V8', 'S2017200046_V8', 'S2017200046_V8');

    $username = filter_var($_SESSION['username'], FILTER_SANITIZE_STRING);
    $ip = $_SERVER['REMOTE_ADDR'];


    $query = "INSERT INTO message (username, content, ip_address) VALUES ('$username', '$message', '$ip')";

    $result = mysqli_query($database, $query);

    if(mysqli_error($database)) {
        exit;
    }

    file_put_contents('test.txt', 'Uspesno');