<?php
header('Content-Type: text/plain');

echo "Testing config.php...\n\n";

$configFile = __DIR__ . '/config.php';

if (!file_exists($configFile)) {
    echo "ERROR: config.php does not exist!\n";
    echo "Path checked: " . $configFile . "\n";
    exit;
}

echo "config.php exists at: " . $configFile . "\n";
echo "File size: " . filesize($configFile) . " bytes\n\n";

echo "Attempting to include...\n";

// Use error handling to catch syntax errors
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    echo "ERROR: $errstr in $errfile on line $errline\n";
});

try {
    include $configFile;
    echo "Config loaded successfully!\n\n";
    
    echo "Defined constants:\n";
    echo "- O365_TENANT_ID: " . (defined('O365_TENANT_ID') ? 'SET' : 'NOT SET') . "\n";
    echo "- O365_CLIENT_ID: " . (defined('O365_CLIENT_ID') ? 'SET' : 'NOT SET') . "\n";
    echo "- O365_CLIENT_SECRET: " . (defined('O365_CLIENT_SECRET') ? 'SET' : 'NOT SET') . "\n";
    echo "- SITE_URL: " . (defined('SITE_URL') ? SITE_URL : 'NOT SET') . "\n";
    echo "- ADMIN_EMAIL: " . (defined('ADMIN_EMAIL') ? ADMIN_EMAIL : 'NOT SET') . "\n";
    echo "- ADMIN_TOKEN: " . (defined('ADMIN_TOKEN') ? 'SET' : 'NOT SET') . "\n";
    echo "- DATA_DIR: " . (defined('DATA_DIR') ? DATA_DIR : 'NOT SET') . "\n";
    
} catch (Error $e) {
    echo "FATAL ERROR: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
} catch (Exception $e) {
    echo "EXCEPTION: " . $e->getMessage() . "\n";
}

echo "\n\nRaw first 500 chars of config.php:\n";
echo "---\n";
$content = file_get_contents($configFile);
// Hide secrets but show structure
$content = preg_replace('/define\(\'O365_CLIENT_SECRET\',\s*\'[^\']+\'\)/', "define('O365_CLIENT_SECRET', '***HIDDEN***')", $content);
echo substr($content, 0, 500);
echo "\n---\n";
?>
