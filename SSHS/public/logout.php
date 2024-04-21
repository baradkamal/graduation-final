<?php 
session_start(); // start the session

// unset all session variables
$_SESSION = array();

// destroy the session
session_destroy();

// redirect to the login page or any other page you want the user to be redirected to after logging out
header('Location: ../public/');

exit;

?>