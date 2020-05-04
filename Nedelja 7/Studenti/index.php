<?php
    $database = mysqli_connect('192.168.55.32', 'S2017200046_V6', 'S2017200046_V6', 'S2017200046_V6');
    if(!$database) {
        die('Greška pri povezivanju na bazu podataka!');
    }

    $query = 'SELECT * FROM student';
    $result = mysqli_query($database, $query);

    if(!$result) {
        die('Došlo je do greške prilikom upita nad bazom podataka');
    }
    
    $studenti = [];
    while($row = mysqli_fetch_object($result)) {
        array_push($studenti, $row);
    }

?>
<!doctype html>
<html>
    <head>
        <title>Lista studenata</title>
        <meta charset="utf-8" />
        <style>
            table {
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <h1>
            Lista studenata
        </h1>
        <a href="dodavanjeStudenta.php">Dodavanje novog studenta</a>
        <hr/>
        <?php if($studenti): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Indeks</th>
                    <th colspan="2">Akcije</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($studenti as $student): ?>
                <tr>
                    <td><?php echo $student->student_id; ?></td>
                    <td><?php echo $student->ime; ?></td>
                    <td><?php echo $student->prezime; ?></td>
                    <td><?php echo $student->indeks; ?></td>
                    <td><a href="izmenaStudenta.php?studentId=<?php echo $student->student_id; ?>">Uredi</a></td>

                    <td><a href="brisanjeStudenta.php?studentId=<?php echo $student->student_id; ?>" 
                           onclick="if(!confirm('Da li ste sigurni da želite da obrišete studenta <?php echo "$student->ime $student->prezime"; ?>?')) return false;">Obriši</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>
                Ne postoji nijedan student u bazi podataka!
        </p>
        <?php endif; ?>
    </body>
</html>