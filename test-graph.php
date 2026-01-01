<?php
header('Content-Type: text/plain');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/config.php';

echo "Testing Microsoft Graph Send Mail API...\n\n";

// Step 1: Get token
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
curl_close($ch);

$tokenData = json_decode($response, true);
$token = $tokenData['access_token'] ?? null;

if (!$token) {
    echo "Failed to get token!\n";
    exit;
}

echo "1. Token obtained: OK\n\n";

// Step 2: Try to send email
$fromAddress = O365_FROM_ADDRESS;
$graphUrl = "https://graph.microsoft.com/v1.0/users/" . $fromAddress . "/sendMail";

echo "2. Graph URL: $graphUrl\n\n";

$emailData = [
    'message' => [
        'subject' => 'Test from qRaptor',
        'body' => [
            'contentType' => 'HTML',
            'content' => '<h1>Test</h1><p>Test email at ' . date('Y-m-d H:i:s') . '</p>'
        ],
        'from' => [
            'emailAddress' => [
                'address' => $fromAddress,
                'name' => O365_FROM_NAME
            ]
        ],
        'toRecipients' => [
            [
                'emailAddress' => [
                    'address' => 'bala.friends5@gmail.com'
                ]
            ]
        ]
    ],
    'saveToSentItems' => true
];

echo "3. Email payload:\n";
echo json_encode($emailData, JSON_PRETTY_PRINT) . "\n\n";

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $graphUrl,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($emailData),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json'
    ]
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

echo "4. Response HTTP Code: $httpCode\n";

if ($curlError) {
    echo "   cURL Error: $curlError\n";
}

if ($httpCode === 202 || $httpCode === 200) {
    echo "\nSUCCESS! Email sent!\n";
} else {
    echo "\nFAILED! Response body:\n";
    $errorData = json_decode($response, true);
    if ($errorData) {
        echo json_encode($errorData, JSON_PRETTY_PRINT) . "\n";
    } else {
        echo $response . "\n";
    }
}

// Also test if we can access the user
echo "\n\n--- Testing User Access ---\n";
$userUrl = "https://graph.microsoft.com/v1.0/users/" . $fromAddress;

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $userUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json'
    ]
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "User lookup for $fromAddress:\n";
echo "HTTP Code: $httpCode\n";

if ($httpCode === 200) {
    $userData = json_decode($response, true);
    echo "User found: " . ($userData['displayName'] ?? 'unknown') . "\n";
} else {
    echo "Error:\n";
    $errorData = json_decode($response, true);
    if ($errorData) {
        echo json_encode($errorData, JSON_PRETTY_PRINT) . "\n";
    }
}
?>
