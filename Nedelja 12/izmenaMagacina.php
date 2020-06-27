<?php
    $magacinId = filter_input(INPUT_GET, 'magacinId', FILTER_SANITIZE_NUMBER_INT);

    $db = mysqli_connect('192.168.55.32', 'S2017200046_V12', 'S2017200046_V12', 'S2017200046_V12');

    if(!$db) { die('Doslo je do greske prilikom povezivanja na bazu podataka!' ); }

    $query = "SELECT * FROM magacin WHERE magacin_id = '$magacinId'";
    $res = mysqli_query($db, $query);

    if(!$res) { die('Doslo je do greske prilikom izvrsavanja upita!'); }

    $magacin = mysqli_fetch_object($res);
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
                Izmena magacina:
            </h1>
            <ul>
                <li>
                    <a href="listaMagacina.php">Prikaz magacina</a>
                </li>
                <li>
                    <a href="listaMagacina.php">Prikaz magacina</a>
                </li>
            </ul>
            <div>
                <form action="izmenaMagacinaDB.php" method="POST">
                    <div>
                        <div>
                            <label for="magacinId">ID:</label>
                        </div>
                        
                        <div>
                            <input type="text" name="magacinId" value="<?php echo $magacin->magacin_id; ?>" readonly />
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="naziv">Naziv magacina:</label>
                        </div>
                        <div>
                            <input value="<?php echo $magacin->naziv; ?>" type="text" id="naziv" name="naziv" required />
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="adresa">Adresa magacina:</label>
                        </div>
                        <div>
                            <input value="<?php echo $magacin->adresa; ?>" type="text" id="adresa" name="adresa" required />
                        </div>
                    </div>
                    <button type="submit">
                        Izmena
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>