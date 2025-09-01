<?php
/**
 * Simple Player Registration Website
 * Based on webexample structure but simplified
 */

$osType = PHP_OS;
if (version_compare(PHP_VERSION, '8.0', '<')) {
    echo "<p>Your server needs to run PHP version 8.0.0 or higher.</p>";
    exit();
}

require_once './application/loader.php';
user::post_handler();
require_once base_path . 'template/' . get_config('template') . '/tpl/main.php';
