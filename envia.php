
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    USE PHPMailer\PHPMailer\Exception;

    require_once("PHPMailer/Exception.php");
    require_once("PHPMailer/PHPMailer.php");
    require_once("PHPMailer/SMTP.php");

    try {
        echo 'requires';
        
        $mail = new PHPMailer(true);
        echo 'fin req';
    } catch (\Throwable $th) {
        echo 'fin req'.$th->getMessage();
    }

    $remitente = $_POST['email'];
    $destinatario = 'luisricardogz@gmail.com'; // en esta línea va el mail del destinatario.
    $asunto = 'Consulta'; // acá se puede modificar el asunto del mail

    $cuerpo = "Nombre y apellido: " . $_POST["nombre"] . "\r\n"; 
    $cuerpo .= "correo: " . $_POST["email"] . "\r\n";
    $cuerpo .= "Asunto: " . $_POST["asunto"] . "\r\n";
	$cuerpo .= "Consulta: " . $_POST["consulta"] . "\r\n";
	//las líneas de arriba definen el contenido del mail. Las palabras que están dentro de $_POST[""] deben coincidir con el "name" de cada campo. 
	// Si se agrega un campo al formulario, hay que agregarlo acá.

    try {
        $to = 'lr_ricky@hotmail.com';

        $mail->SMTPDebug = 1;
        $mail->isSMTP();
        $mail->Host ='mail.vidachiapas.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'noreply@vidachiapas.com';
        $mail->Password = '=XjfjXpN$}SJ';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    
        $mail->setFrom('noreply@vidachiapas.com', 'Contacto de Notificacion');
        $mail->addAddress($remitente);
        $mail->addReplyTo($remitente, $name);
        $mail->Subject = 'Contacto por: ' . $subject;
        $mail->Body = "Contact form submission\n\n" . $cuerpo;
    
        $enviado = $mail->send();

        echo 'Enviado correctamente';

        
        header("Location: confirma.html");
        exit();
        
    } catch (Exception $e) {
        echo $mail->ErrorInfo;
    }
   
?>
