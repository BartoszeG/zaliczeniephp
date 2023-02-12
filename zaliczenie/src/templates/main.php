<?php
session_start();

if (isset($_SESSION['logged_id'])) {
	header('Location: list.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Panel logowania</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
</head>

<body>
    <div class="container">

        <header>
            <h1>Panel Logowania</h1>
        </header>

        <main>
            <article>
                <form method="post" action="list.php">
                    <label>Login <input type="text" name="login"></label><br>
                    <label>Hasło <input type="password" name="pass"></label><br>
                    <input type="submit" value="Zaloguj się!">
					<hr>
                    <p>Zapomniałeś hasła?</p>
                    <a href="reset-pass.php">Zrestartuj hasło</a>
					
                </form>
            </article>
        </main>

    </div>
</body>
</html>