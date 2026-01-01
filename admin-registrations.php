<?php
/**
 * Admin Dashboard - View Registrations
 * Protected by simple token authentication
 */

// Simple auth token (change this in production)
$adminToken = 'qraptor2024admin';

// Check authentication
$providedToken = isset($_GET['token']) ? $_GET['token'] : '';
if ($providedToken !== $adminToken) {
    http_response_code(403);
    echo '<!DOCTYPE html><html><head><title>Access Denied</title></head><body><h1>Access Denied</h1><p>Invalid admin token.</p></body></html>';
    exit;
}

require_once __DIR__ . '/config.php';
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
            <a href="?token=<?= $adminToken ?>&export=csv" class="btn">Export CSV</a>
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
