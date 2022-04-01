<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['message'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
/*     $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "youremail@gmail.com";
    $mail->Password = 'yourpassword';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl"; */
    
    $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;   //2;                   // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host = "mail51.lwspanel.com";                // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = "merveille@wonder-consultingrh.com";             // SMTP username
    $mail->Password   = 'Cormeilles95@';                               // SMTP password
    $mail->SMTPSecure = 'TLS';//PHPMailer::ENCRYPTION_STARTTLS; //SSL;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       =  "587"  ;   

    //email settings
    $mail->isHTML(true);
    //$mail->setFrom($email, $name);
    $mail->setFrom('contact@wonder-consultingrh.com', 'Wonder consulting RH');
    //$mail->FromName($name);
    $mail->addAddress('merveille@wonder-consultingrh.com','Administrateur');
    $mail->addAddress('lvswaggintello@gmail.com','IT');    // Name is optional
    $mail->addReplyTo($email, $name);
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    }
    else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}

?>
      