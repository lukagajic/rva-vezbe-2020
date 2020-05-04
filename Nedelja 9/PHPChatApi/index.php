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
            </div>
        </div>
        <div id="message-panel">
                <input name="message" id="message-input" name="message" type="text" placeholder="Unesite poruku" autofocus required />
                <button type="button" id="message-btn">Pošalji</button>
        </div>
    </div>
    <script>
        window.onload = getAllMessages;

        document.getElementById('message-btn').addEventListener('click', sendMessage);

        function sendMessage() {
            console.log(JSON.stringify(document.getElementById("message-input").value));

            fetch('http://178.254.132.235:35531/S2017200046_V8/PHPChatMicroservices/addNewMessage.php', {
                mode: 'cors',
                headers: {
                    'Content-Type': 'application/json'
                },
                method: 'POST',
                body: JSON.stringify(document.getElementById("message-input").value)
            })
                .then((res) => 
                      {
                        console.log(res);
                        getAllMessages();
                })
                .catch((err) => {console.log(err);});
        }

        setInterval(getAllMessages, 5000);

        function getAllMessages() {
            document.getElementById("messages").innerHTML = '';
            fetch('http://178.254.132.235:35531/S2017200046_V8/PHPChatMicroservices/getAllMessages.php', {mode: 'cors'})
              .then(response => response.json())
              .then(data => {

                data.forEach(d => {
                    document.getElementById("messages").innerHTML +=
                        `
                            <div>
                                <span><strong>${d.username}</strong></span>
                                <span>${d.ip_address}</span>
                                <span>${new Date(d.sent_at).toLocaleTimeString()}</span>
                                <span>:${d.content}</span>
                            </div>
                        `
                });
                console.log(data);
            });
        }

    </script>
</body>
</html>