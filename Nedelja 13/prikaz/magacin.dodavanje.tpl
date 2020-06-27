<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
        <h1>
            Magacini
        </h1>
        <a href="index.php?akcija=magacin.prikaz">Prikaz magacina</a>
        <a href="index.php">Početna strana</a>
        <div>
            <form method="POST" action="index.php?akcija=magacin.dodavanje">
                <div>
                    <div>
                        <label for="naziv">Naziv</label>
                    </div>
                    <div>
                        <input required type="text" id="naziv" name="naziv" />
                    </div>
                </div>
                <div>
                    <div>
                        <label required for="adresa">Adresa</label>
                    </div>
                    <div>
                        <input type="text" id="adresa" name="adresa" />
                    </div>
                </div>
                <button type="submit">
                    Dodaj
                </button>
            </form>
        </div>
    </body>
</html>