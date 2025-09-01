<?php
/**
 * User management for Simple Registration Website
 */

class user
{
    public static function post_handler()
    {
        if (!empty($_POST['langchangever'])) {
            self::lang_cookie_changer($_POST['langchange']);
        }

        if (!empty($_POST['submit'])) {
            self::register();
        }
    }

    /**
     * Language Changer
     */
    public static function lang_cookie_changer($getlang)
    {
        $supported_langs = get_config('supported_langs');
        if (!empty($supported_langs) && !empty($supported_langs[$getlang])) {
            setcookie('website_lang', $getlang);
            header("location: " . get_config("baseurl"));
            exit();
        }
    }

    /**
     * User Registration - Based on webexample structure
     */
    public static function register()
    {
        if ($_POST['submit'] != 'register' || empty($_POST['password']) || empty($_POST['repassword']) || empty($_POST['username'])) {
            return false;
        }

        $username = clean_input($_POST['username']);
        $email = !empty($_POST['email']) ? clean_input($_POST['email']) : '';
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        // Username validation
        if (!preg_match('/^[0-9A-Z-_]+$/', strtoupper($username))) {
            error_msg(lang('use_valid_username'));
            return false;
        }

        // Email validation (only if provided)
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            error_msg(lang('use_valid_email'));
            return false;
        }

        if ($password != $repassword) {
            error_msg(lang('passwords_not_equal'));
            return false;
        }

        if (!(strlen($password) >= 4 && strlen($password) <= 16)) {
            error_msg(lang('passwords_length'));
            return false;
        }

        if (!(strlen($username) >= 2 && strlen($username) <= 16)) {
            error_msg(lang('username_length'));
            return false;
        }

        // Check if email already exists (if not allowing multiple emails and email is provided)
        if (!get_config('multiple_email_use') && !empty($email) && !check_email_exists(strtoupper($email))) {
            error_msg(lang('email_exists'));
            return false;
        }

        // Check if username already exists
        if (!check_username_exists(strtoupper($username))) {
            error_msg(lang('username_exists'));
            return false;
        }

        // Create account using SRP6 method (your table structure requires this)
        try {
            // Generate SRP6 salt and verifier
            list($salt, $verifier) = getRegistrationData(strtoupper($username), $password);
            
            $data = [
                'username' => strtoupper($username),
                'salt' => $salt,
                'verifier' => $verifier,
                'email' => strtoupper($email),
                'reg_mail' => strtoupper($email), // Also set reg_mail field
                'expansion' => get_config('expansion'),
                'last_ip' => $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1',
                'last_attempt_ip' => $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1',
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
            
            database::insert('account', $data);

            success_msg(lang('account_created'));
            return true;
        } catch (Exception $e) {
            // Debug: Log the actual error
            if (get_config('debug_mode')) {
                error_msg('Registration failed: ' . $e->getMessage());
            } else {
                error_msg(lang('registration_failed'));
            }
            return false;
        }
    }
}
