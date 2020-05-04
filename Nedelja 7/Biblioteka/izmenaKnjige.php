<?php
    $knjigaId = filter_input(INPUT_GET, 'knjigaId', FILTER_SANITIZE_NUMBER_INT);
    $database = mysqli_connect('192.168.55.32', 'S2017200046_V6', 'S2017200046_V6', 'S2017200046_V6');
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

    $query = "SELECT * FROM knjiga WHERE knjiga_id = '$knjigaId'";
    $result = mysqli_query($database, $query);

    if(!$result) {
        die('Došlo je do greške prilikom upita nad bazom podataka');
    }

    if(mysqli_num_rows($result) != 1) {
        die('Ne postoji knjiga sa datim identifikatorom');
    }

    $knjiga = mysqli_fetch_object($result);
?>
<!doctype html>
<html>
    <head>
        <title>Izmena knjige</title>
        <link rel="stylesheet" href="style.css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>
            Izmena knjige
        </h1>
        <a href="index.php">Povratak na listu naslova</a>
        <hr/>
        <form action="izmenaKnjigeDB.php" method="POST">
            <div>
                <div>
                    <label for="knigaId">ID</label>
                </div>
                <div>
                    <input type="text" name="knjigaId" value="<?php echo $knjigaId; ?>" readonly required />
                </div>
            </div>
            <div>
                <div>
                    <label for="naslov">Naslov</label>
                </div>
                <div>
                    <input type="text" name="naslov" required value="<?php echo $knjiga->naslov; ?>" />
                </div>
            </div>
            <div>
                <div>
                    <label for="izdavac">Izdavac</label>
                </div>
                <div>
                    <input type="text" name="izdavac" required value="<?php echo $knjiga->izdavac; ?>" />
                </div>
            </div>
            <div>
                <div>
                    <label for="izdavac">Godina</label>
                </div>
                <div>
                    <input type="number" name="godina" required value="<?php echo $knjiga->godina; ?>" />
                </div>
            </div>
            <div>
                <div>
                    <label for="autorId">Autor</label>
                </div>
                <div>
                    <select name="autorId">
                    <?php foreach($autori as $autor): ?>
                        <?php if($autor->autor_id == $knjiga->autor_id): ?>
                            <option selected value="<?php echo $autor->autor_id; ?>"><?php echo "$autor->ime $autor->prezime"; ?></option>
                        <?php else: ?>
                            <option value="<?php echo $autor->autor_id; ?>"><?php echo "$autor->ime $autor->prezime"; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                </div>
            </div>
            <button type="submit">
                Izmeni
            </button>
        </form>
    </body>
</html>