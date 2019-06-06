<?php
// Start the session
session_start();
// Initialize session variables
if (!isset($_SESSION['gamer'])) {
$_SESSION['gamer'] = 1;
}
if (!isset($_SESSION['error'])) {
    $_SESSION['error']='';
}
// Get the Heroku database
require_once "db_connect.php";
$db = get_db();
// Force display of all errors (for debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// If registration submitted
if (isset($_POST['r_email'])){
    
   $username = htmlspecialchars($_POST['username']);
   $display_name = htmlspecialchars($_POST['r_display_name']);    
   $email = htmlspecialchars($_POST['r_email']);
   $password = htmlspecialchars($_POST['r_password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $password2 = htmlspecialchars($_POST['r_password2']);
      // Check for duplicate gamer username
    if ($_SESSION['duplicate_gamer']){
        // Send back to registration page
        header("Location: registration.php");
        exit();
    }
    
    $statement = $db->prepare('INSERT INTO gamer (username, display_name, email, hashed_password) VALUES (:username, :display_name, :email, :hashed_password);');
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->bindValue(':display_name', $display_name, PDO::PARAM_STR);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->bindValue(':hashed_password', $hashed_password, PDO::PARAM_STR);
    $statement->execute();
    $_SESSION['gamer'] = $db->lastInsertId();
    $gamer = $_SESSION['gamer'];
    
    $statement2 = $db->prepare('INSERT INTO preference(gamer, preferences) 
                               VALUES (:gamer, :preferences);');
    $preferences = '{ "min_players":1, "max_players":1, "min_playtime":1, "max_playtime":15, "themes":[], "min_weight":1.0, "max_weight":1.5, "mechanisms":[]}';
    $statement2->bindValue(':gamer', $gamer, PDO::PARAM_INT);
    $statement2->bindValue(':preferences', $preferences, PDO::PARAM_STR);
    $statement2->execute();
    
     // Redirect to games page
 header("Location: games.php");
 exit();
}

// If profile update submitted
else if (isset($_POST['p_display_name'])){
    $display_name = htmlspecialchars($_POST['p_display_name']);    
    $email = htmlspecialchars($_POST['p_email']);
    $old_password = htmlspecialchars($_POST['p_old_password']);
    $new_password = htmlspecialchars($_POST['p_new_password']);
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $gamer = (int)$_SESSION['gamer'];

    $statement = $db->prepare('UPDATE gamer SET display_name = :display_name, email = :email, hashed_password = :hashed_password WHERE gamer=:gamer; ');
    
    $statement->bindvalue(':gamer', $gamer, PDO::PARAM_INT);
    $statement->bindValue(':display_name', $display_name, PDO::PARAM_STR);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->bindValue(':hashed_password', $hashed_password, PDO::PARAM_STR);
    $statement->execute(); 
    
   // Redirect to games page
        header("Location: games.php");
        exit();    
}

// If login submitted
    else if (isset($_POST['l_username'])){
        $username = htmlspecialchars($_POST['l_username']); 
        $password = htmlspecialchars($_POST['l_password']);
        $statement = $db->prepare("SELECT * FROM gamer WHERE username = :username");
        $statement->bindValue(':username', $username, PDO::PARAM_STR);
        $statement->execute();
        $gamer_info = $statement->fetchAll();
        $gamer_name = $gamer_info[0]['username'];
                
// Check if username exists, if yes then verify password
        if (empty($gamer_name)) {
            // Redirect to login page
            echo "no gamer";
            header("Location: login.php");
            exit();
        } else {
            $hashed_password = $gamer_info[0]['hashed_password'];
            if(password_verify($password, $hashed_password)){
            // Update session variables
            $_SESSION["gamer"] = $gamer_info[0]['gamer'];
            // Redirect to games page
            header("Location: games.php");
            exit();
            } else {
                echo 'wrong password--needs error message and redirect here';
              // Redirect to login page
            header("Location: login.php");
            exit();  
                    
            }
            
        }   
        
    // if preferences submitted    
    } // else if (isset($_POST['go'])) {
        // Since these values are selected by dropdown and checkbox, no need for html sanitization
       // $min_players = ($_POST['min_players']);    
      //  $max_players = ($_POST['max_players']);
      //  $min_playtime = ($_POST['min_playtime']);
     //   $max_playtime = ($_POST['max_playtime']);
      //  $min_weight = ($_POST['min_weight']);
       // $max_weight = ($_POST['max_weight']);
        // These two should be arrays, could be empty
     //   if (isset($_POST['themes'])) $themes = ($_POST['themes']);
     //       else $themes = [];
      //  if (isset($_POST['mechanisms'])) $mechanisms = ($_POST['mechanisms']);
     //       else $mechanisms = [];
     //   $gamer = (int)$_SESSION['gamer'];
     
        //create json preferences statement for UPDATE
      //  $prefs_json = '';
      //  
        // '{ "min_players":1, "max_players":1, "min_playtime":1, "max_playtime":15, "themes":[], "min_weight":1.0, "max_weight":1.5, "mechanisms":[]}');

      //  $statement = $db->prepare('UPDATE gamer SET display_name = :display_name, email = :email, hashed_password = :hashed_password WHERE gamer=:gamer; ');
    
      //  $statement->bindvalue(':gamer', $gamer, PDO::PARAM_INT);
  
      //  $statement->execute(); 
        
        
        // Redirect to games page
       //   header("Location: games.php");
    //exit(); 
   // }
                
?>
