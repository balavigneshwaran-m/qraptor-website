<?php
header('Content-Type: text/plain');
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Testing earlyAccessV2.php dependencies...\n\n";

// Test config
echo "1. Loading config.php...\n";
require_once __DIR__ . '/config.php';
echo "   OK!\n\n";

// Test O365Mailer
echo "2. Loading O365Mailer.php...\n";
$mailerFile = __DIR__ . '/O365Mailer.php';
if (!file_exists($mailerFile)) {
    echo "   ERROR: O365Mailer.php not found at $mailerFile\n";
} else {
    echo "   File exists, attempting to include...\n";
    require_once $mailerFile;
    echo "   OK! Class exists: " . (class_exists('O365Mailer') ? 'YES' : 'NO') . "\n";
}
echo "\n";

// Test RegistrationManager
echo "3. Loading RegistrationManager.php...\n";
$regFile = __DIR__ . '/RegistrationManager.php';
if (!file_exists($regFile)) {
    echo "   ERROR: RegistrationManager.php not found at $regFile\n";
} else {
    echo "   File exists, attempting to include...\n";
    require_once $regFile;
    echo "   OK! Class exists: " . (class_exists('RegistrationManager') ? 'YES' : 'NO') . "\n";
}
echo "\n";

// Test data directory
echo "4. Checking data directory...\n";
echo "   DATA_DIR: " . DATA_DIR . "\n";
echo "   Exists: " . (is_dir(DATA_DIR) ? 'YES' : 'NO') . "\n";
echo "   Writable: " . (is_writable(DATA_DIR) ? 'YES' : 'NO') . "\n";
echo "\n";

// Test curl
echo "5. Checking cURL...\n";
echo "   cURL enabled: " . (function_exists('curl_init') ? 'YES' : 'NO') . "\n";
echo "\n";

// Test JSON functions
echo "6. Checking JSON...\n";
echo "   json_encode: " . (function_exists('json_encode') ? 'YES' : 'NO') . "\n";
echo "   json_decode: " . (function_exists('json_decode') ? 'YES' : 'NO') . "\n";
echo "\n";

echo "All dependencies loaded successfully!\n";
echo "\nNow testing a minimal registration flow...\n";

// Try creating instances
try {
    $mailer = new O365Mailer();
    echo "O365Mailer instance created: OK\n";
} catch (Exception $e) {
    echo "O365Mailer error: " . $e->getMessage() . "\n";
}

try {
    $regManager = new RegistrationManager();
    echo "RegistrationManager instance created: OK\n";
} catch (Exception $e) {
    echo "RegistrationManager error: " . $e->getMessage() . "\n";
}
?>
