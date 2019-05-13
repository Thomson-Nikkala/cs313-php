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

if (! empty ($_GET['action'])) { 
    switch($_GET['action']) {
        case 'addSplendor':
            $_SESSION['splendor']++;
            $_SESSION['num_items']++;
        break;

        case 'addSagrada':
            $_SESSION['sagrada']++;
            $_SESSION['num_items']++;
        break;

        case 'addTicketToRide':
            $_SESSION['ticket']++;
            $_SESSION['num_items']++;
            break;

        case 'addAzul':
            $_SESSION['azul']++;
            $_SESSION['num_items']++;
        break;

        case 'addWingspan':
            $_SESSION['wingspan']++;
            $_SESSION['num_items']++;
        break;

    }
}

?>

<!DOCTYPE html>
<!--
This is PHP Shopping Simulator for Board Games for Families
Author: Nikkala Thomson
-->

<html lang="en-us">

<head>
    <?php $ROOT = '../';
    include '../modules/head.php'; ?>
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/shopping_style.css" />
    <title>Shopping | Board Games for Families</title>
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

            <h2>Browse Items</h2>

            <div id="shopping-cart">
                <div>Shopping Cart: <?php echo $_SESSION["num_items"] ?></div>
                <a href="viewcart.php">View Cart</a>
            </div>

            <div id="product-grid">
                <div class="product-item">
                    <form method="post" action="index.php?action=addSplendor">
                        <div class="product-image"><img src="../images/splendor.jpg"></div>
                        <div class="product-title">Splendor</div>
                        <div class="product-price">$25.00</div>
                        <div class="cart-action">
                            <input type="submit" value="Add to Cart" class="addAction" /></div>
                    </form>
                </div>

                <div class="product-item">
                    <form method="post" action="index.php?action=addSagrada">
                        <div class="product-image"><img src="../images/sagrada.jpg"></div>
                        <div class="product-title">Sagrada</div>
                        <div class="product-price">$23.00</div>
                        <div class="cart-action">
                            <input type="submit" value="Add to Cart" class="addAction" /></div>
                    </form>
                </div>


                <div class="product-item">
                    <form method="post" action="index.php?action=addTicketToRide">
                        <div class="product-image"><img src="../images/ticket.jpg"></div>
                        <div class="product-title">Ticket to Ride</div>
                        <div class="product-price">$30.00</div>
                        <div class="cart-action">
                            <input type="submit" value="Add to Cart" class="addAction" /></div>
                    </form>
                </div>


                <div class="product-item">
                    <form method="post" action="index.php?action=addAzul">
                        <div class="product-image"><img src="../images/azul.jpg"></div>
                        <div class="product-title">Azul</div>
                        <div class="product-price">$28.00</div>
                        <div class="cart-action">
                            <input type="submit" value="Add to Cart" class="addAction" /></div>
                    </form>
                </div>

                <div class="product-item">
                    <form method="post" action="index.php?action=addWingspan">
                        <div class="product-image"><img src="../images/wingspan.jpg"></div>
                        <div class="product-title">Wingspan</div>
                        <div class="product-price">$40.00</div>
                        <div class="cart-action">
                            <input type="submit" value="Add to Cart" class="addAction" /></div>
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <?php include("../modules/footer.php"); ?>
        </footer>
    </div>
</body>

</html>
