<?php
/**
 * Early Access Registration Handler with O365 OAuth2 Email
 * Handles email registration with duplicate prevention and verification
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/RegistrationManager.php';
require_once __DIR__ . '/O365Mailer.php';

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);
$email = isset($input['email']) ? trim($input['email']) : '';

// Validate email
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Please enter a valid email address'
    ]);
    exit;
}

try {
    $regManager = new RegistrationManager();
    $mailer = new O365Mailer();
    
    // Check if already verified
    if ($regManager->isEmailVerified($email)) {
        echo json_encode([
            'success' => true,
            'status' => 'already_verified',
            'message' => 'You\'re already registered! Check your inbox for updates about qRaptor 2.0.'
        ]);
        exit;
    }
    
    // Check if registered but not verified
    if ($regManager->isEmailRegistered($email)) {
        // Resend verification email
        $token = $regManager->generateToken($email);
        $verifyUrl = SITE_URL . '/verify.php?email=' . urlencode($email) . '&token=' . $token;
        
        $emailSent = $mailer->sendVerificationEmail($email, $verifyUrl);
        
        if ($emailSent) {
            echo json_encode([
                'success' => true,
                'status' => 'verification_resent',
                'message' => 'We\'ve sent another verification email. Please check your inbox and spam folder.'
            ]);
        } else {
            echo json_encode([
                'success' => true,
                'status' => 'pending',
                'message' => 'You have a pending registration. Please check your inbox for the verification email.'
            ]);
        }
        exit;
    }
    
    // New registration
    $registration = $regManager->addRegistration($email, false);
    $token = $regManager->generateToken($email);
    $verifyUrl = SITE_URL . '/verify.php?email=' . urlencode($email) . '&token=' . $token;
    
    // Send verification email
    $emailSent = $mailer->sendVerificationEmail($email, $verifyUrl);
    
    if ($emailSent) {
        echo json_encode([
            'success' => true,
            'status' => 'verification_sent',
            'message' => 'Thanks for your interest! Please check your email to confirm your registration.',
            'registration_id' => $registration['id']
        ]);
    } else {
        // If email fails, still show success but note the issue
        echo json_encode([
            'success' => true,
            'status' => 'registered_email_pending',
            'message' => 'You\'re registered! We\'ll send you a confirmation email shortly.',
            'registration_id' => $registration['id']
        ]);
    }
    
} catch (Exception $e) {
    error_log('Early Access Registration Error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Something went wrong. Please try again later.'
    ]);
}
?>
