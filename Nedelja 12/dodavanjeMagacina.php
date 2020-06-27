<!doctype html>
<html>
    <head>
        <title>Rad sa magacinima</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="main.css" />
    </head>
    <body>
        <div>
            <h1>
                Dodavanje magacina:
            </h1>
            <ul>
                <li>
                    <a href="listaMagacina.php">Prikaz magacina</a>
                </li>
                <li>
                    <a href="index.php">Prikaz robe</a>
                </li>
            </ul>
            <div>
                <form action="dodavanjeMagacinaDB.php" method="POST">
                    <div>
                        <div>
                            <label for="naziv">Naziv magacina:</label>
                        </div>
                        <div>
                            <input type="text" id="naziv" name="naziv" required />
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="adresa">Adresa magacina:</label>
                        </div>
                        <div>
                            <input type="text" id="adresa" name="adresa" required />
                        </div>
                    </div>
                    <button type="submit">
                        Dodaj
                    </button>
                </form>
            </div>
            
        </div>
    </body>
</html>