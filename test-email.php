<?php
header('Content-Type: text/plain');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/O365Mailer.php';

echo "Testing O365 Email Send...\n\n";

$mailer = new O365Mailer();

// Test with a simple email
$testEmail = 'sales@augmentappz.ai'; // Send to admin for testing

echo "Attempting to send test email to: $testEmail\n\n";

// Simple test email
$subject = "Test Email from qRaptor";
$body = "<html><body><h1>Test</h1><p>This is a test email sent at " . date('Y-m-d H:i:s') . "</p></body></html>";

$result = $mailer->sendEmail($testEmail, $subject, $body, true);

if ($result) {
    echo "SUCCESS! Email sent successfully.\n";
} else {
    echo "FAILED! Email was not sent.\n";
    echo "\nCheck the error log for details.\n";
}

// Also try to get the token directly to see if that's the issue
echo "\n\n--- Token Test ---\n";

$tokenUrl = "https://login.microsoftonline.com/" . O365_TENANT_ID . "/oauth2/v2.0/token";

$postData = [
    'client_id' => O365_CLIENT_ID,
    'client_secret' => O365_CLIENT_SECRET,
    'scope' => O365_SCOPE,
    'grant_type' => 'client_credentials'
];

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $tokenUrl,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($postData),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded']
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

echo "Token URL: $tokenUrl\n";
echo "HTTP Code: $httpCode\n";

if ($curlError) {
    echo "cURL Error: $curlError\n";
}

if ($httpCode === 200) {
    $tokenData = json_decode($response, true);
    if (isset($tokenData['access_token'])) {
        echo "Token obtained successfully!\n";
        echo "Token type: " . ($tokenData['token_type'] ?? 'unknown') . "\n";
        echo "Expires in: " . ($tokenData['expires_in'] ?? 'unknown') . " seconds\n";
    } else {
        echo "Token response (no access_token):\n";
        print_r($tokenData);
    }
} else {
    echo "Token Error Response:\n";
    $errorData = json_decode($response, true);
    if ($errorData) {
        echo "Error: " . ($errorData['error'] ?? 'unknown') . "\n";
        echo "Description: " . ($errorData['error_description'] ?? 'none') . "\n";
    } else {
        echo $response . "\n";
    }
}
?>
