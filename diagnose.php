<?php
/**
 * Diagnostic endpoint - Check server setup
 */

header('Content-Type: application/json');

$diagnostics = [
    'php_version' => phpversion(),
    'server' => $_SERVER['SERVER_SOFTWARE'] ?? 'unknown',
    'document_root' => $_SERVER['DOCUMENT_ROOT'] ?? 'unknown',
    'current_dir' => __DIR__,
    'config_exists' => file_exists(__DIR__ . '/config.php'),
    'data_dir_exists' => file_exists(__DIR__ . '/data'),
    'data_dir_writable' => is_writable(__DIR__ . '/data'),
    'curl_enabled' => function_exists('curl_init'),
    'json_enabled' => function_exists('json_encode'),
    'files_in_root' => []
];

// List PHP files in root
$files = glob(__DIR__ . '/*.php');
foreach ($files as $file) {
    $diagnostics['files_in_root'][] = basename($file);
}

// Check if config can be included
if ($diagnostics['config_exists']) {
    try {
        require_once __DIR__ . '/config.php';
        $diagnostics['config_loaded'] = true;
        $diagnostics['constants_defined'] = [
            'O365_TENANT_ID' => defined('O365_TENANT_ID'),
            'O365_CLIENT_ID' => defined('O365_CLIENT_ID'),
            'O365_CLIENT_SECRET' => defined('O365_CLIENT_SECRET'),
            'SITE_URL' => defined('SITE_URL'),
            'ADMIN_EMAIL' => defined('ADMIN_EMAIL'),
            'DATA_DIR' => defined('DATA_DIR'),
        ];
        if (defined('DATA_DIR')) {
            $diagnostics['data_dir_value'] = DATA_DIR;
            $diagnostics['data_dir_exists_after_config'] = file_exists(DATA_DIR);
        }
    } catch (Exception $e) {
        $diagnostics['config_error'] = $e->getMessage();
    }
}

// Check RegistrationManager
if (file_exists(__DIR__ . '/RegistrationManager.php')) {
    $diagnostics['registration_manager_exists'] = true;
    try {
        require_once __DIR__ . '/RegistrationManager.php';
        $diagnostics['registration_manager_loaded'] = true;
    } catch (Exception $e) {
        $diagnostics['registration_manager_error'] = $e->getMessage();
    }
} else {
    $diagnostics['registration_manager_exists'] = false;
}

// Check O365Mailer
if (file_exists(__DIR__ . '/O365Mailer.php')) {
    $diagnostics['o365_mailer_exists'] = true;
    try {
        require_once __DIR__ . '/O365Mailer.php';
        $diagnostics['o365_mailer_loaded'] = true;
    } catch (Exception $e) {
        $diagnostics['o365_mailer_error'] = $e->getMessage();
    }
} else {
    $diagnostics['o365_mailer_exists'] = false;
}

echo json_encode($diagnostics, JSON_PRETTY_PRINT);
?>
