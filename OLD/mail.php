<?php


// include_once 'Global/config.php';
// include_once 'Global/function.php';


use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

 include 'PHPMailer/src/Exception.php';
 include 'PHPMailer/src/PHPMailer.php';
 include 'PHPMailer/src/SMTP.php';
 //include 'PHPMailer/src/gmail.php';
 if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['message'];
 //function sendmail($s,$s,$e){
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;   //2;                   // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host = "mail51.lwspanel.com";                // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = "merveille@wonder-consultingrh.com";             // SMTP username
    $mail->Password   = 'Cormeilles95@';                               // SMTP password
    $mail->SMTPSecure = 'TLS';//PHPMailer::ENCRYPTION_STARTTLS; //SSL;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       =  "587"  ;                                // TCP port to connect to

    //Destinataire ou oRecipients
    $mail->setFrom('contact@wonder-consultingrh.com', 'Wonder Consulting RH');
    //$mail->addAddress($_POST['email'],'client');     // Add a recipient
    $mail->addAddress('merveille@wonder-consultingrh.com','Administrateur');
    $mail->addAddress('lvswaggintello@gmail.com','IT');    // Name is optional
    $mail->addReplyTo($_POST['email'], $_POST['name']);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->FromName =$_POST['name'];
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['message'];
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Envoyé!</strong> Votre message a été envoyer avec succès.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

    
} catch (Exception $e) {
    //echo "<div class='alert alert-danger' role='alert'>Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}</div>";
  echo'  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Erreur!</strong> Votre message n\'a pas été envoyer suite à une erreur. Veuillez réessayer plutard.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

}
/*
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'gkuadiamona@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'valeriane22';

//Set who the message is to be sent from
$mail->setFrom("easyscontact3@gmail.com", 'MINISTERE DES AFFAIRES ETRANGERES');
// echo $email;

$mail->addAddress("easyscontact3@gmail.com", 'MINISTERE DES AFFAIRES ETRANGERES');
// echo $email;
$mail->Body = "Votre demande de visa à bien été reçu, de ce fait pour confirmer  la procedure, veuillez cliquer sur le lien suivant en vue d'effectuer le paiement <a href='https://www.2checkout.com/>Je procède au paiement</a>';"; 

$mail->AltBody = "Votre demande de visa à bien été reçu, de ce fait pour confirmer  la procedure, veuillez cliquer sur le lien suivant en vue d'effectuer le paiement <a href='https://www.2checkout.com/>Je procède au paiement</a>';"; 


if (!$mail->send()) {
    //echo 'OK';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
     
} else {

 echo 'OK';
}*/
//Set an alternative reply-to address
//$mail->addReplyTo('boyodorcas@yahoo.fr' , 'First Last');

//Set who the message is to be sent to

//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
/*function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());

    imap_close($imapStream);

    return $result;

}*/