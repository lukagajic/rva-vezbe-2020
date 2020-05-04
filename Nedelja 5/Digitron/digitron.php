<?php
    $prviBroj = @$_POST['broj1'];
    $drugiBroj = @$_POST['broj2'];
    $operacija = @$_POST['operacija'];
    $rezultat = null;

        switch($operacija) {
        case '+':
            $rezultat = $prviBroj + $drugiBroj;
            break;
        case '-':
            $rezultat = $prviBroj - $drugiBroj;
            break;
        case '*':
            $rezultat = $prviBroj * $drugiBroj;
            break;
        case '/':
            if($drugiBroj === 0) {
                $rezultat = 'Greska - Nedozvoljeno je deljenje sa nulom';
            } else {
                $rezultat = $prviBroj / $drugiBroj;
            }
            break;
        case '^':
            $rezultat = $prviBroj ** $drugiBroj;
            break;
        }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Digitron</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>
            Digitron
        </h2>
        <hr />
        <form action="digitron.php" method="POST">
            Prvi broj: <input type="number" name="broj1" value="<?php if($prviBroj !== NULL) echo $prviBroj; ?>" /><br />
            Operacija:
            <select name="operacija">
                <option value="+" <?php if ($operacija === '+') echo 'selected';?> >+</option>
                <option value="-" <?php if ($operacija === '-') echo 'selected';?> >-</option>
                <option value="*" <?php if ($operacija === '*') echo 'selected';?> >*</option>
                <option value="/" <?php if ($operacija === '/') echo 'selected';?> >/</option>
                <option value="^" <?php if ($operacija === '^') echo 'selected';?> >x^y</option>
            </select><br />
            Drugi broj: <input type="number" name="broj2" value="<?php if($drugiBroj !== NULL) echo $drugiBroj; ?>" /><br />
            <button type="submit">
                Izvrši operaciju
            </button>
            <br />
            <?php if($rezultat !== NULL): ?>
                Rezultat: <input type="text" value="<?php echo $rezultat; ?>" />
            <?php endif; ?>
        </form>
    </body>
</html>