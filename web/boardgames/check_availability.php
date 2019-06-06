<?php
// Get the Heroku database
require_once "db_connect.php";
$db = get_db();
// Force display of all errors (for debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!empty($_POST["username"])) {
    $username = htmlspecialchars($_POST['username']);
    $statement = $db->prepare('SELECT * FROM gamer WHERE username=:username;');
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $duplicate_gamer = $statement->fetch(PDO::FETCH_ASSOC);
  if ($duplicate_gamer){
      echo "<span class='status-not-available'> Username Not Available. </span>" ;
  } else {
      echo "<span class='status-available'> Username Available.</span>";
  }
}
?>
