<?php
echo "here";
// Get the Heroku database
require_once 'db_connect.php';
$db = get_db();

echo "here1";
if(!empty($_POST['username'])) {
    $username = htmlspecialchars($_POST['username']);
    $statement = $db->prepare('SELECT * FROM gamer WHERE username = :username');
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $duplicate_gamer = $statement->fetchAll();

  if (!empty($duplicate_gamer)){
      echo "<span class='status-not-available'> Username Not Available. </span>"; 
  } else {
      echo "<span class='status-available'> Username Available. </span>";
     
}
?>
