<?php
// Define the base URL for your project
define('BASE_URL', 'http://localhost/examHUB/');
define('SITE_NAME', 'examHUB');

// Professional setting: Hide errors from visitors but show them to us
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the user session for login/results
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>