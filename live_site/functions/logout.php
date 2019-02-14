<?php

include_once 'security_functions.php';
session_start();
 
// Unset all session values 
$_SESSION = array();
 
// get session parameters 
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// Destroy session 
session_destroy();
header('Location: ../index.php');

?>