<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Zaliczenie - Odzyskiwanie hasla</title>
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
</head>

<body>
    <div class="container">

        <header>
            <h1>Reset hasła</h1>
        </header>

        <main>
            <article>

					<p class="content">Wygląda na to, że zapomniałeś/aś swojego hasła do logowania.
					<br>Spokojnie nic straconego wprowadź poniżej swój adres email w celu przywrócenia hasła
					</p>
					
					<form method="post" action="save.php">
					
						<label>Wpisz poniżej swój poprawny adres e-mail:
							<input type="email" name="email" <?= isset($_SESSION['given_email']) ? 'value="' . $_SESSION['given_email'] . '"' : '' ?>>
						</label>
						<input type="submit" value="Ufff... resetuj hasło">
						
						<?php
						if (isset($_SESSION['given_email'])) {
							echo '<p class="error">To nie jest poprawny adres!</p>';
							echo '<p>Sprawdź czy czegoś nie brakuje w twoim adresie</p>';
							unset($_SESSION['given_email']);
						}
						?>
					
					</form>


				<div style="clear:both"></div>
				
            </article>
			
        </main>

    </div>
	<div class="backtologin">
				
				<a href="index.php">Powrót do panelu logowania</a>
	
		</div>
</body>
</html>