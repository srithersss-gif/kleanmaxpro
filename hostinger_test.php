<?php
/**
 * KleanMax Pro - Hostinger Server Diagnostic Tool
 * Upload this to public_html/, visit it once to test, then DELETE it.
 * URL: https://yourdomain.com/hostinger_test.php
 */

// ---- Security: basic token check ----
$token = 'kleanmax2026';
if (!isset($_GET['token']) || $_GET['token'] !== $token) {
    http_response_code(403);
    die('<h2>403 Forbidden</h2><p>Access denied. Add ?token=kleanmax2026 to the URL.</p>');
}

$results = [];
$pass = '✅';
$fail = '❌';
$warn = '⚠️';

// ---- PHP Version ----
$phpVersion = phpversion();
$phpOk = version_compare($phpVersion, '7.4', '>=');
$results[] = [
    'label' => 'PHP Version',
    'value' => $phpVersion,
    'status' => $phpOk ? $pass : $fail,
    'note' => $phpOk ? 'Good (7.4+ required)' : 'UPGRADE PHP to 7.4 or 8.x in hPanel'
];

// ---- Required Extensions ----
$exts = ['openssl', 'curl', 'mbstring', 'json', 'filter'];
foreach ($exts as $ext) {
    $loaded = extension_loaded($ext);
    $results[] = [
        'label' => "PHP Extension: $ext",
        'value' => $loaded ? 'Loaded' : 'Not loaded',
        'status' => $loaded ? $pass : $warn,
        'note' => $loaded ? '' : 'Enable in hPanel PHP Extensions'
    ];
}

// ---- PHPMailer Files ----
$mailerFiles = [
    'assets/inc/phpmailer/class.phpmailer.php',
    'assets/inc/phpmailer/class.smtp.php',
    'assets/inc/sendmail.php',
    'assets/inc/quick-enquiry.php',
];
foreach ($mailerFiles as $f) {
    $exists = file_exists(__DIR__ . '/' . $f);
    $results[] = [
        'label' => "File: $f",
        'value' => $exists ? 'Found' : 'MISSING',
        'status' => $exists ? $pass : $fail,
        'note' => $exists ? '' : 'Upload this file to Hostinger'
    ];
}

// ---- Key PHP pages ----
$pages = ['index.php','contact.php','header.php','footer.php','about.php'];
foreach ($pages as $p) {
    $exists = file_exists(__DIR__ . '/' . $p);
    $results[] = [
        'label' => "Page: $p",
        'value' => $exists ? 'Found' : 'MISSING',
        'status' => $exists ? $pass : $fail,
        'note' => ''
    ];
}

// ---- .htaccess ----
$htExists = file_exists(__DIR__ . '/.htaccess');
$results[] = [
    'label' => '.htaccess',
    'value' => $htExists ? 'Found' : 'MISSING',
    'status' => $htExists ? $pass : $fail,
    'note' => $htExists ? '' : 'Upload .htaccess to public_html root'
];

// ---- site.webmanifest ----
$manifExists = file_exists(__DIR__ . '/site.webmanifest');
$results[] = [
    'label' => 'site.webmanifest',
    'value' => $manifExists ? 'Found' : 'MISSING',
    'status' => $manifExists ? $pass : $fail,
    'note' => $manifExists ? '' : 'Upload site.webmanifest to root'
];

// ---- display_errors should be OFF ----
$dispErrors = ini_get('display_errors');
$results[] = [
    'label' => 'display_errors',
    'value' => $dispErrors ? 'ON (bad for production)' : 'OFF (correct)',
    'status' => $dispErrors ? $warn : $pass,
    'note' => $dispErrors ? 'Set display_errors=Off in hPanel PHP config' : ''
];

// ---- SMTP Test (optional, only if you send the test email) ----
$smtpTestResult = null;
if (isset($_GET['test_smtp']) && $_GET['test_smtp'] == '1') {
    require_once __DIR__ . '/assets/inc/phpmailer/class.phpmailer.php';
    require_once __DIR__ . '/assets/inc/phpmailer/class.smtp.php';
    $testMail = new PHPMailer();
    $testMail->isSMTP();
    $testMail->Host       = 'smtp.hostinger.com';
    $testMail->SMTPAuth   = true;
    $testMail->Username   = 'no_reply@kleanmaxpro.com';
    $testMail->Password   = 'tcjX~KJsqac#1';
    $testMail->SMTPSecure = 'ssl';
    $testMail->Port       = 465;
    $testMail->SetFrom('no_reply@kleanmaxpro.com', 'Kleanmax Diagnostics');
    $testMail->AddAddress('info@kleanmaxpro.com', 'KleanMax Pro');
    $testMail->Subject = 'SMTP Test - Hostinger Diagnostic';
    $testMail->MsgHTML('<p>This is a test email from the Hostinger diagnostic tool. If you receive this, SMTP is working correctly!</p>');
    if ($testMail->Send()) {
        $smtpTestResult = ['status' => $pass, 'msg' => 'SMTP test email sent successfully to info@kleanmaxpro.com!'];
    } else {
        $smtpTestResult = ['status' => $fail, 'msg' => 'SMTP FAILED: ' . $testMail->ErrorInfo];
    }
}

