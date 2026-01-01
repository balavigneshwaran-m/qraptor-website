<?php
/**
 * qRaptor 2.0 Configuration Template
 * Copy this file to config.php and fill in your actual values
 * DO NOT commit config.php to version control
 */

// O365 OAuth2 Configuration - Get these from Azure Portal
define('O365_TENANT_ID', 'YOUR_TENANT_ID_HERE');
define('O365_CLIENT_ID', 'YOUR_CLIENT_ID_HERE');
define('O365_CLIENT_SECRET', 'YOUR_CLIENT_SECRET_HERE');
define('O365_SCOPE', 'https://graph.microsoft.com/.default');
define('O365_FROM_ADDRESS', 'no-reply@yourdomain.com');
define('O365_FROM_NAME', 'qRaptor Studio');

// Application Settings
define('SITE_URL', 'https://qraptor.ai');
define('ADMIN_EMAIL', 'admin@yourdomain.com');

// Data storage paths
define('DATA_DIR', __DIR__ . '/data');
define('REGISTRATIONS_FILE', DATA_DIR . '/registrations.json');
define('TOKENS_FILE', DATA_DIR . '/verification_tokens.json');

// Create data directory if it doesn't exist
if (!file_exists(DATA_DIR)) {
    mkdir(DATA_DIR, 0755, true);
}

// Initialize files if they don't exist
if (!file_exists(REGISTRATIONS_FILE)) {
    file_put_contents(REGISTRATIONS_FILE, json_encode([], JSON_PRETTY_PRINT));
}
if (!file_exists(TOKENS_FILE)) {
    file_put_contents(TOKENS_FILE, json_encode([], JSON_PRETTY_PRINT));
}
?>
