<?php

function envio_email($correo, $subject, $body){

	require 'class.phpmailer.php';
	try {
		$mail = new PHPMailer(true); //Nueva instancia, con las excepciones habilitadas
		
		
		$mail->IsSMTP();                           // Usamos el metodo SMTP de la clase PHPMailer
		$mail->SMTPAuth   = true;                  // habilitado SMTP autentificación
		$mail->SMTPSecure = "ssl"; 
		$mail->Host       = "mail.comprasegura.com.ec";      // establecemos GMail como nuestro servidor SMTP
        //$mail->Port       = 25;                   // establecemos el puerto SMTP en el servidor de GMail
        $mail->Username   = "compassion@comprasegura.com.ec";  // la cuenta de correo GMail
        $mail->Password   = "compas2017";
		
		
		$mail->Timeout   = 30;                  // habilitado SMTP autentificación
		
		$mail->Port       = 465;                // puerto del server SMTP
		//$mail->Host       = "mail.grupoavila.com.ec"; 	// SMTP server
		//$mail->Username   = "acceso@grupoavila.com.ec";     // SMTP server Usuario
		//$mail->Password   = "Grupo2017";            // SMTP server password
		$mail->From       = "info@grupoavila.com.ec"; //Remitente de Correo
		$mail->FromName   = "Grupo Avila"; //Nombre del remitente
		$to = $correo; //Para quien se le va enviar
		$mail->AddAddress($to);
		$mail->Subject  = $subject; //Asunto del correo
		$mail->MsgHTML($body);
		$mail->IsHTML(true); // Enviar como HTML
		$mail->Send();//Enviar
		// echo 'El Mensaje a sido enviado.';
	} catch (phpmailerException $e) {
		//echo $e->errorMessage();//Mensaje de error si se produciera.
	}
}
?>

