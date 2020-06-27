<!doctype html>
<html>
    <head>
        <title>Dodavanje novog klijenta</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="main.css"; />
    </head>
    <body>
        <div id="logo-wrapper">
            <img id="logo" alt="banka" src="https://clipartart.com/images/bank-clipart-free-2.jpg"/>
        </div>
        <hr />
        <h1>
            Dodavanje novog klijenta
        </h1>
        <ul>
            <li>
                <a href="klijenti.php">Povratak na spisak klijenata</a>
            </li>
            <li>
                <a href="index.php">Povratak na spisak računa</a>
            </li>
        </ul>
        <hr/>
        <form action="dodavanjeKlijentaDB.php" method="POST">
            <div>
                <div>
                    <label for="ime">Ime</label>
                </div>
                <div>
                    <input type="text" name="ime" required />
                </div>
            </div>
            <button type="submit">
                Dodaj
            </button>
        </form>
    </body>
</html>