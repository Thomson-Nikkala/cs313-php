<?php
// Start the session
session_start();

if (!empty($_POST['name'])&&!empty($_POST['address'])&&!empty($_POST['city'])&&!empty($_POST['state'])&&!empty($_POST['zipcode'])) {
        header('Location: confirmation.php');
    }


// Initialize session variables if not set
if (!isset($_SESSION['num_items'])){
$_SESSION['splendor'] = 0;
$_SESSION['sagrada'] = 0;
$_SESSION['ticket'] = 0;
$_SESSION['azul'] = 0;
$_SESSION['wingspan'] = 0;
$_SESSION['num_items'] = 0;
}

if (!isset($_SESSION['name'])) $_SESSION['name']='';
if (!isset($_SESSION['address'])) $_SESSION['address']='';
if (!isset($_SESSION['city'])) $_SESSION['city']='';
if (!isset($_SESSION['state'])) $_SESSION['state']='';
if (!isset($_SESSION['zipcode'])) $_SESSION['zipcode']='';

?>

<!DOCTYPE html>
<!--
This is the checkout for the PHP Shopping Simulator for Board Games for Families
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

            <h2>Checkout</h2>

            <div><?php if ($_SESSION["splendor"]>0) echo $_SESSION["splendor"] . ' Splendor: $' . (25*$_SESSION["splendor"]) ?> </div>

            <div><?php if ($_SESSION["sagrada"]>0) echo $_SESSION["sagrada"] . ' Sagrada: $' . (23*$_SESSION["sagrada"]) ?> </div>

            <div><?php if ($_SESSION["ticket"]>0) echo $_SESSION["ticket"] . ' Ticket to Ride: $' . (30*$_SESSION["ticket"]) ?> </div>

            <div><?php if ($_SESSION["azul"]>0) echo $_SESSION["azul"] . ' Azul: $' . (28*$_SESSION["azul"]) ?> </div>

            <div><?php if ($_SESSION["wingspan"]>0) echo $_SESSION["wingspan"] . ' Wingspan: $' . (40*$_SESSION["wingspan"]) ?> </div>


            <div><?php echo 'Total: $' . ((25*$_SESSION["splendor"])+(23*$_SESSION["sagrada"])+(30*$_SESSION["ticket"])+(28*$_SESSION["azul"])+(40*$_SESSION["wingspan"])) ?></div><br>

            <?php
// define variables and set to empty values
$nameErr = $addressErr = $cityErr = $stateErr = $zipcodeErr = "";
$name = $address = $city = $state = $zipcode = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $_SESSION['name'] = $name = test_input($_POST['name']);
  }
  
  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $_SESSION['address'] = $address = test_input($_POST["address"]);
  }
    
    if (empty($_POST["city"])) {
     $cityErr = "City is required";
  } else {
    $_SESSION['city'] = $city = test_input($_POST["city"]);
  }
    
    if (empty($_POST["state"])) {
    $stateErr = "State is required";
  } else {
    $_SESSION['state'] = $state = test_input($_POST["state"]);
  }
    
    if (empty($_POST["zipcode"])) {
    $zipcodeErr = "Zip code is required";
  } else {
    $_SESSION['zipcode'] = $zipcode = test_input($_POST["zipcode"]);
  }

    
    
}

 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                Name: <input type="text" name="name" value="<?php echo $name;?>"><?php echo $nameErr;?><br>
                Street Address: <input type="text" name="address" value="<?php echo $_SESSION['address'];?>"><?php echo $addressErr;?><br>
                City: <input type="text" name="city" value="<?php echo $city;?>"><?php echo $cityErr;?><br>
                State: <input type="text" name="state" value="<?php echo $state;?>"><?php echo $stateErr;?><br>
                Zip Code: <input type="text" name="zipcode" value="<?php echo $zipcode;?>"><?php echo $zipcodeErr;?><br>
                <input type="submit" id="confirm" value="Confirm Purchase" class="addAction" />
            </form>

            <form method="post" action="viewcart.php">
                <input type="submit" id="return" value="Return to Cart" class="addAction" />
            </form>

        </main>
        <footer>
            <?php include("../modules/footer.php"); ?>
        </footer>
    </div>
</body>

</html>
