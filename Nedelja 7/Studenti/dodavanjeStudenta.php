<!doctype html>
<html>
    <head>
        <title>Dodavanje novog studenta</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>
            Dodavanje novog studenta
        </h1>
        <a href="index.php">Nazad na listu studenata</a>
        <hr/>
        <form action="dodavanjeStudentaDB.php" method="POST">
            <div>
                <div>
                    <label for="ime">Ime</label>
                </div>
                <div>
                    <input type="text" name="ime" placeholder="Unesite ime studenta" required />
                </div>
            </div>
            <div>
                <div>
                    <label for="prezime">Prezime</label>
                </div>
                <div>
                    <input type="text" name="prezime" placeholder="Unesite prezime studenta" required />
                </div>
            </div>
            <div>
                <div>
                    <label for="indeks">Indeks</label>
                </div>
                <div>
                    <input type="text" name="indeks" placeholder="Unesite broj indeksa" required pattern="[0-9]{10}" />
                </div>
            </div>
            <button type="submit">
                Dodavanje
            </button>
        </form>
    </body>
</html>