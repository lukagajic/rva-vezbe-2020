<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
        <h1>
            Magacini
        </h1>
        <a href="index.php?akcija=magacin.dodavanje">Dodavanje magacina</a>
        <a href="index.php">Početna strana</a>
        <table border=1>
            <tr>
                <td>ID Magacina</td>
                <td>Naziv</td>
                <td>Adresa</td>
            </tr>
        {foreach $Magacini as $Magacin}
            <tr>
                <td>{$Magacin-> ID}</td>
                <td>{$Magacin->Naziv}</td>
                <td>{$Magacin->Adresa}</td>
            </tr>
        {/foreach}
        </table>
    </body>
</html>