<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $email = filter_var($data['workEmail'] ?? $data['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $firstName = htmlspecialchars($data['firstName'] ?? 'Early Access');
    $lastName = htmlspecialchars($data['lastName'] ?? 'Registration');
    $companyName = htmlspecialchars($data['companyName'] ?? 'Version 2.0');
    $jobTitle = htmlspecialchars($data['jobTitle'] ?? 'Early Registrant');
    $message = htmlspecialchars($data['message'] ?? '');

    if (!$email) {
        echo json_encode(["success" => false, "message" => "Invalid email address"]);
        exit;
    }

    $to = "sales@augmentappz.ai";
    $subject = "🚀 qRaptor 2.0 Early Access Registration - $email";
    
    $body = "=== qRaptor 2.0 Early Access Registration ===\n\n";
    $body .= "Email: $email\n";
    $body .= "Registration Type: $firstName $lastName\n";
    $body .= "Source: $companyName\n";
    $body .= "Category: $jobTitle\n";
    $body .= "Registration Date: " . date('Y-m-d H:i:s') . "\n";
    if ($message) {
        $body .= "\nAdditional Info:\n$message\n";
    }
    $body .= "\n---\nThis registration was submitted from the qRaptor website early access popup.";
    
    $headers = "From: innovate@augmentappz.ai\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

    if (mail($to, $subject, $body, $headers)) {
        // Also send confirmation to the user
        $userSubject = "Welcome to qRaptor 2.0 Early Access! 🎉";
        $userBody = "Hi there!\n\n";
        $userBody .= "Thank you for registering for early access to qRaptor 2.0!\n\n";
        $userBody .= "You're now on our priority list and will be among the first to know when we launch.\n\n";
        $userBody .= "What to expect:\n";
        $userBody .= "• Priority access to qRaptor 2.0\n";
        $userBody .= "• 25% exclusive launch discount\n";
        $userBody .= "• Early access to beta features\n";
        $userBody .= "• Direct founder support\n\n";
        $userBody .= "Stay tuned for exciting updates!\n\n";
        $userBody .= "Best regards,\n";
        $userBody .= "The qRaptor Team\n";
        $userBody .= "https://qraptor.ai\n";
        
        $userHeaders = "From: innovate@augmentappz.ai\r\nReply-To: innovate@augmentappz.ai\r\nContent-Type: text/plain; charset=UTF-8";
        mail($email, $userSubject, $userBody, $userHeaders);
        
        echo json_encode(["success" => true, "message" => "Registration successful!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to process registration."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>
