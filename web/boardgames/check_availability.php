<?php
// Get the Heroku database
require_once "db_connect.php";
$db = get_db();

if(!empty($_POST["username"])) {
    $username = htmlspecialchars($_POST['username']);
    $statement = $db->prepare('SELECT * FROM gamer WHERE username=:username;');
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $duplicate_gamer = $statement->fetch(PDO::FETCH_ASSOC);
  if (1==1){
      echo "<span class='status-not-available'> Username Not Available.</span>" . $duplicate_gamer;
  } else {
      echo "<span class='status-available'> Username Available.</span>";
  }
}
?>
