<?php
    $database = mysqli_connect('192.168.55.32', 'S2017200046_V7', 'S2017200046_V7', 'S2017200046_V7');
    if(!$database) {
        die('Greška pri povezivanju na bazu podataka!');
    }

    $query = 'SELECT * FROM autor';
    $result = mysqli_query($database, $query);

    if(!$result) {
        die('Došlo je do greške prilikom upita nad bazom podataka');
    }

    $autori = [];
    while($row = mysqli_fetch_object($result)) {
        array_push($autori, $row);
    }

?>
<!doctype html>
<html>
    <head>
        <title>Dodavanje knjige</title>
        <link rel="stylesheet" href="style.css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>
            Dodavanje nove knjige
        </h1>
        <a href="index.php">Povratak na listu naslova</a>
        <hr/>
        <form action="dodavanjeKnjigeDB.php" method="POST">
            <div>
                <div>
                    <label for="naslov">Naslov</label>
                </div>
                <div>
                    <input type="text" name="naslov" required />
                </div>
            </div>
            <div>
                <div>
                    <label for="izdavac">Izdavac</label>
                </div>
                <div>
                    <input type="text" name="izdavac" required />
                </div>
            </div>
            <div>
                <div>
                    <label for="izdavac">Godina</label>
                </div>
                <div>
                    <input type="number" name="godina" required />
                </div>
            </div>
            <div>
                <div>
                    <label for="autorId">Autor</label>
                </div>
                <div>
                    <select name="autorId">
                        <?php foreach($autori as $autor): ?>
                        <option value="<?php echo $autor->autor_id; ?>"><?php echo "$autor->ime $autor->prezime"; ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
            </div>
            <button type="submit">
                Dodaj
            </button>
        </form>
    </body>
</html>