<?php
/**
 * Debug endpoint - Check registration status
 * Access: /debug-reg.php?email=youremail@example.com&token=admintoken
 */

header('Content-Type: application/json');

require_once __DIR__ . '/config.php';

$providedToken = isset($_GET['token']) ? $_GET['token'] : '';

if ($providedToken !== ADMIN_TOKEN) {
    http_response_code(403);
    echo json_encode(['error' => 'Invalid admin token']);
    exit;
}

require_once __DIR__ . '/RegistrationManager.php';

$email = isset($_GET['email']) ? urldecode(trim($_GET['email'])) : '';

$regManager = new RegistrationManager();

// Get all data for debugging
$debug = [
    'email_searched' => $email,
    'email_lowercase' => strtolower($email),
    'data_dir_exists' => file_exists(DATA_DIR),
    'data_dir_writable' => is_writable(DATA_DIR),
    'registrations_file_exists' => file_exists(REGISTRATIONS_FILE),
    'tokens_file_exists' => file_exists(TOKENS_FILE),
    'registrations' => [],
    'tokens' => [],
    'is_registered' => false,
    'is_verified' => false
];

// Read raw files
if (file_exists(REGISTRATIONS_FILE)) {
    $content = file_get_contents(REGISTRATIONS_FILE);
    $debug['registrations_raw'] = $content;
    $debug['registrations'] = json_decode($content, true);
}

if (file_exists(TOKENS_FILE)) {
    $content = file_get_contents(TOKENS_FILE);
    $debug['tokens_raw'] = $content;
    $debug['tokens'] = json_decode($content, true);
}

if (!empty($email)) {
    $debug['is_registered'] = $regManager->isEmailRegistered($email);
    $debug['is_verified'] = $regManager->isEmailVerified($email);
}

$debug['stats'] = $regManager->getStats();

echo json_encode($debug, JSON_PRETTY_PRINT);
?>
