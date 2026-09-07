<?php

require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');

$mail = new PHPMailer();
$autoresponder = new PHPMailer();

// ---- Main mailer SMTP config ----
$mail->isSMTP();
$mail->Host       = 'smtp.hostinger.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'no_reply@kleanmaxpro.com';
$mail->Password   = 'tcjX~KJsqac#1';
$mail->SMTPSecure = 'ssl';
$mail->Port       = 465;

// ---- Autoresponder SMTP config (must also be authenticated) ----
$autoresponder->isSMTP();
$autoresponder->Host       = 'smtp.hostinger.com';
$autoresponder->SMTPAuth   = true;
$autoresponder->Username   = 'no_reply@kleanmaxpro.com';
$autoresponder->Password   = 'tcjX~KJsqac#1';
$autoresponder->SMTPSecure = 'ssl';
$autoresponder->Port       = 465;

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if( $_POST['contact-form-name'] != '' AND $_POST['contact-form-email'] != '' AND $_POST['contact-form-subject'] != '' ) {

        $name    = $_POST['contact-form-name'];
        $email   = $_POST['contact-form-email'];
        $subject = $_POST['contact-form-subject'];
        $phone   = $_POST['contact-form-phone'];
        $message = $_POST['contact-form-message'];

        $subject  = isset($subject) ? $subject : 'New Message From Contact Form';
        $botcheck = $_POST['contact-form-botcheck'];

        $toemail = 'info@kleanmaxpro.com';
        $toname  = 'KleanMaxPro Website Enquiry!';

        if( $botcheck == '' ) {

            // FIX: Use authenticated email as sender; visitor email goes to ReplyTo
            $mail->SetFrom('no_reply@kleanmaxpro.com', 'Kleanmax Pro');
            $mail->AddReplyTo( $email , $name );
            $mail->AddAddress( $toemail , $toname );
            $mail->Subject = $subject;

            $autoresponder->SetFrom('no_reply@kleanmaxpro.com', 'Kleanmax Pro');
            $autoresponder->AddReplyTo( $toemail , $toname );
            $autoresponder->AddAddress( $email , $name );
            $autoresponder->Subject = 'We\'ve received your Email';

            $ar_body = "Thank you for contacting us. We will reply within 24 hours.<br><br>Regards,<br>Klean Max Pro Team.";

            $name    = isset($name)    ? "Name: $name<br><br>"       : '';
            $email   = isset($email)   ? "Email: $email<br><br>"     : '';
            $phone   = isset($phone)   ? "Phone: $phone<br><br>"     : '';
            $message = isset($message) ? "Message: $message<br><br>" : '';

            $referrer = !empty($_SERVER['HTTP_REFERER']) ? '<br><br><br>This Form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';

            $body = "$name $email $phone $message $referrer";

            $autoresponder->MsgHTML( $ar_body );
            $mail->MsgHTML( $body );
            $sendEmail = $mail->Send();

            if( $sendEmail == true ):
                // --- Google App Script Webhook Integration ---
                $webhook = 'https://script.google.com/macros/s/AKfycbxRpL3iaC55SJCJ6FsVqriKJNrZjkN_sHvn1jMvm0DFlOOV2KezInIVSOLcCSGithNb2A/exec';
                $payload = json_encode([
                    'name'    => isset($name) ? $_POST['contact-form-name'] : '',
                    'email'   => isset($email) ? $_POST['contact-form-email'] : '',
                    'phone'   => isset($phone) ? $_POST['contact-form-phone'] : '',
                    'date'    => date('Y-m-d H:i:s'),
                    'message' => isset($message) ? $_POST['contact-form-message'] : '',
                    'subject' => isset($subject) ? $_POST['contact-form-subject'] : ''
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

                $send_arEmail = $autoresponder->Send();
                echo 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';
            else:
                echo 'Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '';
            endif;
        } else {
            echo 'Bot <strong>Detected</strong>.! Clean yourself Botster.!';
        }
    } else {
        echo 'Please <strong>Fill up</strong> all the Fields and Try Again.';
    }
} else {
    echo 'An <strong>unexpected error</strong> occured. Please Try Again later.';
}

?>