<?php

require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');

$mail = new PHPMailer();

//$mail->SMTPDebug = 3; // Enable verbose debug output
$mail->isSMTP(); 
$mail->Host = 'smtp.hostinger.com'; 
$mail->SMTPAuth = true; 
$mail->Username = 'no_reply@kleanmaxpro.com'; 
$mail->Password = 'tcjX~KJsqac#1'; // ✅ fixed missing quote
$mail->SMTPSecure = 'ssl'; // use 'ssl' for port 465, 'tls' for 587
$mail->Port = 465; 

$message = "";
$status = "false";

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if( $_POST['form_name'] != '' AND $_POST['form_email'] != '' AND $_POST['form_subject'] != '' ) {

        $name    = $_POST['form_name'];
        $email   = $_POST['form_email'];
        $subject = $_POST['form_subject'];
        $phone   = $_POST['form_phone'];
        $msg     = $_POST['form_message'];

        $subject = isset($subject) ? $subject : 'New Message | Contact Form';

        $botcheck = $_POST['form_botcheck'];

        $toemail = 'info@kleanmaxpro.com';
        $cc      = 'sritherss.s@gmail.com';
        $bcc     = 'kishore0288@gmail.com';

        $toname  = 'Klean Max Pro Contact Form!';

        if( $botcheck == '' ) {

            // ✅ FIX: Always use your authenticated email as sender
            $mail->SetFrom('no_reply@kleanmaxpro.com', 'Kleanmax Pro');
            $mail->AddReplyTo($email, $name); // visitor’s email goes here

            $mail->AddAddress($toemail, $toname);
            $mail->AddCC($cc, $toname);
            $mail->AddBCC($bcc, $toname);

            $mail->Subject = $subject;

            $name    = isset($name) ? "Name: $name<br><br>" : '';
            $email   = isset($email) ? "Email: $email<br><br>" : '';
            $phone   = isset($phone) ? "Phone: $phone<br><br>" : '';
            $subject = isset($subject) ? "Subject: $subject<br><br>" : '';
            $msg     = isset($msg) ? "Message: $msg<br><br>" : '';

            $referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>This Form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';

            $body = "$name $email $phone $subject $msg $referrer";

            $mail->MsgHTML($body);
            $sendEmail = $mail->Send();

            if( $sendEmail == true ):
                // --- Google App Script Webhook Integration ---
                $webhook = 'https://script.google.com/macros/s/AKfycbxRpL3iaC55SJCJ6FsVqriKJNrZjkN_sHvn1jMvm0DFlOOV2KezInIVSOLcCSGithNb2A/exec';
                $payload = json_encode([
                    'name'    => isset($name) ? $_POST['form_name'] : '',
                    'email'   => isset($email) ? $_POST['form_email'] : '',
                    'phone'   => isset($phone) ? $_POST['form_phone'] : '',
                    'date'    => date('Y-m-d H:i:s'),
                    'message' => isset($msg) ? $_POST['form_message'] : '',
                    'subject' => isset($subject) ? $_POST['form_subject'] : ''
                ]);
                $ch = curl_init($webhook);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 5); // 5 sec timeout to prevent hanging the site
                curl_exec($ch);
                curl_close($ch);
                // ---------------------------------------------

                $message = 'We have <strong>successfully</strong> received your Message and will get back to you soon.';
                $status = "true";
            else:
                $message = 'Email <strong>could not</strong> be sent.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo;
                $status = "false";
            endif;
        } else {
            $message = 'Bot <strong>Detected</strong>! Clean yourself Botster!';
            $status = "false";
        }
    } else {
        $message = 'Please <strong>Fill up</strong> all the Fields and Try Again.';
        $status = "false";
    }
} else {
    $message = 'An <strong>unexpected error</strong> occurred. Please Try Again later.';
    $status = "false";
}

$status_array = array( 'message' => $message, 'status' => $status);
echo json_encode($status_array);
?>
