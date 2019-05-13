<?php
// Start the session
session_start();
// Initialize session variables
if (!isset($_SESSION['num_items'])){
$_SESSION['splendor'] = 0;
$_SESSION['sagrada'] = 0;
$_SESSION['ticket'] = 0;
$_SESSION['azul'] = 0;
$_SESSION['wingspan'] = 0;
$_SESSION['num_items'] = 0;
}

?>

<!DOCTYPE html>
<!--
This is confirmation page for the PHP Shopping Simulator for Board Games for Families
Author: Nikkala Thomson
-->

<html lang="en-us">

<head>
    <?php $ROOT = '../';
    include '../modules/head.php'; ?>
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/shopping_style.css" />
    <title>Confirmation | Board Games for Families</title>
</head>

<body>
    <header>
        <?php include("../modules/header.php"); ?>
    </header>
    <div class=center-block>

        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../links.php">Links</a></li>
                <li id="active-nav"><a href=".">Shopping<img src="../images/yellow-arrow.png" alt=""></a></li>
            </ul>
        </nav>
        <main>

            <h2>Purchase Confirmed</h2>

            <div><?php if ($_SESSION["splendor"]>0) echo $_SESSION["splendor"] . ' Splendor: $' . (25*$_SESSION["splendor"]) ?> </div>

            <div><?php if ($_SESSION["sagrada"]>0) echo $_SESSION["sagrada"] . ' Sagrada: $' . (23*$_SESSION["sagrada"]) ?> </div>

            <div><?php if ($_SESSION["ticket"]>0) echo $_SESSION["ticket"] . ' Ticket to Ride: $' . (30*$_SESSION["ticket"]) ?> </div>

            <div><?php if ($_SESSION["azul"]>0) echo $_SESSION["azul"] . ' Azul: $' . (28*$_SESSION["azul"]) ?> </div>

            <div><?php if ($_SESSION["wingspan"]>0) echo $_SESSION["wingspan"] . ' Wingspan: $' . (40*$_SESSION["wingspan"]) ?> </div>


            <div><?php echo 'Total: $' . ((25*$_SESSION["splendor"])+(23*$_SESSION["sagrada"])+(30*$_SESSION["ticket"])+(28*$_SESSION["azul"])+(40*$_SESSION["wingspan"])) ?></div><br>


            Name: <?php echo $_POST["name"]; ?><br>
            Address: <?php echo $_POST["address"]; ?><br>
            City: <?php echo $_POST["city"]; ?><br>
            Zip Code:<?php echo $_POST["zipcode"]; ?><br>

            <!-- Clear session for next purchase.-->
            <?php session_destroy(); ?>

        </main>
        <footer>
            <?php include("../modules/footer.php"); ?>
        </footer>
    </div>
</body>

</html>