// ---- Write Permissions ----
$tmpDir = sys_get_temp_dir();
$writable = is_writable($tmpDir);
$results[] = [
    'label' => 'Temp Dir Writable',
    'value' => $tmpDir,
    'status' => $writable ? $pass : $warn,
    'note' => $writable ? '' : 'May affect session/file upload handling'
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>KleanMax Pro — Hostinger Diagnostic</title>
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Segoe UI', sans-serif; background: #0f172a; color: #e2e8f0; padding: 30px; }
    h1 { color: #FED10C; font-size: 28px; margin-bottom: 6px; }
    .subtitle { color: #94a3b8; font-size: 14px; margin-bottom: 30px; }
    .warning-box { background: #7f1d1d; border: 1px solid #ef4444; border-radius: 10px; padding: 16px 20px; margin-bottom: 25px; color: #fca5a5; font-size: 14px; }
    table { width: 100%; border-collapse: collapse; background: #1e293b; border-radius: 12px; overflow: hidden; }
    th { background: #002244; color: #FED10C; padding: 14px 18px; text-align: left; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; }
    td { padding: 12px 18px; border-bottom: 1px solid #334155; font-size: 14px; }
    tr:last-child td { border-bottom: none; }
    tr:hover td { background: #273449; }
    .note { color: #f87171; font-size: 12px; margin-top: 4px; }
    .smtp-box { margin-top: 30px; background: #1e293b; border-radius: 12px; padding: 20px; }
    .smtp-box h2 { color: #FED10C; margin-bottom: 12px; }
    .smtp-btn { display: inline-block; margin-top: 12px; padding: 12px 28px; background: #FED10C; color: #000; font-weight: 700; border-radius: 8px; text-decoration: none; font-size: 14px; }
    .smtp-result { margin-top: 16px; padding: 14px; border-radius: 8px; font-size: 15px; }
    .smtp-result.ok { background: #14532d; color: #86efac; }
    .smtp-result.err { background: #7f1d1d; color: #fca5a5; }
    .delete-warning { margin-top: 25px; background: #431407; border: 1px solid #ea580c; border-radius: 10px; padding: 16px 20px; color: #fdba74; font-size: 14px; }
</style>
</head>
<body>

<h1>🔧 KleanMax Pro — Hostinger Diagnostic Tool</h1>
<p class="subtitle">Server environment check for Hostinger deployment. Run this after uploading files.</p>

<div class="warning-box">
    ⚠️ <strong>IMPORTANT:</strong> Delete this file (<code>hostinger_test.php</code>) from your server immediately after testing!
</div>

<table>
    <thead>
        <tr>
            <th>Check</th>
            <th>Status</th>
            <th>Value</th>
            <th>Notes</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r): ?>
        <tr>
            <td><?= htmlspecialchars($r['label']) ?></td>
            <td style="font-size:20px;"><?= $r['status'] ?></td>
            <td><?= htmlspecialchars($r['value']) ?></td>
            <td><span class="note"><?= htmlspecialchars($r['note']) ?></span></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="smtp-box">
    <h2>📧 SMTP Email Test</h2>
    <p style="color:#94a3b8; font-size:14px;">Click the button below to send a real test email via Hostinger SMTP and verify your email configuration works.</p>
    <a class="smtp-btn" href="?token=kleanmax2026&test_smtp=1">Send SMTP Test Email</a>

    <?php if ($smtpTestResult): ?>
    <div class="smtp-result <?= str_contains($smtpTestResult['msg'], 'successfully') ? 'ok' : 'err' ?>">
        <?= $smtpTestResult['status'] ?> <?= htmlspecialchars($smtpTestResult['msg']) ?>
    </div>
    <?php endif; ?>
</div>

<div class="delete-warning">
    🗑️ <strong>DELETE THIS FILE after testing!</strong> Run this in Hostinger File Manager → Right-click <code>hostinger_test.php</code> → Delete.<br>
    Or access via FTP and remove it. This file exposes server info and should never stay in production.
</div>

</body>
</html>
