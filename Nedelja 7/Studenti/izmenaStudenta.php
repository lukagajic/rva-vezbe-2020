<?php
    $studentId = filter_input(INPUT_GET, 'studentId', FILTER_SANITIZE_NUMBER_INT);

    $database = mysqli_connect('192.168.55.32', 'S2017200046_V6', 'S2017200046_V6', 'S2017200046_V6');
    if(!$database) {
        die('Greška pri povezivanju na bazu podataka!');
    }

    $query = "SELECT * FROM student WHERE student_id ='$studentId'";
    $result = mysqli_query($database, $query);

    if(!$result) {
        die('Došlo je do greške prilikom upita nad bazom podataka');
    }

    if(mysqli_num_rows($result) != 1) {
        die('Ne postoji student sa datim identifikatorom');
    }

    $student = mysqli_fetch_object($result);
?>
<!doctype html>
<html>
    <head>
        <title>Izmena studenta</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>
            Izmena studenta
        </h1>
        <a href="index.php">Nazad na listu studenata</a>
        <hr/>
        <form action="izmenaStudentaDB.php" method="POST">
            <div>
                <div>
                    <label for="studentId">ID</label>
                </div>
                <div>
                    <input type="text" name="studentId" required value="<?php echo $student->student_id; ?>" readonly />
                </div>
            </div>
            <div>
                <div>
                    <label for="ime">Ime</label>
                </div>
                <div>
                    <input type="text" name="ime" placeholder="Unesite ime studenta" required value="<?php echo $student->ime; ?>" />
                </div>
            </div>
            <div>
                <div>
                    <label for="prezime">Prezime</label>
                </div>
                <div>
                    <input type="text" name="prezime" placeholder="Unesite prezime studenta" required value="<?php echo $student->prezime; ?>" />
                </div>
            </div>
            <div>
                <div>
                    <label for="indeks">Indeks</label>
                </div>
                <div>
                    <input type="text" name="indeks" placeholder="Unesite broj indeksa" required pattern="[0-9]{10}" value="<?php echo $student->indeks; ?>" />
                </div>
            </div>
            <button type="submit">
                Izmena
            </button>
        </form>
    </body>
</html>