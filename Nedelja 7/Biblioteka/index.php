<?php
    $database = mysqli_connect('192.168.55.32', 'S2017200046_V6', 'S2017200046_V6', 'S2017200046_V6');
    if(!$database) {
        die('Greška pri povezivanju na bazu podataka!');
    }

    $query = 'SELECT knjiga.*,  autor.ime AS ime_autora, autor.prezime AS prezime_autora FROM knjiga INNER JOIN autor ON knjiga.autor_id = autor.autor_id ORDER BY knjiga.knjiga_id ASC';
    $result = mysqli_query($database, $query);

    if(!$result) {
        die('Došlo je do greške prilikom upita nad bazom podataka');
    }

    $knjige = [];
    while($row = mysqli_fetch_object($result)) {
        array_push($knjige, $row);
    }

?>
<!doctype html>
<html>
    <head>
        <title>Lista knjiga</title>
        <link rel="stylesheet" href="style.css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>
            Lista knjiga
        </h1>
        <ul>
            <li>
                <a href="dodavanjeKnjige.php">Dodavanje nove knjige</a>
            </li>
            <li>
                <a href="dodavanjeAutora.php">Dodavanje novog autora</a>
            </li>
        </ul>
        <hr/>
        <?php if($knjige): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naslov</th>
                    <th>Izdavač</th>
                    <th>Godina</th>
                    <th>Autor</th>
                    <th colspan="2">Akcije</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($knjige as $knjiga): ?>
                <tr>
                    <td><?php echo $knjiga->knjiga_id; ?></td>
                    <td><?php echo $knjiga->naslov; ?></td>
                    <td><?php echo $knjiga->izdavac; ?></td>
                    <td><?php echo $knjiga->godina; ?></td>
                    <td><?php echo "$knjiga->ime_autora $knjiga->prezime_autora"; ?></td>
                    <td><a href="izmenaKnjige.php?knjigaId=<?php echo $knjiga->knjiga_id; ?>">Uredi</a></td>
                    <td><a href="brisanjeKnjige.php?knjigaId=<?php echo $knjiga->knjiga_id; ?>" 
                           onclick="if(!confirm('Da li ste sigurni da želite da obrišete knjigu: <?php echo $knjiga->naslov; ?>?')) return false;">Obriši</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>
                Ne postoji nijedna knjiga u bazi podataka!
        </p>
        <?php endif; ?>
    </body>
</html>