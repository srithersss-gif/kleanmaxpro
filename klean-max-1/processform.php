<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? $_POST["name"] : '';
    $number = isset($_POST["number"]) ? $_POST["number"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $option = isset($_POST["option"]) ? $_POST["option"] : '';
    $message = isset($_POST["message"]) ? $_POST["message"] : '';

    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'noreplysbbs@gmail.com'; // Replace with your SMTP username
        $mail->Password   = 'ywlo bmup lryl jobz'; // Replace with your SMTP password
        $mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl' based on your server configuration
        $mail->Port       = 587; // Change the port if necessary
        
        $mail->setFrom('noreplysbbs@gmail.com'); // Replace with your name and email address
        $mail->addAddress('info@kleanmax.com'); // Replace with the 
        $mail->addCC('noreplysbbs@gmail.com'); // Replace with the 
        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Submission from ' . $name;
        $mail->Body    ="Name: $name<br>Phone: $number<br>Email: $email<br>Option: $option<br>Message: $message";
        
        $mail->send();
        header("Location: thank_you.html"); // Redirect to a thank you page
        exit;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
