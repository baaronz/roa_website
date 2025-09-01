<?php
/**
 * Functions for Simple Registration Website
 */

function error_msg($msg = '')
{
    if (!empty($msg)) {
        $_SESSION['error_msg'] = $msg;
    } else {
        if (!empty($_SESSION['error_msg'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error_msg'] . '</div>';
            unset($_SESSION['error_msg']);
        }
    }
}

function success_msg($msg = '')
{
    if (!empty($msg)) {
        $_SESSION['success_msg'] = $msg;
    } else {
        if (!empty($_SESSION['success_msg'])) {
            echo '<div class="alert alert-success">' . $_SESSION['success_msg'] . '</div>';
            unset($_SESSION['success_msg']);
        }
    }
}

function lang($key)
{
    global $language;
    return isset($language[$key]) ? $language[$key] : $key;
}

function elang($key)
{
    echo lang($key);
}

// Core configuration function to match webexample
function get_core_config($name)
{
    $core_config = [
        'salt_field' => 'salt',
        'verifier_field' => 'verifier'
    ];
    
    if (!empty($name) && isset($core_config[$name])) {
        return $core_config[$name];
    }
    return false;
}

// SRP6 functions from webexample
function calculateSRP6Verifier($username, $password, $salt)
{
    // algorithm constants
    $g = gmp_init(7);
    $N = gmp_init('894B645E89E1535BBDAD5B8B290650530801B18EBFBF5E8FAB3C82872A3E9BB7', 16);

    // calculate first hash
    $h1 = sha1(strtoupper($username . ':' . $password), TRUE);

    // calculate second hash
    if(get_config('server_core') == 5)
    {
        $h2 = sha1(strrev($salt) . $h1, TRUE);  // From haukw
    } else {
        $h2 = sha1($salt . $h1, TRUE);
    }

    // convert to integer (little-endian)
    $h2 = gmp_import($h2, 1, GMP_LSW_FIRST);

    // g^h2 mod N
    $verifier = gmp_powm($g, $h2, $N);

    // convert back to a byte array (little-endian)
    $verifier = gmp_export($verifier, 1, GMP_LSW_FIRST);

    // pad to 32 bytes, remember that zeros go on the end in little-endian!
    $verifier = str_pad($verifier, 32, chr(0), STR_PAD_RIGHT);

    // done!
    if(get_config('server_core') == 5)
    {
        return strrev($verifier);  // From haukw
    } else {
        return $verifier;
    }
}

// Returns SRP6 parameters to register this username/password combination with
function getRegistrationData($username, $password)
{
    // generate a random salt
    $salt = random_bytes(32);

    // calculate verifier using this salt
    $verifier = calculateSRP6Verifier($username, $password, $salt);

    // done - this is what you put in the account table!
    if(get_config('server_core') == 5)
    {
        $salt = strtoupper(bin2hex($salt));             // From haukw
        $verifier = strtoupper(bin2hex($verifier));     // From haukw
    }
    
    return array($salt, $verifier);
}

function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if username exists
function check_username_exists($username)
{
    $stmt = database::$auth->prepare("SELECT id FROM account WHERE username = ?");
    $stmt->execute([$username]);
    return $stmt->fetch() ? false : true; // Return true if username doesn't exist (available)
}

// Check if email exists
function check_email_exists($email)
{
    $stmt = database::$auth->prepare("SELECT id FROM account WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch() ? false : true; // Return true if email doesn't exist (available)
}
