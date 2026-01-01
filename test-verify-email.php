<?php
header('Content-Type: text/plain');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/O365Mailer.php';

echo "Testing sendVerificationEmail() function...\n\n";

$mailer = new O365Mailer();

$testEmail = 'bala.friends5@gmail.com';
$verifyUrl = SITE_URL . '/verify.php?email=' . urlencode($testEmail) . '&token=test123';

echo "Email: $testEmail\n";
echo "Verify URL: $verifyUrl\n\n";

echo "Calling sendVerificationEmail()...\n";

$result = $mailer->sendVerificationEmail($testEmail, $verifyUrl);

if ($result) {
    echo "\nSUCCESS! Verification email sent.\n";
} else {
    echo "\nFAILED! sendVerificationEmail returned false.\n";
    echo "\nLet me try to debug by calling sendEmail directly with the same content...\n\n";
    
    // Try direct send
    $subject = "Confirm your qRaptor 2.0 Early Access Registration";
    $body = '<html><body><h1>Test Verification</h1><p>Click here: <a href="' . $verifyUrl . '">Verify</a></p></body></html>';
    
    $directResult = $mailer->sendEmail($testEmail, $subject, $body, true);
    
    if ($directResult) {
        echo "Direct sendEmail() worked! Issue is in the HTML template of sendVerificationEmail.\n";
    } else {
        echo "Direct sendEmail() also failed.\n";
    }
}
?>
