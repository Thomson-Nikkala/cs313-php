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
            <h1>Edit User Profile</h1>
        </div>
    </header>
    <div class=center-block>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <li id="active-nav"><a href="login.php">Profile<img src="../images/yellow-arrow.png" alt=""></a></li>
                <li><a href="games.php">Get Games</a></li>
            </ul>
        </nav>
        <main>
            <section class="wide-section">
                <?php
                    $query = 'SELECT * FROM gamer g WHERE g.gamer = ' . $_SESSION["gamer"];
                    $statement = $db->prepare($query);
                    $statement->execute();   
                    $gamer_data = $statement->fetch(PDO::FETCH_ASSOC);
                    // sanitize here for safe display
                    $display_name_safe = htmlentities($gamer_data['display_name'], ENT_QUOTES, 'UTF-8');
                    $email_safe = htmlentities($gamer_data['email'], ENT_QUOTES, 'UTF-8');
                ?>
                <br>
                <p>Here you may edit your user profile. Username cannot be changed.</p>
                <br>

                <form action="action_page.php" method="post">
                    <label for="display_name" class="label_long"><b>Display Name</b></label>
                    <input type="text" name="display_name" value="<?php echo $display_name_safe;  ?>" required /><br>
                    <label for="email" class="label_long"><b>Email</b></label>
                    <input type="email" name="email" value="<?php echo $email_safe;  ?>" required /><br>
                    <label for="old_password" class="label_long"><b>Old Password</b></label>
                    <input type="password" placeholder="Enter Old Password" name="old_password" required /><br>
                    <label for="new_password" class="label_long"><b>New Password</b></label>
                    <input type="password" placeholder="Enter New Password (optional)" name="new_password" /><br>
                    <label for="new_password_repeat" class="label_long"><b>Repeat New Password</b></label>
                    <input type="password" placeholder="Enter New Password (optional)" name="new_password_repeat" /><br>
                    <button type="submit" class="submit_btn">UPDATE</button>
                </form>


            </section>


        </main>
        <footer>
            <?php include("../modules/footer.php"); ?>
        </footer>
    </div>
</body>

</html>
