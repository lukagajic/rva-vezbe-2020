<?php
    session_start();
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

    if(!$username) {
        die(header('Location: prijava.html'));
    }

    $_SESSION['username'] = $username;
    die(header('Location: index.php'));