<?php
/**
 * Simple Installation Script
 * Run this file once to check your server requirements and help with setup
 */

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Installation Check - Simple Registration Website</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <style>
        body { background: #f8f9fa; padding: 20px; }
        .check-item { margin-bottom: 10px; }
        .success { color: #28a745; }
        .error { color: #dc3545; }
        .warning { color: #ffc107; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='row justify-content-center'>
            <div class='col-md-8'>
                <div class='card'>
                    <div class='card-header'>
                        <h3 class='mb-0'>Installation Check</h3>
                    </div>
                    <div class='card-body'>";

// Check PHP version
echo "<div class='check-item'>";
if (version_compare(PHP_VERSION, '8.0.0', '>=')) {
    echo "<span class='success'>✓</span> PHP Version: " . PHP_VERSION . " (OK)";
} else {
    echo "<span class='error'>✗</span> PHP Version: " . PHP_VERSION . " (Requires 8.0+)";
}
echo "</div>";

// Check required extensions
$required_extensions = ['pdo', 'pdo_mysql', 'session'];
foreach ($required_extensions as $ext) {
    echo "<div class='check-item'>";
    if (extension_loaded($ext)) {
        echo "<span class='success'>✓</span> Extension: $ext (OK)";
    } else {
        echo "<span class='error'>✗</span> Extension: $ext (Missing)";
    }
    echo "</div>";
}

// Check GMP extension (for SRP6)
echo "<div class='check-item'>";
if (extension_loaded('gmp')) {
    echo "<span class='success'>✓</span> Extension: gmp (OK - SRP6 supported)";
} else {
    echo "<span class='warning'>⚠</span> Extension: gmp (Missing - SRP6 not available)";
}
echo "</div>";

// Check file permissions
$files_to_check = [
    'application/config/config.php' => 'Configuration file',
    'template/simple/tpl/' => 'Template directory',
    'application/language/' => 'Language directory'
];

foreach ($files_to_check as $file => $description) {
    echo "<div class='check-item'>";
    if (file_exists($file)) {
        if (is_writable($file) || is_writable(dirname($file))) {
            echo "<span class='success'>✓</span> $description: Readable";
        } else {
            echo "<span class='warning'>⚠</span> $description: Not writable";
        }
    } else {
        echo "<span class='error'>✗</span> $description: Not found";
    }
    echo "</div>";
}

// Check if config file exists
echo "<div class='check-item'>";
if (file_exists('application/config/config.php')) {
    echo "<span class='success'>✓</span> Configuration file exists";
} else {
    echo "<span class='error'>✗</span> Configuration file missing - please create application/config/config.php";
}
echo "</div>";

echo "<hr>
                        <h5>Next Steps:</h5>
                        <ol>
                            <li>Edit <code>application/config/config.php</code> with your database settings</li>
                            <li>Update the realmlist and server information</li>
                            <li>Set <code>debug_mode</code> to false in production</li>
                            <li>Test the registration system</li>
                        </ol>
                        
                        <div class='alert alert-info'>
                            <strong>Note:</strong> After configuration, delete this install.php file for security.
                        </div>
                        
                        <a href='index.php' class='btn btn-primary'>Go to Website</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>";
?>
