<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $firstName = htmlspecialchars($data['firstName']);
    $lastName = htmlspecialchars($data['lastName']);
    $companyName = htmlspecialchars($data['companyName']);
    $jobTitle = htmlspecialchars($data['jobTitle']);
    $workEmail = filter_var($data['workEmail'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($data['message']);

    if (!$workEmail) {
        echo json_encode(["success" => false, "message" => "Invalid email address"]);
        exit;
    }

    $to = "sales@augmentappz.ai";
    $subject = "New Demo Request from $firstName $lastName";
    $body = "First Name: $firstName\nLast Name: $lastName\nCompany Name: $companyName\nJob Title: $jobTitle\nWork Email: $workEmail\nMessage: $message";
    $headers = "From: innovate@augmentappz.ai\r\nReply-To: $workEmail\r\nContent-Type: text/plain; charset=UTF-8";

    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(["success" => true, "message" => "Message sent successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to send message."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>
