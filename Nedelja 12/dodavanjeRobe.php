<?php
    $db = mysqli_connect('192.168.55.32', 'S2017200046_V12', 'S2017200046_V12', 'S2017200046_V12');

    if(!$db) { die('Doslo je do greske prilikom povezivanja na bazu podataka!' ); }

    $query = "SELECT * FROM magacin";
    $res = mysqli_query($db, $query);

    if(!$res) { die('Doslo je do greske prilikom izvrsavanja upita!'); }

    $magacini = [];

    while($row = mysqli_fetch_object($res)) {
        array_push($magacini, $row);
    }

?>

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
                Dodavanje robe:
            </h1>
            <ul>
                <li>
                    <a href="listaMagacina.php">Spisak magacina</a>
                </li>
                <li>
                    <a href="index.php">Spisak robe</a>
                </li>
            </ul>
            <div>
                <form action="dodavanjeRobeDB.php" method="POST">
                    <div>
                        <div>
                            <label for="naziv">Naziv robe:</label>
                        </div>
                        <div>
                            <input type="text" id="naziv" name="naziv" required />
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="adresa">Količina robe:</label>
                        </div>
                        <div>
                            <input type="number" id="kolicina" name="kolicina" required />
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="magacin">Magacin</label>
                        </div>
                        <div>
                            <select name="magacin">
                                <?php foreach($magacini as $magacin): ?>
                                    <option value="<?php echo $magacin->magacin_id; ?>"><?php echo $magacin->naziv; ?></option>
                                <?php endforeach; ?>
                            </select>
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