<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['email'])) {
	
	$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	
	if (empty($email)) {
		
		$_SESSION['given_email'] = $_POST['email'];
		header('Location: reset-pass.php');
		
	} else {
		
        try{
            $mail = new PHPMailer();

            $mail->isSMTP();

            $mail->Host = 'mail.gmx.com';
            $mail->Port = '587';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;

            $mail->Username = 'apsl-dev@gmx.com';
            $mail->Password = 'apslDEV2023';

            $mail->Charset = 'UTF-8';
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Reset hasla';
            $mail->Body = '
            <html>
            <head>
            </head>
            <body>
            <p>Aby zresetować hasło kliknij w <a href=">link</a>
            </body>
            </html>
            ';

            $mail->send();

        } catch(Exception $error) {
            echo "Błąd wysyłania maila: {$mail->ErrorInfo}";
        }
		
	}
	
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="utf-8">
    <title>Zaliczenie - Odzyskiwanie hasla</title>

    <meta http-equiv="X-Ua-Compatible" content="IE=edge">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">

        <header>
            <h1>Przypomnienie hasła</h1>
        </header>

        <main>
            <article>
                <p class="content">Jeżeli wskazany przez ciebie adres znajduję się w naszej bazie to wysłaliśmy na niego link do resetu hasła.</p>
                <a href="index.php">Powrót do panelu logowania</a>
            </article>
        </main>

    </div>

</body>
</html>