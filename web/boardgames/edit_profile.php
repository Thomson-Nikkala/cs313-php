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
?>
<!DOCTYPE html>
<!--
This is the edit user profile page for the Board Game Whisperer
Author: Nikkala Thomson
-->

<html lang="en-us">

<head>
    <?php $ROOT = '../';
    include '../modules/head.php'; ?>
    <title>The Board Game Whisperer</title>
</head>

<body>
    <header>
        <div id="header-band"></div>
        <div id="header-text" class="center-block">
            <h1>The Board Game Whisperer</h1>
        </div>
    </header>
    <div class=center-block>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li id="active-nav"><a href="login.php">Profile<img src="../images/yellow-arrow.png" alt=""></a></li>
                <li><a href="games.php">Get Games</a></li>
            </ul>
        </nav>
        <main>
            <section>
                <p> Welcome, <?php
                    $query = 'SELECT display_name FROM gamer g WHERE g.gamer = ' . $_SESSION["gamer"];
                    $statement = $db->prepare($query);
                    $statement->execute();   
                    $gamer_data = $statement->fetch(PDO::FETCH_ASSOC);
                    echo $gamer_data['display_name'];
                ?>!</p><br>
                <p>Edit your user profile.</p>
                <br>
                <?php
                 $query = 'SELECT preferences FROM preference p WHERE p.gamer = ' . $_SESSION["gamer"];
                 $statement = $db->prepare($query);
                 $statement->execute(); 
                 $player = $statement->fetch(PDO::FETCH_ASSOC);
                 $player_preferences = $player['preferences'];   // this ends up as a string
                 $player_prefs_json = json_decode($player_preferences);  // coerce to json object
                 $player_themes = $player_prefs_json->themes;
                 $player_mechanisms = $player_prefs_json->mechanisms;
                ?>
                <form action="edit_profile.php" method="post">
                    <p>Display Name: <input type="text" name="display_name"></p><br>
                    <p>Email: <input type="text" name="email"></p><br>
                    <input type="submit" value="Update Profile">
                </form>

            </section>


        </main>
        <footer>
            <?php include("../modules/footer.php"); ?>
        </footer>
    </div>
</body>

</html>
