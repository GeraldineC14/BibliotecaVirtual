<?php
//Load Composer's autoloader
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function enviarCorreo($destino, $asunto, $mensaje){
  $mail = new PHPMailer(true);

  try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'castillagfelix14@gmail.com';                     //SMTP username
    $mail->Password   = 'dnintiskyjtgwcek';
    $mail->CharSet    = 'UTF-8';                                 //Codificación
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('castillagfelix14@gmail.com', 'Área de sistemas');
    $mail->addAddress($destino);               //Destino

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $mensaje; //Soporta HTML
    $mail->AltBody = 'El mensaje requiere soprote HTML contacte al administrador'; //No soporta HMLT

    $mail->send();
    //echo json_encode(["status" => true]);
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      //echo json_encode(["status" => false]);
  }

}


