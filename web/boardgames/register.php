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
This is the registration page for the Board Game Whisperer
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
            <h1>New Account Registration</h1>
        </div>
    </header>
    <div class=center-block>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li id="active-nav"><a href="register.php">Register<img src="../images/yellow-arrow.png" alt=""></a></li>
                <li><a href="edit_profile.php">Profile</a></li>
                <li><a href="games.php">Get Games</a></li>
            </ul>
        </nav>
        <main>


            <section class="wide-section">
                <form action="action_page.php" method="post">
                    <br>
                    <label for="username" class="label_long"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="r_username" required /><br>
                    <label for="display_name" class="label_long"><b>Display Name</b></label>
                    <input type="text" placeholder="Enter Display Name" name="r_display_name" required /><br>
                    <label for="email" class="label_long"><b>Email</b></label>
                    <input type="text" pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" placeholder="Enter Email" required /><br>
                    <label for="password" class="label_long"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="r_password" required /><br>
                    <label for="password_repeat" class="label_long"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Enter Password" name="r_password_repeat" required /><br>
                    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                    <button type="submit" class="submit_btn">REGISTER</button>
                    <p>Already have an account? <a href="login.php">Log in</a>.</p>
                </form>
            </section>
        </main>
        <footer>
            <?php include("../modules/footer.php"); ?>
        </footer>
    </div>
</body>

</html>
