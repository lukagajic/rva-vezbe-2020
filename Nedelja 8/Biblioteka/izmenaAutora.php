<?php
    $autorId = filter_input(INPUT_GET, 'autorId', FILTER_SANITIZE_NUMBER_INT);
    $database = mysqli_connect('192.168.55.32', 'S2017200046_V7', 'S2017200046_V7', 'S2017200046_V7');
    if(!$database) {
        die('Greška pri povezivanju na bazu podataka!');
    }

    $query = "SELECT * FROM autor WHERE autor_id = $autorId";
    $result = mysqli_query($database, $query);

    if(!$result) {
        die('Došlo je do greške prilikom upita nad bazom podataka');
    }

    $autor = mysqli_fetch_object($result);
?>
<!doctype html>
<html>
    <head>
        <title>Izmena autora</title>
        <link rel="stylesheet" href="style.css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>
            Izmena autora
        </h1>
        <a href="index.php">Povratak na listu naslova</a>
        <hr/>
        <form action="izmenaAutoraDB.php" method="POST">
            <div>
                <div>
                    <label for="ime">ID</label>
                </div>
                <div>
                    <input type="text" name="autorId" value="<?php echo $autorId ?>" required readonly/>
                </div>
            </div>
            <div>
                <div>
                    <label for="ime">Ime</label>
                </div>
                <div>
                    <input type="text" name="ime" value="<?php echo $autor->ime ?>" required />
                </div>
            </div>
            <div>
                <div>
                    <label for="prezime">Prezime</label>
                </div>
                <div>
                    <input type="text" name="prezime" value="<?php echo $autor->prezime ?>"  required/>
                </div>
            </div>
            <button type="submit">
                Izmeni
            </button>
        </form>
        <hr/>
        <div>
            <a onclick="if(!confirm('Da li ste sigurni da želite da obrišete autora: <?php echo $autor->ime . ' ' . $autor->prezime; ?>?')) return false;" 
               href="brisanjeAutora.php?autorId=<?php echo $autorId; ?>">Brisanje autora</a>
            <p class="warning">
                NAPOMENA: Brisanjem autora se brišu i svi njegovi naslovi iz baze podataka!
            </p>
        </div>
    </body>
</html>