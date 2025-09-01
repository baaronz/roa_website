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

function generate_srp6_hash($username, $password, $salt = null)
{
    if ($salt === null) {
        $salt = random_bytes(32);
    }
    
    $g = gmp_init(7);
    $N = gmp_init('894B645E89E1535BBDAD5B8B290650530801B18EBFBF5E8FAB3C82872A3E9BB7', 16);
    
    $h1 = sha1(strtoupper($username . ':' . $password), true);
    $h2 = sha1($salt . $h1, true);
    
    $h2_gmp = gmp_import($h2);
    $verifier = gmp_powm($g, $h2_gmp, $N);
    
    return [
        'salt' => bin2hex($salt),
        'verifier' => str_pad(gmp_export($verifier), 32, "\x00", STR_PAD_LEFT)
    ];
}

function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
