<?php
    $db = mysqli_connect('192.168.55.32', 'S2017200046_V12', 'S2017200046_V12', 'S2017200046_V12');

    if(!$db) { die('Doslo je do greske prilikom povezivanja na bazu podataka!' ); }

    $query = 'SELECT magacin.*, IFNULL(COUNT(roba.magacin_id), 0) AS kolicina_robe
              FROM magacin
              LEFT JOIN roba ON magacin.magacin_id = roba.magacin_id
              GROUP by magacin_id';

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
                Lista magacina:
            </h1>
            <ul>
                <li>
                    <a href="dodavanjeMagacina.php">Dodavanje novog magacina</a>
                </li>
                <li>
                    <a href="index.php">Spisak robe</a>
                </li>
            </ul>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naziv</th>
                        <th>Adresa</th>
                        <th>Količina robe u magacinu</th>
                        <th colspan="2">Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($magacini as $magacin): ?>
                        <tr>
                            <td><?php echo $magacin->magacin_id; ?></td>
                            <td><?php echo $magacin->naziv; ?></td>
                            <td><?php echo $magacin->adresa; ?></td>
                            <td class="text-center"><?php echo $magacin->kolicina_robe; ?></td>
                            <td><a href="izmenaMagacina.php?magacinId=<?php echo $magacin->magacin_id; ?>">Uredi</a></td>
                            <td><a onclick="if(!confirm('Da li ste sigurni da želite da obrišete magacin: <?php echo $magacin->naziv; ?>?')) return false;" href="brisanjeMagacina.php?magacinId=<?php echo $magacin->magacin_id; ?>">Obriši</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>