<?php
// Start the session
session_start();
// Initialize session variables if not set
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
        case 'removeSplendor':
          
            $_SESSION['num_items']= $_SESSION['num_items']-$_SESSION['splendor'];
            $_SESSION['splendor']=0;
        break;

         case 'removeSagrada':
        
            $_SESSION['num_items']= $_SESSION['num_items']-$_SESSION['sagrada'];
            $_SESSION['sagrada']=0;
        break;
            
             case 'removeTicketToRide':
        
            $_SESSION['num_items']= $_SESSION['num_items']-$_SESSION['ticket'];
            $_SESSION['ticket']=0;
        break;
            
             case 'removeAzul':
          
            $_SESSION['num_items']= $_SESSION['num_items']-$_SESSION['azul'];
            $_SESSION['azul']=0;
        break;
            
             case 'removeWingspan':
  
            $_SESSION['num_items']= $_SESSION['num_items']-$_SESSION['wingspan'];
            $_SESSION['wingspan']=0;
        break;
            
        case 'empty':
	       $_SESSION['splendor'] = 0;
            $_SESSION['sagrada'] = 0;
            $_SESSION['ticket'] = 0;
            $_SESSION['azul'] = 0;
            $_SESSION['wingspan'] = 0;
            $_SESSION['num_items'] = 0;
            echo "EMPTY";
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
    <title>Checkout | Board Games for Families</title>
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

            <h2>View Cart</h2>
            <?php if ($_SESSION['num_items']==0) echo "Cart is Empty" ?>

            <div id="product-grid">
                <?php if ($_SESSION['splendor'] > 0)  echo '
                <div class="product-item">
                   <form method="post" action="viewcart.php?action=removeSplendor">

                        <div class="product-title">Splendor</div>
                        <div class="product-price">$25.00 each</div>
                        <div class="product-quantity">Quantity:' . $_SESSION['splendor'] . '
                        <div class="cart-action">
                            <input type="submit" value="Remove Splendor from Cart" class="addAction" /></div>
                    </form>
                </div>' ?>



                <?php if ($_SESSION['sagrada'] > 0)  echo '
                <div class="product-item">
                   <form method="post" action="viewcart.php?action=removeSagrada">

                        <div class="product-title">Sagrada</div>
                        <div class="product-price">$23.00 each</div>
                        <div class="product-quantity">Quantity:' . $_SESSION['sagrada'] . '
                        <div class="cart-action">
                            <input type="submit" value="Remove Sagrada from Cart" class="addAction" /></div>
                    </form>
                </div>' ?>

                <?php if ($_SESSION['ticket'] > 0)  echo '
                <div class="product-item">
                   <form method="post" action="viewcart.php?action=removeTicketToRide">

                        <div class="product-title">Splendor</div>
                        <div class="product-price">$30.00 each</div>
                        <div class="product-quantity">Quantity:' . $_SESSION['splendor'] . '
                        <div class="cart-action">
                            <input type="submit" value="Remove Ticket to Ride from Cart" class="addAction" /></div>
                    </form>
                </div>' ?>


                <?php if ($_SESSION['azul'] > 0)  echo '
                <div class="product-item">
                   <form method="post" action="viewcart.php?action=removeAzul">

                        <div class="product-title">Splendor</div>
                        <div class="product-price">$28.00 each</div>
                        <div class="product-quantity">Quantity:' . $_SESSION['splendor'] . '
                        <div class="cart-action">
                            <input type="submit" value="Remove Azul from Cart" class="addAction" /></div>
                    </form>
                </div>' ?>

                <?php if ($_SESSION['wingspan'] > 0)  echo '
                <div class="product-item">
                   <form method="post" action="viewcart.php?action=removeWingspan">

                        <div class="product-title">Splendor</div>
                        <div class="product-price">$40.00 each</div>
                        <div class="product-quantity">Quantity:' . $_SESSION['wingspan'] . '
                        <div class="cart-action">
                            <input type="submit" value="Remove Wingspan from Cart" class="addAction" /></div>
                    </form>
                </div>' ?>



            </div>
            <form method="post" action="viewcart.php?action=empty">
                <input type="submit" value="Empty Cart Completely" class="addAction" />
            </form>

            <form method="post" action="checkout.php">
                <input type="submit" id="checkout" value="Checkout" class="addAction" />
            </form>

        </main>
        <footer>
            <?php include("../modules/footer.php"); ?>
        </footer>
    </div>
</body>

</html>
