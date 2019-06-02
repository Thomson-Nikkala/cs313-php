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
    
   $username = htmlspecialchars($_POST['r_username']);
   $display_name = htmlspecialchars($_POST['r_display_name']);    
   $email = htmlspecialchars($_POST['r_email']);
   $password = htmlspecialchars($_POST['r_password']);
    
    $statement = $db->prepare('INSERT INTO gamer (username, display_name, email, password_hashed) VALUES (:username, :display_name, :email, :password);');
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->bindValue(':display_name', $display_name, PDO::PARAM_STR);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->bindValue(':password', $password, PDO::PARAM_STR);
    $statement->execute();
    $_SESSION['gamer'] = $db->lastInsertId();
    $gamer = $_SESSION['gamer'];
    
    $statement2 = $db->prepare('INSERT INTO preference(gamer, preferences) 
                               VALUES (:gamer, :preferences);');
    $preferences = '{ "min_players":1, "max_players":1, "min_playtime":1, "max_playtime":15, "themes":[], "min_weight":1.0, "max_weight":1.5, "mechanisms":[]}';
    $statement2->bindValue(':gamer', $gamer, PDO::PARAM_INT);
    $statement2->bindValue(':preferences', $preferences, PDO::PARAM_STR);
    $statement2->execute();
}

// If profile update submitted
else if (isset($_POST['p_display_name'])){
   $display_name = htmlspecialchars($_POST['p_display_name']);    
   $email = htmlspecialchars($_POST['p_email']);
   $old_password = htmlspecialchars($_POST['p_old_password']);
    $new_password = htmlspecialchars($_POST['p_new_password']);
    $gamer = $_SESSION['gamer'];
    echo 'here';
    echo $gamer;
    echo gettype($gamer);
    
  //  $statement = $db->prepare('UPDATE gamer SET display_name = :display_name, email = :email, password_hashed = :password WHERE gamer=$gamer; ');
 //   $statement->bindValue(':display_name', $display_name, PDO::PARAM_STR);
  //  $statement->bindValue(':email', $email, PDO::PARAM_STR);
  //  $statement->bindValue(':password', $new_password, PDO::PARAM_STR);
   // $statement->execute();   
}

// If login submitted
else if (isset($_POST['l_username'])){
    
}

// Redirect to games page
 header("Location: games.php");
 exit();
?>
