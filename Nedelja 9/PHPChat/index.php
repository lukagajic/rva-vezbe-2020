<?php
    session_start();

    if(!isset($_SESSION['username'])) {
        die(header('Location: prijava.html'));
    }

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div id="wrapper">
        <h1 class="text-center">Chat</h1>
        <p class="text-center">
            Korisničko ime: <strong><?php echo $_SESSION['username']; ?></strong>
        </p>
        <div id="chat-panel">
            <div id="messages">
                <?php foreach($messages as $message): ?>
                <div>
                    <span><strong><?php echo $message->username; ?></strong></span>
                    <span><?php echo $message->ip_address; ?></span>
                    <span><?php echo date('H:i:s', strtotime($message->sent_at)); ?></span>
                    <span>: <?php echo $message->content ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div id="message-panel">
            <form action="dodavanje.php" method="POST">
                <input name="message" id="message-input" name="message" type="text" placeholder="Unesite poruku" autofocus />
                <button type="submit" id="message-btn">Pošalji</button>
            </form>
        </div>
    </div>
    <script>
        function reloadScreen() {
            if(document.querySelector('#message-input').value.length === 0) {
                window.location.href = 'index.php';
            }
        }
        setTimeout(reloadScreen, 5000);
    </script>
</body>
</html>