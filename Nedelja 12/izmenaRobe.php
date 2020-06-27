<?php
    $robaId = filter_input(INPUT_GET, 'robaId', FILTER_SANITIZE_NUMBER_INT);

    $db = mysqli_connect('192.168.55.32', 'S2017200046_V12', 'S2017200046_V12', 'S2017200046_V12');

    if(!$db) { die('Doslo je do greske prilikom povezivanja na bazu podataka!' ); }

    $query = "SELECT * FROM roba WHERE roba_id = '$robaId'";
    $res = mysqli_query($db, $query);

    if(!$res) { die('Doslo je do greske prilikom izvrsavanja upita!'); }

    $roba = mysqli_fetch_object($res);

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
                Izmena robe:
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
                <form action="izmenaRobeDB.php" method="POST">
                    <div>
                        <div>
                            <label for="robaId">ID:</label>
                        </div>

                        <div>
                            <input type="text" name="robaId" value="<?php echo $roba->roba_id; ?>" readonly />
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="naziv">Naziv robe:</label>
                        </div>
                        <div>
                            <input value="<?php echo $roba->naziv; ?>" type="text" id="naziv" name="naziv" required />
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="kolicina">Količina robe:</label>
                        </div>
                        <div>
                            <input value="<?php echo $roba->kolicina; ?>" type="number" id="kolicina" name="kolicina" required />
                        </div>
                    </div>
                     <div>
                        <div>
                            <label for="magacin">Magacin:</label>
                        </div>
                        <div>
                            <select name="magacin">
                                <?php foreach($magacini as $magacin): ?>
                                    <option <?php if($magacin->magacin_id === $roba->magacin_id): ?> selected <?php endif; ?> value="<?php echo $magacin->magacin_id; ?>"><?php echo $magacin->naziv ?></option>
                                <?php endforeach; ?>
                            </select>
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