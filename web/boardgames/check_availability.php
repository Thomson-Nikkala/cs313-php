<?php
// Get the Heroku database
require_once "db_connect.php";
$db = get_db();

if(!empty($_POST["username"])) {
  $statement1 = $db->prepare('SELECT * FROM gamer WHERE username=:username;');
    $statement1->bindValue(':username', $username, PDO::PARAM_STR);
    $statement1->execute();
    $duplicate_gamer = $statement1->fetch(PDO::FETCH_ASSOC);
  if (!empty($duplicate_gamer)){
      echo "<span class='status-not-available'> Username Not Available.</span>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
  }
}
?>
