<?php
// Start the session
session_start();
// Initialize session variables
if (!isset($_SESSION['gamer'])){
$_SESSION['gamer'] = 1;}
// Get the Heroku database
require_once "db_connect.php";
$db = get_db();
// Force display of all errors (for debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// If registration submitted
if (isset($_POST['r_username'])){
    
}

// If profile update submitted
if (isset(@_POST['u_display_name'])){
    
}

// If login submitted
if (isset($_POST['l_username'])){
    
}

// Redirect to games page
header("Location: games.php");
exit();
?>
