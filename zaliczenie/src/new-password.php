<?php
session_start();

function validatePassword($haslo1, $haslo2) {
  $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
  if (!preg_match($pattern, $haslo1)) {
    $_SESSION['e_haslo']="Hasło musi mieć co najmniej 8 znaków, zawierać co najmniej jedną małą i dużą literę, cyfrę i znak specjalny.";
    return false;
  }
  if ($haslo1 !== $haslo2) {
    $_SESSION['e_haslo']="Podane hasła nie są identyczne.";
    return false;
  }
  return true;
}

$haslo1 = $_POST['haslo1'];
$haslo2 = $_POST['haslo2'];
if (validatePassword($haslo1, $haslo2)) {
  $_SESSION['e_haslo']="Hasła zostało pomyślnie zmienione!";
}
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Nowe haslo</title>
    <meta name="description" content="Zaliczenie - Odzyskiwanie hasla">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>
<main>
            <article>
          <div class="panelpassnew">
					<p class="content">Wygląda na to, że zapomniałeś/aś swojego hasła do logowania.
					<br>Spokojnie nic straconego wprowadź poniżej swój adres email w celu przywrócenia hasła
					</p>
					
                    <form method="post">
              
                    Nowe hasło: <br /> <input type="password" name="haslo1" /><br />
                        
                    Powtórz hasło: <br /> <input type="password" name="haslo2" /><br />
                    <input type="submit" value="Zmień hasło:" name="ok"/> 
                    <?php
                          if (isset($_SESSION['e_haslo']))
                          {
                          echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                          unset($_SESSION['e_haslo']);
                          }
                          
                      ?>
                    </form>


				<div style="clear:both"></div>
                        </div>
            </article>
			
        </main>
</body>
</html>
