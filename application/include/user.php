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
     * User Registration
     */
    public static function register()
    {
        if ($_POST['submit'] != 'register' || empty($_POST['password']) || empty($_POST['repassword']) || empty($_POST['email']) || empty($_POST['username'])) {
            return false;
        }

        $username = clean_input($_POST['username']);
        $email = clean_input($_POST['email']);
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        // Validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            error_msg(lang('use_valid_email'));
            return false;
        }

        if ($password != $repassword) {
            error_msg(lang('passwords_not_equal'));
            return false;
        }

        if (get_config('srp6_support')) {
            if (!(strlen($password) >= 4 && strlen($password) <= 128)) {
                error_msg(lang('passwords_length'));
                return false;
            }
        } else {
            if (!(strlen($password) >= 4 && strlen($password) <= 16)) {
                error_msg(lang('passwords_length'));
                return false;
            }
        }

        // Check if username already exists
        $stmt = database::$auth->prepare("SELECT id FROM account WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            error_msg(lang('username_exists'));
            return false;
        }

        // Check if email already exists (if not allowing multiple emails)
        if (!get_config('multiple_email_use')) {
            $stmt = database::$auth->prepare("SELECT id FROM account WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                error_msg(lang('email_exists'));
                return false;
            }
        }

        // Create account
        try {
            if (get_config('srp6_support')) {
                $hash_data = generate_srp6_hash($username, $password);
                
                $stmt = database::$auth->prepare("
                    INSERT INTO account (username, email, salt, verifier, joindate, last_login, failed_logins, locked, locale, os, platform) 
                    VALUES (?, ?, ?, ?, NOW(), NOW(), 0, 0, 0, 'Win', 'WoW')
                ");
                $stmt->execute([
                    $username,
                    $email,
                    $hash_data['salt'],
                    $hash_data['verifier']
                ]);
            } else {
                // For older cores without SRP6
                $salt = random_bytes(32);
                $hash = sha1(strtoupper($username . ':' . $password));
                
                $stmt = database::$auth->prepare("
                    INSERT INTO account (username, email, sha_pass_hash, joindate, last_login, failed_logins, locked, locale, os, platform) 
                    VALUES (?, ?, ?, NOW(), NOW(), 0, 0, 0, 'Win', 'WoW')
                ");
                $stmt->execute([
                    $username,
                    $email,
                    $hash
                ]);
            }

            success_msg(lang('account_created'));
            return true;
        } catch (PDOException $e) {
            error_msg(lang('registration_failed'));
            return false;
        }
    }
}
