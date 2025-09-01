<?php
/**
 * Database Test File
 * Run this to check if database connection and table structure are working
 */

// Include the configuration
require_once 'application/config/config.php';
require_once 'application/include/core_handler.php';
require_once 'application/include/functions.php';
require_once 'application/include/database.php';

echo "<h2>Database Connection Test</h2>";

try {
    // Test database connection
    database::db_connect();
    echo "<p style='color: green;'>✓ Database connection successful!</p>";
    
    // Test if account table exists
    $stmt = database::$auth->prepare("SHOW TABLES LIKE 'account'");
    $stmt->execute();
    if ($stmt->fetch()) {
        echo "<p style='color: green;'>✓ Account table exists!</p>";
        
        // Show table structure
        $stmt = database::$auth->prepare("DESCRIBE account");
        $stmt->execute();
        $columns = $stmt->fetchAll();
        
        echo "<h3>Account Table Structure:</h3>";
        echo "<table border='1' style='border-collapse: collapse;'>";
        echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
        foreach ($columns as $column) {
            echo "<tr>";
            echo "<td>" . $column['Field'] . "</td>";
            echo "<td>" . $column['Type'] . "</td>";
            echo "<td>" . $column['Null'] . "</td>";
            echo "<td>" . $column['Key'] . "</td>";
            echo "<td>" . $column['Default'] . "</td>";
            echo "<td>" . $column['Extra'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        // Test a simple insert (will be rolled back)
        echo "<h3>Testing Insert Operation:</h3>";
        database::$auth->beginTransaction();
        
        try {
            // Generate SRP6 salt and verifier for test
            list($salt, $verifier) = getRegistrationData('TEST_USER', 'testpass');
            
            $test_data = [
                'username' => 'TEST_USER',
                'salt' => $salt,
                'verifier' => $verifier,
                'email' => 'test@test.com',
                'reg_mail' => 'test@test.com',
                'expansion' => get_config('expansion'),
                'last_ip' => '127.0.0.1',
                'last_attempt_ip' => '127.0.0.1',
                'failed_logins' => 0,
                'locked' => 0,
                'lock_country' => '00',
                'online' => 0,
                'Flags' => 0,
                'mutetime' => 0,
                'mutereason' => '',
                'muteby' => '',
                'locale' => 0,
                'os' => 'Win',
                'recruiter' => 0,
                'totaltime' => 0,
                'restore_key' => '1'
            ];
            
            // Filter out empty values
            $filtered_data = array_filter($test_data, function($value) {
                return $value !== '' && $value !== null;
            });
            
            $columns = implode(', ', array_keys($filtered_data));
            $placeholders = ':' . implode(', :', array_keys($filtered_data));
            
            $sql = "INSERT INTO account ($columns) VALUES ($placeholders)";
            echo "<p>SQL Query: " . htmlspecialchars($sql) . "</p>";
            echo "<p>Data: " . htmlspecialchars(print_r($filtered_data, true)) . "</p>";
            
            $stmt = database::$auth->prepare($sql);
            $result = $stmt->execute($filtered_data);
            
            if ($result) {
                echo "<p style='color: green;'>✓ Insert test successful!</p>";
            } else {
                echo "<p style='color: red;'>✗ Insert test failed!</p>";
                echo "<p>Error: " . implode(", ", $stmt->errorInfo()) . "</p>";
            }
            
        } catch (Exception $e) {
            echo "<p style='color: red;'>✗ Insert test failed with exception: " . $e->getMessage() . "</p>";
        }
        
        // Rollback the test insert
        database::$auth->rollBack();
        echo "<p style='color: blue;'>Test insert rolled back.</p>";
        
    } else {
        echo "<p style='color: red;'>✗ Account table does not exist!</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Database test failed: " . $e->getMessage() . "</p>";
}

echo "<h3>Configuration Check:</h3>";
echo "<p>Database Host: " . get_config('db_auth_host') . "</p>";
echo "<p>Database Name: " . get_config('db_auth_dbname') . "</p>";
echo "<p>Database User: " . get_config('db_auth_user') . "</p>";
echo "<p>SRP6 Support: " . (get_config('srp6_support') ? 'Yes' : 'No') . "</p>";
echo "<p>Expansion: " . get_config('expansion') . "</p>";
echo "<p>Debug Mode: " . (get_config('debug_mode') ? 'Yes' : 'No') . "</p>";
?>
