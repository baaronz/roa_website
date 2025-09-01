<?php
/**
 * Core Handler for Simple Registration Website
 */

function get_config($key)
{
    global $config;
    return isset($config[$key]) ? $config[$key] : null;
}
