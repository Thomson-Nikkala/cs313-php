<?php
// Start the session
session_start();
// Initialize session variables
if (!isset($_SESSION['gamer'])) {
    $_SESSION['gamer'] = 1;
}
if (!isset($_SESSION['best_game'])) {
    $_SESSION['best_game'] = 0;
}
if (!isset($_SESSION['best_game_score'])) {
    $_SESSION['best_game_score'] = 0;
}
// Get the Heroku database
require_once "db_connect.php";
$db = get_db();

?>

<!DOCTYPE html>
<!--
This is the login page for the Board Game Whisperer
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
            <h1>Your Game Recommendation</h1>
        </div>
    </header>
    <div class=center-block>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="edit_profile.php">Profile</a></li>
                <li><a href="games.php">Get Games</a></li>
            </ul>
        </nav>
        <main>


            <section class="wide-section">
                <br>
                <p>
                    <?php 
                    $query = 'SELECT * FROM board_game b WHERE b.board_game = 1';
                    $statement = $db->prepare($query);
                    $statement->execute();   
                    $board_game = $statement->fetch(PDO::FETCH_ASSOC); 
                    $board_game_safe = htmlspecialchars($board_game['name']);
                    echo 'A board game you may enjoy is ' . $board_game_safe . '.  Click "GO" again for another recommendation.';
                        ?>
                </p>


                <form action="games.php" method="post">
                    <button type="submit" name="submit" class="submit_btn">Get Another Game Recommendation</button>
                </form>
                <p>Note: If you are logged in as "Guest," you will need to register before getting multiple recommendations.</p>
            </section>
        </main>
        <footer>
            <?php include("../modules/footer.php"); ?>
        </footer>
    </div>
</body>

</html>
