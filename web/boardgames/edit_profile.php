<?php
// Start the session
session_start();
// Initialize session variables
if (!isset($_SESSION['gamer'])){
$_SESSION['gamer'] = 1;}
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
                <li id="active-nav"><a href="login.php">Edit Profile<img src="../images/yellow-arrow.png" alt=""></a></li>
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



            </section>


        </main>
        <footer>
            <?php include("../modules/footer.php"); ?>
        </footer>
    </div>
</body>

</html>
