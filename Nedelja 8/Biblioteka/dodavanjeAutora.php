<!doctype html>
<html>
    <head>
        <title>Dodavanje autora</title>
        <link rel="stylesheet" href="style.css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>
            Dodavanje novog autora
        </h1>
        <a href="index.php">Povratak na listu naslova</a>
        <hr/>
        <form action="dodavanjeAutoraDB.php" method="POST">
            <div>
                <div>
                    <label for="ime">Ime</label>
                </div>
                <div>
                    <input type="text" name="ime" />
                </div>
            </div>
            <div>
                <div>
                    <label for="prezime">Prezime</label>
                </div>
                <div>
                    <input type="text" name="prezime" />
                </div>
            </div>
            <button type="submit">
                Dodaj
            </button>
        </form>
    </body>
</html>