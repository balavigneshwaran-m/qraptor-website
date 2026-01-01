<?php
/**
 * Email Verification Handler
 * Validates verification token and marks email as verified
 */

// Enable error logging for debugging
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/data/error.log');

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/RegistrationManager.php';
require_once __DIR__ . '/O365Mailer.php';

// URL decode the email parameter (handles + and special chars)
$email = isset($_GET['email']) ? urldecode(trim($_GET['email'])) : '';
$token = isset($_GET['token']) ? trim($_GET['token']) : '';

// Validate inputs
if (empty($email) || empty($token)) {
    showErrorPage('Invalid verification link', 'The verification link is incomplete or malformed.');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    showErrorPage('Invalid email', 'The email address in the verification link is invalid.');
    exit;
}

try {
    $regManager = new RegistrationManager();
    $mailer = new O365Mailer();
    
    // Check if already verified
    if ($regManager->isEmailVerified($email)) {
        showSuccessPage('Already Verified', 'Your email has already been verified. You\'re all set for qRaptor 2.0!', true);
        exit;
    }
    
    // Check if email is registered
    if (!$regManager->isEmailRegistered($email)) {
        showErrorPage('Not Found', 'This email is not in our registration list. Please register again.');
        exit;
    }
    
    // Validate token
    $validation = $regManager->validateToken($email, $token);
    
    if (!$validation['valid']) {
        $reason = $validation['reason'];
        if ($reason === 'Token expired') {
            showErrorPage('Link Expired', 'This verification link has expired. Please register again to receive a new verification email.', true);
        } else {
            showErrorPage('Invalid Link', 'This verification link is invalid or has already been used.');
        }
        exit;
    }
    
    // Mark as verified
    $verified = $regManager->verifyEmail($email);
    
    if (!$verified) {
        showErrorPage('Verification Failed', 'We couldn\'t verify your email. Please try again or contact support.');
        exit;
    }
    
    // Send welcome email
    $mailer->sendWelcomeEmail($email);
    
    // Send admin notification
    $stats = $regManager->getStats();
    $mailer->sendAdminNotification($email, $stats);
    
    // Show success page
    showSuccessPage('Email Verified!', 'Welcome to the qRaptor 2.0 early access program. We\'ll keep you updated with exclusive news and launch information.', false);
    
} catch (Exception $e) {
    error_log('Verification Error: ' . $e->getMessage());
    showErrorPage('Error', 'Something went wrong. Please try again later.');
}

/**
 * Show success page
 */
function showSuccessPage($title, $message, $alreadyVerified = false) {
    $bgColor = '#040E12';
    $greenColor = '#1dc690';
    $textColor = '#e0e0e0';
    
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title} - qRaptor 2.0</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;500;600;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Montserrat', sans-serif;
            background: {$bgColor};
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            text-align: center;
            max-width: 500px;
        }
        .icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, {$greenColor}, #15a375);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            animation: scaleIn 0.5s ease-out;
        }
        .icon svg {
            width: 40px;
            height: 40px;
            fill: white;
        }
        h1 {
            font-family: 'Lexend Deca', sans-serif;
            font-size: 32px;
            font-weight: 600;
            color: {$greenColor};
            margin-bottom: 16px;
        }
        p {
            font-size: 16px;
            color: {$textColor};
            line-height: 1.6;
            margin-bottom: 32px;
        }
        .btn {
            display: inline-block;
            padding: 14px 32px;
            background: linear-gradient(135deg, {$greenColor}, #15a375);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(29, 198, 144, 0.3);
        }
        .logo {
            margin-top: 48px;
            opacity: 0.6;
        }
        .logo svg {
            width: 120px;
            height: auto;
        }
        @keyframes scaleIn {
            from {
                transform: scale(0);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">
            <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
        </div>
        <h1>{$title}</h1>
        <p>{$message}</p>
        <a href="https://qraptor.ai" class="btn">Visit qRaptor</a>
        <div class="logo">
            <svg viewBox="0 0 200 50" fill="{$greenColor}">
                <text x="0" y="38" font-family="Lexend Deca, sans-serif" font-size="36" font-weight="600">qRaptor</text>
            </svg>
        </div>
    </div>
</body>
</html>
HTML;
}

/**
 * Show error page
 */
function showErrorPage($title, $message, $showRegisterButton = false) {
    $bgColor = '#040E12';
    $redColor = '#e74c3c';
    $greenColor = '#1dc690';
    $textColor = '#e0e0e0';
    
    $buttonHtml = $showRegisterButton ? 
        '<a href="https://qraptor.ai/v2" class="btn">Register Again</a>' :
        '<a href="https://qraptor.ai" class="btn secondary">Go to Homepage</a>';
    
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title} - qRaptor 2.0</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;500;600;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Montserrat', sans-serif;
            background: {$bgColor};
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            text-align: center;
            max-width: 500px;
        }
        .icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, {$redColor}, #c0392b);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }
        .icon svg {
            width: 40px;
            height: 40px;
            fill: white;
        }
        h1 {
            font-family: 'Lexend Deca', sans-serif;
            font-size: 32px;
            font-weight: 600;
            color: {$redColor};
            margin-bottom: 16px;
        }
        p {
            font-size: 16px;
            color: {$textColor};
            line-height: 1.6;
            margin-bottom: 32px;
        }
        .btn {
            display: inline-block;
            padding: 14px 32px;
            background: linear-gradient(135deg, {$greenColor}, #15a375);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(29, 198, 144, 0.3);
        }
        .btn.secondary {
            background: transparent;
            border: 2px solid {$greenColor};
            color: {$greenColor};
        }
        .logo {
            margin-top: 48px;
            opacity: 0.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">
            <svg viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
        </div>
        <h1>{$title}</h1>
        <p>{$message}</p>
        {$buttonHtml}
        <div class="logo">
            <svg viewBox="0 0 200 50" fill="{$greenColor}">
                <text x="0" y="38" font-family="Lexend Deca, sans-serif" font-size="36" font-weight="600">qRaptor</text>
            </svg>
        </div>
    </div>
</body>
</html>
HTML;
}
?>
