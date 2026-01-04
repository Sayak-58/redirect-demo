<?php
// Capture the data immediately
$timestamp = date("Y-m-d H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'Direct / No Referrer';
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Check if it came from Google (visual helper)
$isGoogle = (strpos($referrer, 'google.com') !== false || strpos($referrer, 'c.gle') !== false);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google VRP PoC</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f1f3f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            max-width: 600px;
            width: 90%;
            text-align: left;
            border-top: 6px solid #d93025; /* Red for 'Alert' */
        }
        h1 {
            color: #d93025;
            margin-top: 0;
            font-size: 24px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 20px;
            background-color: #e6f4ea;
            color: #137333;
        }
        .data-row {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #5f6368;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: block;
            margin-bottom: 4px;
        }
        .value {
            font-family: 'Consolas', 'Monaco', monospace;
            background: #f8f9fa;
            padding: 8px 12px;
            border-radius: 4px;
            color: #202124;
            word-break: break-all;
            border: 1px solid #dadce0;
        }
        .highlight {
            background-color: #fce8e6;
            color: #c5221f;
            border-color: #f1998e;
        }
    </style>
</head>
<body>

<div class="card">
    <h1>⚠ Vulnerability Reproduced</h1>
    
    <div>
        <span class="status-badge">OPEN REDIRECT CONFIRMED</span>
    </div>

    <div class="data-row">
        <span class="label">Origin / Referrer (The Smoking Gun):</span>
        <div class="value <?php echo $isGoogle ? 'highlight' : ''; ?>">
            <?php echo htmlspecialchars($referrer); ?>
        </div>
    </div>

    <div class="data-row">
        <span class="label">Timestamp:</span>
        <div class="value"><?php echo htmlspecialchars($timestamp); ?></div>
    </div>

    <div class="data-row">
        <span class="label">Your IP (Client):</span>
        <div class="value"><?php echo htmlspecialchars($ip); ?></div>
    </div>

    <div class="data-row">
        <span class="label">User Agent:</span>
        <div class="value" style="font-size: 12px;">
            <?php echo htmlspecialchars($userAgent); ?>
        </div>
    </div>
</div>

</body>
</html>
