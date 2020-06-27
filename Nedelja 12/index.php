<?php
    $db = mysqli_connect('192.168.55.32', 'S2017200046_V12', 'S2017200046_V12', 'S2017200046_V12');

    if(!$db) { die('Doslo je do greske prilikom povezivanja na bazu podataka!' ); }

    $query = 'SELECT roba.*, magacin.naziv AS naziv_magacina 
                FROM roba
                INNER JOIN magacin
                ON magacin.magacin_id = roba.magacin_id;';
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
                Prikaz robe:
            </h1>
            <ul>
                <li>
                    <a href="listaMagacina.php">Prikaz magacina</a>
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
                        <th>Magacin</th>
                        <th colspan="2">Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($roba as $proizvod): ?>
                        <tr>
                            <td><?php echo $proizvod->roba_id; ?></td>
                            <td><?php echo $proizvod->naziv; ?></td>
                            <td><?php echo $proizvod->kolicina; ?></td>
                            <td><a href="prikazRobePoMagacinu.php?magacinId=<?php echo $proizvod->magacin_id; ?>"><?php echo $proizvod->naziv_magacina; ?></a></td>
                            <td><a href="izmenaRobe.php?robaId=<?php echo $proizvod->roba_id ?>">Uredi</a></td>
                            <td><a onclick="if(!confirm('Da li ste sigurni da želite da obrišete robu: <?php echo $proizvod->naziv; ?>?')) return false;" href="brisanjeRobe.php?robaId=<?php echo $proizvod->roba_id ?>">Obriši</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>