<?php
    $magacinId = filter_input(INPUT_GET, 'magacinId', FILTER_SANITIZE_NUMBER_INT);

    $db = mysqli_connect('192.168.55.32', 'S2017200046_V12', 'S2017200046_V12', 'S2017200046_V12');

    if(!$db) { die('Doslo je do greske prilikom povezivanja na bazu podataka!' ); }

    $query = "SELECT * FROM roba WHERE magacin_id = '$magacinId'";
    $res = mysqli_query($db, $query);

    if(!$res) { die('Doslo je do greske prilikom izvrsavanja upita!'); }

    $roba = [];

    while($row = mysqli_fetch_object($res)) {
        array_push($roba, $row);
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
                Prikaz robe za magacin sa ID: <?php echo $magacinId; ?>:
            </h1>
            <ul>
                <li>
                    <a href="listaMagacina.php">Prikaz magacina</a>
                </li>
                <li>
                    <a href="listaMagacina.php">Prikaz robe</a>
                </li>
                <li>
                    <a href="dodavanjeRobe.php">Dodavanje robe</a>
                </li>
            </ul>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naziv</th>
                        <th>Količina</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($roba as $proizvod): ?>
                        <tr>
                            <td><?php echo $proizvod->roba_id; ?></td>
                            <td><?php echo $proizvod->naziv; ?></td>
                            <td><?php echo $proizvod->kolicina; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>