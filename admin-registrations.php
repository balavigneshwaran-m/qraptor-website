<?php
/**
 * Admin Dashboard - View Registrations
 * Protected by token authentication from config
 */

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Define showLoginPage function first (before it's called)
function showLoginPage($showError = false) {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - qRaptor 2.0</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;500;600;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: #040E12;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-box {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
        }
        h1 {
            font-family: 'Lexend Deca', sans-serif;
            font-size: 24px;
            color: #1dc690;
            margin-bottom: 8px;
            text-align: center;
        }
        .subtitle {
            color: #666;
            font-size: 13px;
            text-align: center;
            margin-bottom: 32px;
        }
        .error {
            background: rgba(231, 76, 60, 0.1);
            border: 1px solid rgba(231, 76, 60, 0.3);
            color: #e74c3c;
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            display: block;
            color: #888;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            padding: 14px 16px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 8px;
            color: #fff;
            font-size: 14px;
            margin-bottom: 20px;
        }
        input:focus {
            outline: none;
            border-color: #1dc690;
        }
        button {
            width: 100%;
            padding: 14px;
            background: #1dc690;
            color: #040E12;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        button:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>qRaptor Admin</h1>
        <p class="subtitle">Registration Dashboard</p>
        <?php if ($showError): ?>
        <div class="error">Invalid admin token. Please try again.</div>
        <?php endif; ?>
        <form method="GET" action="">
            <label>Admin Token</label>
            <input type="password" name="token" placeholder="Enter admin token" required autofocus>
            <button type="submit">Access Dashboard</button>
        </form>
    </div>
</body>
</html>
<?php
}

require_once __DIR__ . '/config.php';

// Check authentication - token comes from config.php
$providedToken = isset($_GET['token']) ? $_GET['token'] : (isset($_POST['token']) ? $_POST['token'] : '');

// Show login form if no token or invalid token
if (empty($providedToken) || $providedToken !== ADMIN_TOKEN) {
    showLoginPage($providedToken !== '' && $providedToken !== ADMIN_TOKEN);
    exit;
}

require_once __DIR__ . '/RegistrationManager.php';

$regManager = new RegistrationManager();
$registrations = $regManager->getRegistrations();
$stats = $regManager->getStats();

// Sort by created_at descending
usort($registrations, function($a, $b) {
    return strtotime($b['created_at']) - strtotime($a['created_at']);
});

// Export as CSV if requested
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="qraptor_registrations_' . date('Y-m-d') . '.csv"');
    
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Email', 'Verified', 'Created At', 'Verified At', 'IP Address']);
    
    foreach ($registrations as $reg) {
        fputcsv($output, [
            $reg['email'],
            $reg['verified'] ? 'Yes' : 'No',
            $reg['created_at'],
            $reg['verified_at'] ?? 'N/A',
            $reg['ip_address'] ?? 'N/A'
        ]);
    }
    
    fclose($output);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>qRaptor 2.0 - Registration Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;500;600;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Montserrat', sans-serif;
            background: #040E12;
            color: #e0e0e0;
            min-height: 100vh;
            padding: 40px 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            font-family: 'Lexend Deca', sans-serif;
            font-size: 28px;
            color: #1dc690;
            margin-bottom: 8px;
        }
        .subtitle {
            color: #666;
            font-size: 14px;
            margin-bottom: 32px;
        }
        .stats {
            display: flex;
            gap: 20px;
            margin-bottom: 32px;
            flex-wrap: wrap;
        }
        .stat-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px;
            padding: 24px;
            min-width: 180px;
        }
        .stat-card h3 {
            font-size: 36px;
            font-weight: 700;
            color: #1dc690;
            font-family: 'Lexend Deca', sans-serif;
        }
        .stat-card p {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-top: 4px;
        }
        .stat-card.pending h3 {
            color: #f39c12;
        }
        .actions {
            margin-bottom: 24px;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #1dc690;
            color: #040E12;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: transform 0.2s;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255,255,255,0.02);
            border-radius: 12px;
            overflow: hidden;
        }
        th, td {
            text-align: left;
            padding: 16px;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        th {
            background: rgba(255,255,255,0.03);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #888;
            font-weight: 600;
        }
        td {
            font-size: 14px;
        }
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .badge.verified {
            background: rgba(29, 198, 144, 0.2);
            color: #1dc690;
        }
        .badge.pending {
            background: rgba(243, 156, 18, 0.2);
            color: #f39c12;
        }
        .email {
            font-family: monospace;
            color: #fff;
        }
        .date {
            color: #666;
            font-size: 12px;
        }
        .empty {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }
        @media (max-width: 768px) {
            .stat-card {
                min-width: calc(50% - 10px);
            }
            th, td {
                padding: 12px 8px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>qRaptor 2.0 Early Access</h1>
        <p class="subtitle">Registration Admin Dashboard</p>
        
        <div class="stats">
            <div class="stat-card">
                <h3><?= $stats['total'] ?></h3>
                <p>Total Registrations</p>
            </div>
            <div class="stat-card">
                <h3><?= $stats['verified'] ?></h3>
                <p>Verified</p>
            </div>
            <div class="stat-card pending">
                <h3><?= $stats['pending'] ?></h3>
                <p>Pending Verification</p>
            </div>
        </div>
        
        <div class="actions">
            <a href="?token=<?= htmlspecialchars(ADMIN_TOKEN) ?>&export=csv" class="btn">Export CSV</a>
        </div>
        
        <?php if (count($registrations) === 0): ?>
        <div class="empty">
            <p>No registrations yet.</p>
        </div>
        <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Registered</th>
                    <th>Verified At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registrations as $reg): ?>
                <tr>
                    <td class="email"><?= htmlspecialchars($reg['email']) ?></td>
                    <td>
                        <?php if ($reg['verified']): ?>
                        <span class="badge verified">Verified</span>
                        <?php else: ?>
                        <span class="badge pending">Pending</span>
                        <?php endif; ?>
                    </td>
                    <td class="date"><?= $reg['created_at'] ?></td>
                    <td class="date"><?= $reg['verified_at'] ?? '-' ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
}
}
?>