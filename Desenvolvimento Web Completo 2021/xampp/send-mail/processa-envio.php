<?php

use PHPMailer\PHPMailer\Exception;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

['destinatario' => $destinatario, 'assunto' => $assunto, 'mensagem' => $mensagem] = $_POST;

$mensage = new Mensagem($destinatario, $assunto, $mensagem);
if (!$mensage->mensagemValida()) { # Erro
    header('Location: index.php');
}

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'paulopliniu69@gmail.com'; //SMTP username
    $mail->Password = 'phpmailer'; //SMTP password
    $mail->SMTPSecure = 'TLS'; //Enable implicit TLS encryption
    $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('paulopliniu69@gmail.com', 'Paulo Pliniu da Silva');
    $mail->addAddress($mensage->destinatario); //Add a recipient
    $mail->addReplyTo('paulopliniu69@gmail.com', 'Central');
    #$mail->addCC('cc@example.com');
    #$mail->addBCC('bcc@example.com');

    //Attachments
    #$mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
    #$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = $mensage->assunto;
    $mail->Body = $mensage->mensagem;
    $mail->AltBody = 'É necessario usar um client que suporte HTML para ter acesso total ao conteúdo dessa mensagem';

    $mail->send();

    $mensage->status['codigo_status'] = 1;
    $mensage->status['descricao_status'] = 'E-mail enviado com sucesso';
} catch (Exception $e) {
    $mensage->status['codigo_status'] = 2;
    $mensage->status['descricao_status'] = 'Não foi possível enviar esse e-mail! Por favor, tente novamente mais tarde. Detalhes do erro: ' . $mail->ErrorInfo;
}
?>

<html>

<head>
    <meta charset="utf-8" />
    <title>App Mail Send</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="py-3 text-center">
            <img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
            <h2>Send Mail</h2>
            <p class="lead">Seu app de envio de e-mails particular!</p>
        </div>

        <div class="row">
            <div class="col-md-12">

<?php switch ($mensage->status['codigo_status']) {
    case 1: ?>
        <div class="container">
            <h1 class="display-4 text-success">Sucesso</h1>
            <p><?=$mensage->status['descricao_status']?></p>
            <a href="index.php" class="btn btn-success btn-lg mb-5 text-white">Voltar</a>
        </div>
        <?php break;
    case 2: ?>
        <div class="container">
            <h1 class="display-4 text-danger">Ops!</h1>
            <p><?=$mensage->status['descricao_status']?></p>
            <a href="index.php" class="btn btn-danger btn-lg mb-5 text-white">Voltar</a>
        </div>
        <?php break;
}?>

            </div>
        </div>
    </div>
</body>

</html>