<?php
require 'PHPMailer/PHPMailerAutoload.php';
if(isset($_POST['FeedbackEmail'])) {
$name= $_POST['FeedbackName'];;
$email= $_POST['FeedbackEmail'];
$mobile= $_POST['FeedbackMobile'];
$message= $_POST['FeedbackMessage'];



$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'teamkoof@gmail.com';                 // SMTP username
$mail->Password = 'pass4koof';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to


$mail->setFrom($email, $name);
$mail->addAddress('teamkoof@gmail.com', 'Team Koof');
     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Feedback';
$mail->Body = '<hr><br>'.'Contact Name:'.$name.'<br>Contact Email: '.$email.' <br><hr><br>'.$message.'<br><br><br>'.'Thanks & Regards<br>'.$name.'<br>'.$email.'<br>'.$mobile;
$mail->addCC("mahendrabhamu08@gmail.com");
$mail->addBCC("ravirajmishra98@gmail.com");



if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {

echo '<script language="javascript">alert("Thank for contatcting us");</script>';
header("Location:/sips/home.php");
}
}
?>