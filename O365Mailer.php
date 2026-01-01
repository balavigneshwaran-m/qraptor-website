<?php
/**
 * O365 Email Service using Microsoft Graph API
 * Uses OAuth2 Client Credentials Flow
 */

require_once __DIR__ . '/config.php';

class O365Mailer {
    private $accessToken = null;
    private $tokenExpiry = 0;
    
    /**
     * Get OAuth2 Access Token from Microsoft
     */
    private function getAccessToken() {
        // Check if we have a valid cached token
        if ($this->accessToken && time() < $this->tokenExpiry) {
            return $this->accessToken;
        }
        
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
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode !== 200) {
            error_log("O365 Token Error: " . $response);
            return null;
        }
        
        $tokenData = json_decode($response, true);
        $this->accessToken = $tokenData['access_token'] ?? null;
        $this->tokenExpiry = time() + ($tokenData['expires_in'] ?? 3600) - 60; // 1 min buffer
        
        return $this->accessToken;
    }
    
    /**
     * Send email using Microsoft Graph API
     */
    public function sendEmail($to, $subject, $body, $isHtml = true, $replyTo = null) {
        $token = $this->getAccessToken();
        if (!$token) {
            error_log("Failed to get O365 access token");
            return false;
        }
        
        $graphUrl = "https://graph.microsoft.com/v1.0/users/" . O365_FROM_ADDRESS . "/sendMail";
        
        $emailData = [
            'message' => [
                'subject' => $subject,
                'body' => [
                    'contentType' => $isHtml ? 'HTML' : 'Text',
                    'content' => $body
                ],
                'from' => [
                    'emailAddress' => [
                        'address' => O365_FROM_ADDRESS,
                        'name' => O365_FROM_NAME
                    ]
                ],
                'toRecipients' => [
                    [
                        'emailAddress' => [
                            'address' => $to
                        ]
                    ]
                ],
                'replyTo' => [
                    [
                        'emailAddress' => [
                            'address' => $replyTo ?? ADMIN_EMAIL,
                            'name' => 'qRaptor Support'
                        ]
                    ]
                ],
                'internetMessageHeaders' => [
                    [
                        'name' => 'X-Priority',
                        'value' => '3'
                    ],
                    [
                        'name' => 'X-Mailer',
                        'value' => 'qRaptor-Studio/2.0'
                    ],
                    [
                        'name' => 'List-Unsubscribe',
                        'value' => '<mailto:' . ADMIN_EMAIL . '?subject=Unsubscribe>'
                    ]
                ]
            ],
            'saveToSentItems' => true
        ];
        
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
        curl_close($ch);
        
        if ($httpCode === 202 || $httpCode === 200) {
            return true;
        }
        
        error_log("O365 Send Error ($httpCode): " . $response);
        return false;
    }
    
    /**
     * Send verification email to user
     * @param string $email - recipient email
     * @param string $verifyUrl - full verification URL (already built with token)
     */
    public function sendVerificationEmail($email, $verifyUrl) {
        $subject = "Confirm your qRaptor 2.0 Early Access Registration";
        
        $body = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif; background-color: #040E12;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #040E12; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #0B1214; border-radius: 24px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="padding: 40px 40px 20px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1);">
                            <h1 style="margin: 0; color: #1dc690; font-size: 28px; font-weight: bold;">qRaptor 2.0</h1>
                            <p style="margin: 8px 0 0; color: rgba(255,255,255,0.6); font-size: 12px; text-transform: uppercase; letter-spacing: 2px;">Early Access Registration</p>
                        </td>
                    </tr>
                    
                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px;">
                            <h2 style="margin: 0 0 16px; color: #ffffff; font-size: 24px; font-weight: 600;">Verify Your Email</h2>
                            <p style="margin: 0 0 24px; color: rgba(255,255,255,0.7); font-size: 16px; line-height: 1.6;">
                                Thank you for registering for early access to qRaptor 2.0! Please click the button below to verify your email address and secure your spot.
                            </p>
                            
                            <!-- CTA Button -->
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" style="padding: 20px 0;">
                                        <a href="' . $verifyUrl . '" style="display: inline-block; background: linear-gradient(135deg, #1dc690, #278ab0); color: #040E12; text-decoration: none; padding: 16px 40px; border-radius: 50px; font-weight: bold; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">
                                            Verify Email Address
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            
                            <p style="margin: 24px 0 0; color: rgba(255,255,255,0.5); font-size: 13px; line-height: 1.5;">
                                Or copy and paste this link in your browser:<br>
                                <a href="' . $verifyUrl . '" style="color: #1dc690; word-break: break-all;">' . $verifyUrl . '</a>
                            </p>
                            
                            <p style="margin: 24px 0 0; color: rgba(255,255,255,0.4); font-size: 12px;">
                                This verification link expires in 24 hours.
                            </p>
                        </td>
                    </tr>
                    
                    <!-- What You Get -->
                    <tr>
                        <td style="padding: 0 40px 40px;">
                            <div style="background: rgba(29, 198, 144, 0.1); border: 1px solid rgba(29, 198, 144, 0.2); border-radius: 16px; padding: 24px;">
                                <h3 style="margin: 0 0 16px; color: #1dc690; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">What You\'ll Get</h3>
                                <ul style="margin: 0; padding: 0 0 0 20px; color: rgba(255,255,255,0.7); font-size: 14px; line-height: 2;">
                                    <li>Priority access to qRaptor 2.0</li>
                                    <li>Exclusive 25% launch discount</li>
                                    <li>Early access to beta features</li>
                                    <li>Direct founder support</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="padding: 24px 40px; background: rgba(0,0,0,0.3); text-align: center; border-top: 1px solid rgba(255,255,255,0.1);">
                            <p style="margin: 0; color: rgba(255,255,255,0.4); font-size: 12px;">
                                © 2026 qRaptor AI by AugmentAppz. All rights reserved.<br>
                                <a href="https://qraptor.ai" style="color: #1dc690; text-decoration: none;">qraptor.ai</a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';
        
        return $this->sendEmail($email, $subject, $body, true);
    }
    
    /**
     * Send confirmation email after verification
     */
    public function sendWelcomeEmail($email) {
        $subject = "Welcome to qRaptor 2.0 Early Access";
        
        $body = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif; background-color: #040E12;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #040E12; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #0B1214; border-radius: 24px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="padding: 40px 40px 20px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1);">
                            <h1 style="margin: 0; color: #1dc690; font-size: 28px; font-weight: bold;">You're In!</h1>
                            <p style="margin: 8px 0 0; color: rgba(255,255,255,0.6); font-size: 14px;">Email Verified Successfully</p>
                        </td>
                    </tr>
                    
                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px;">
                            <h2 style="margin: 0 0 16px; color: #ffffff; font-size: 22px; font-weight: 600;">Welcome to qRaptor 2.0 Early Access!</h2>
                            <p style="margin: 0 0 24px; color: rgba(255,255,255,0.7); font-size: 16px; line-height: 1.6;">
                                Your email has been verified and you\'re now officially on our priority list for qRaptor 2.0 - the Full-Stack AI-Native App Builder.
                            </p>
                            
                            <div style="background: linear-gradient(135deg, rgba(29, 198, 144, 0.15), rgba(39, 138, 176, 0.15)); border: 1px solid rgba(29, 198, 144, 0.3); border-radius: 16px; padding: 24px; margin: 24px 0;">
                                <h3 style="margin: 0 0 16px; color: #ffffff; font-size: 16px;">What\'s Coming in v2.0:</h3>
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="padding: 8px 0; color: rgba(255,255,255,0.8); font-size: 14px;">
                                            - AI Agent Orchestration
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 8px 0; color: rgba(255,255,255,0.8); font-size: 14px;">
                                            - App Workspace - Prompt to Full-Stack Apps
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 8px 0; color: rgba(255,255,255,0.8); font-size: 14px;">
                                            - One-Click Deployment (Hosted or On-Prem)
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                            <p style="margin: 0; color: rgba(255,255,255,0.6); font-size: 14px; line-height: 1.6;">
                                We\'ll notify you as soon as access is available. In the meantime, feel free to explore our current platform.
                            </p>
                            
                            <!-- CTA Button -->
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" style="padding: 32px 0 16px;">
                                        <a href="https://qraptor.ai" style="display: inline-block; background: linear-gradient(135deg, #1dc690, #278ab0); color: #040E12; text-decoration: none; padding: 14px 32px; border-radius: 50px; font-weight: bold; font-size: 13px; text-transform: uppercase; letter-spacing: 1px;">
                                            Explore qRaptor
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="padding: 24px 40px; background: rgba(0,0,0,0.3); text-align: center; border-top: 1px solid rgba(255,255,255,0.1);">
                            <p style="margin: 0; color: rgba(255,255,255,0.4); font-size: 12px;">
                                © 2026 qRaptor AI by AugmentAppz. All rights reserved.<br>
                                <a href="https://qraptor.ai" style="color: #1dc690; text-decoration: none;">qraptor.ai</a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';
        
        return $this->sendEmail($email, $subject, $body, true);
    }
    
    /**
     * Send notification to admin
     */
    public function sendAdminNotification($email, $verified = false) {
        $status = $verified ? "VERIFIED" : "PENDING VERIFICATION";
        $subject = "qRaptor 2.0 Registration: $email - $status";
        
        $body = "
New qRaptor 2.0 Early Access Registration

Email: $email
Status: $status
Date: " . date('Y-m-d H:i:s T') . "

---
This notification was sent from the qRaptor 2.0 registration system.
";
        
        return $this->sendEmail(ADMIN_EMAIL, $subject, $body, false);
    }
}
?>
