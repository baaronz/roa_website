<?php
/**
 * Configuration for Simple Player Registration Website
 * Based on webexample but simplified
 */

// Basic Configuration
$config['baseurl'] = "http://localhost"; // Must be a valid URL
$config['page_title'] = "Player Registration"; // Website title
$config['language'] = "english"; // Default language
$config['supported_langs'] = [ // Supported languages
    'english' => 'English',
];

// Debug Mode
$config['debug_mode'] = true; // Set to false in production

// Server Information
$config['realmlist'] = 'logon.myserver.com'; // Your server realmlist
$config['game_version'] = '3.3.5a (12340)'; // Game version

// Server Core Type
$config['server_core'] = 0; // 0 = TrinityCore, 1 = AzerothCore, etc.

// SRP6 Password Encryption
$config['srp6_support'] = true; // Enable for modern cores
$config['srp6_version'] = 2; // SRP6 version

// Multiple Email Account Creation
$config['multiple_email_use'] = false; // Allow multiple accounts per email

// Template Selection
$config['template'] = 'simple'; // Our simple template

// Database Configuration
$config['db_auth_host'] = 'localhost';
$config['db_auth_port'] = '3306';
$config['db_auth_user'] = 'acore';
$config['db_auth_pass'] = 'acore';
$config['db_auth_dbname'] = 'acore_auth';

// Character Database (if needed)
$config['realmlists'] = [
    [
        'realmid' => 1,
        'db_host' => 'localhost',
        'db_port' => '3306',
        'db_user' => 'acore',
        'db_pass' => 'acore',
        'db_name' => 'acore_characters'
    ]
];

// Script Version
$config['script_version'] = '2.0.2';
