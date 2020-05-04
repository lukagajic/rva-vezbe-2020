<?php
    $korisnickoIme = 'pperic@mail.com';
    $lozinka = '123456';


    $inputKorisnickoIme = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $inputLozinka = filter_input(INPUT_POST,'lozinka', FILTER_SANITIZE_STRING);


    if($inputKorisnickoIme && $inputLozinka) {
        $poruka = 'Email i lozinka su neispravni';
        if ($inputKorisnickoIme == $korisnickoIme && $inputLozinka == $lozinka) {
            $poruka = 'Email i lozinka su ispravni';
        }
        echo $poruka;
    }

?>
<!doctype html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>
            Login
        </h2>
        <hr />
        <form action="zadatak2.php" method="POST">
            E-mail <input type="email" name="email" required /><br />
            Password <input type="password" name="lozinka" required/><hr />
            <button type="submit">
                Login
            </button>
        </form>
    </body>
</html>