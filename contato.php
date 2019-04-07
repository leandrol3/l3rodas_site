<?php
error_reporting(E_ALL);
require 'PHPMailer_5.2.0/class.phpmailer.php';
$mail = new PHPMailer;
    
   
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "site.l3rodas@gmail.com";  // GMAIL username
$mail->Password   = "site@l3rodas";            // GMAIL password

    $mail->CharSet = 'UTF-8';


      // Compose
    $mail->SetFrom($_POST['email'], $_POST['nome']);
    $mail->AddReplyTo($_POST['email'], $_POST['nome']);
    $mail->Subject = "L3 Rodas - Contato";      // Subject (which isn't required)  
    $mail->AddAddress('vendas@l3rodas.com.br'); //recipient  
    $mail->AddCC('ari@l3rodas.com.br');
    $mail->Body = "Nome: " . $_POST['nome'] . "\r\nEmail: " . $_POST['email'] . "\r\nTelefone: " .$_POST['telefone'] . "\r\nAssunto: " . $_POST['assunto'] . "\r\nMensagem: " . stripslashes($_POST['mensagem']);

if(!$mail->Send()) {
  echo "Ocorreu um erro: " . $mail->ErrorInfo;
} else {
  echo "Mensagem enviada!";
}
?>