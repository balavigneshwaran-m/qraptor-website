<?php
/**
 * Registration Data Manager
 * Handles storage and retrieval of registrations
 */

require_once __DIR__ . '/config.php';

class RegistrationManager {
    
    /**
     * Check if email is already registered
     */
    public function isEmailRegistered($email) {
        $email = strtolower(trim($email));
        $registrations = $this->getRegistrations();
        
        foreach ($registrations as $reg) {
            if (strtolower($reg['email']) === $email) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Check if email is verified
     */
    public function isEmailVerified($email) {
        $email = strtolower(trim($email));
        $registrations = $this->getRegistrations();
        
        foreach ($registrations as $reg) {
            if (strtolower($reg['email']) === $email && $reg['verified'] === true) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Add new registration
     */
    public function addRegistration($email, $verified = false) {
        $email = strtolower(trim($email));
        $registrations = $this->getRegistrations();
        
        // Check if already exists
        foreach ($registrations as &$reg) {
            if (strtolower($reg['email']) === $email) {
                // Update existing
                $reg['updated_at'] = date('Y-m-d H:i:s');
                if ($verified) {
                    $reg['verified'] = true;
                    $reg['verified_at'] = date('Y-m-d H:i:s');
                }
                $this->saveRegistrations($registrations);
                return $reg;
            }
        }
        
        // Add new
        $newReg = [
            'id' => uniqid('reg_'),
            'email' => $email,
            'verified' => $verified,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'verified_at' => $verified ? date('Y-m-d H:i:s') : null,
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
        ];
        
        $registrations[] = $newReg;
        $this->saveRegistrations($registrations);
        
        return $newReg;
    }
    
    /**
     * Mark email as verified
     */
    public function verifyEmail($email) {
        $email = strtolower(trim($email));
        $registrations = $this->getRegistrations();
        
        foreach ($registrations as &$reg) {
            if (strtolower($reg['email']) === $email) {
                $reg['verified'] = true;
                $reg['verified_at'] = date('Y-m-d H:i:s');
                $reg['updated_at'] = date('Y-m-d H:i:s');
                $this->saveRegistrations($registrations);
                return true;
            }
        }
        return false;
    }
    
    /**
     * Generate verification token
     */
    public function generateToken($email) {
        $email = strtolower(trim($email));
        $token = bin2hex(random_bytes(32));
        $tokens = $this->getTokens();
        
        // Remove any existing tokens for this email
        $tokens = array_filter($tokens, function($t) use ($email) {
            return strtolower($t['email']) !== $email;
        });
        
        // Add new token
        $tokens[] = [
            'email' => $email,
            'token' => $token,
            'created_at' => date('Y-m-d H:i:s'),
            'expires_at' => date('Y-m-d H:i:s', strtotime('+24 hours'))
        ];
        
        $this->saveTokens(array_values($tokens));
        
        return $token;
    }
    
    /**
     * Validate verification token
     */
    public function validateToken($email, $token) {
        $email = strtolower(trim($email));
        $tokens = $this->getTokens();
        
        foreach ($tokens as $key => $t) {
            if (strtolower($t['email']) === $email && $t['token'] === $token) {
                // Check expiry
                if (strtotime($t['expires_at']) < time()) {
                    // Token expired, remove it
                    unset($tokens[$key]);
                    $this->saveTokens(array_values($tokens));
                    return ['valid' => false, 'reason' => 'Token expired'];
                }
                
                // Valid token, remove it (one-time use)
                unset($tokens[$key]);
                $this->saveTokens(array_values($tokens));
                return ['valid' => true];
            }
        }
        
        return ['valid' => false, 'reason' => 'Invalid token'];
    }
    
    /**
     * Get all registrations
     */
    public function getRegistrations() {
        if (!file_exists(REGISTRATIONS_FILE)) {
            return [];
        }
        $content = file_get_contents(REGISTRATIONS_FILE);
        return json_decode($content, true) ?: [];
    }
    
    /**
     * Save registrations
     */
    private function saveRegistrations($registrations) {
        file_put_contents(REGISTRATIONS_FILE, json_encode($registrations, JSON_PRETTY_PRINT));
    }
    
    /**
     * Get all tokens
     */
    private function getTokens() {
        if (!file_exists(TOKENS_FILE)) {
            return [];
        }
        $content = file_get_contents(TOKENS_FILE);
        return json_decode($content, true) ?: [];
    }
    
    /**
     * Save tokens
     */
    private function saveTokens($tokens) {
        file_put_contents(TOKENS_FILE, json_encode($tokens, JSON_PRETTY_PRINT));
    }
    
    /**
     * Get registration stats
     */
    public function getStats() {
        $registrations = $this->getRegistrations();
        $total = count($registrations);
        $verified = count(array_filter($registrations, fn($r) => $r['verified'] === true));
        $pending = $total - $verified;
        
        return [
            'total' => $total,
            'verified' => $verified,
            'pending' => $pending
        ];
    }
}
?>
