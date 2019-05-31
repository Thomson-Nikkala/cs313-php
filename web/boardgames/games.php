<?php
// Start the session
session_start();
// Initialize session variables
if (!isset($_SESSION['gamer'])){
$_SESSION['gamer'] = 1;}
// Get the Heroku database
require_once "db_connect.php";
$db = get_db();
?>

<!DOCTYPE html>
<!--
This is the Games page for The Board Game Whisperer
Author: Nikkala Thomson
-->

<!-- From the Reading, how to access data from a database with SELECT
$stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);  -->

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
                <li id="active-nav"><a href="games.php">Games<img src="../images/yellow-arrow.png" alt=""></a></li>
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

                <p>Change your gaming preferences if you wish. Your current values are:</p><br>

                <?php
                echo 'testing';
                 $query = 'SELECT preferences->>"min_players" AS "min_players" FROM preference p WHERE p.gamer = ' . $_SESSION["gamer"];
                 $statement = $db->prepare($query);
                echo 'testing 3';
                 $statement->execute(); 
         echo ' testing 2';
                    $min_player_data = $statement->fetch(PDO::FETCH_ASSOC);
               // echo $min_player_data['min_players'] . 'testing2';
                ?>


                <form action="games.php" method="post">
                    <p>Minimum number of players:</p> <select name="min_players">
                        <option value="one">1</option>
                        <option value="two">2</option>
                        <option value="three">3</option>
                        <option value="four">4</option>
                        <option value="five">5</option>
                        <option value="six">6</option>
                        <option value="seven">7</option>
                        <option value="eight">8</option>
                        <option value="nine">9</option>
                        <option value="ten">10</option>
                    </select>
                    <p>Maximum number of players:</p> <select name="max_players">
                        <option value="one">1</option>
                        <option value="two">2</option>
                        <option value="three">3</option>
                        <option value="four">4</option>
                        <option value="five">5</option>
                        <option value="six">6</option>
                        <option value="seven">7</option>
                        <option value="eight">8</option>
                        <option value="nine">9</option>
                        <option value="ten">10+</option>
                    </select>
                    <p>Minimum playing time (in minutes):</p> <select name="min_playtime">
                        <option value="1">1</option>
                        <option value="15">15</option>
                        <option value="30">30</option>
                        <option value="45">45</option>
                        <option value="60">60</option>
                        <option value="90">90</option>
                        <option value="120">120</option>
                        <option value="150">150</option>
                        <option value="180">180</option>
                        <option value="210">210</option>
                        <option value="240">240</option>
                        <option value="300">300</option>
                        <option value="360">360</option>
                    </select>
                    <p>Maximum playing time (in minutes):</p> <select name="max_playtime">
                        <option value="15">15</option>
                        <option value="30">30</option>
                        <option value="45">45</option>
                        <option value="60">60</option>
                        <option value="90">90</option>
                        <option value="120">120</option>
                        <option value="150">150</option>
                        <option value="180">180</option>
                        <option value="210">210</option>
                        <option value="240">240</option>
                        <option value="300">300</option>
                        <option value="360">360 or more</option>
                    </select>
                    <p>Minimum Game Weight (complexity):</p>
                    <select name="min_weight">
                        <option value="1">1.0</option>
                        <option value="1.5">1.5</option>
                        <option value="2.0">2.0</option>
                        <option value="2.5">2.5</option>
                        <option value="3.0">3.0</option>
                        <option value="3.5">3.5</option>
                        <option value="4.0">4.0</option>
                        <option value="4.5">4.5</option>
                    </select>
                    <p>Maximum Game Weight (complexity):</p>
                    <select name="max_weight">
                        <option value="1.5">1.5</option>
                        <option value="2.0">2.0</option>
                        <option value="2.5">2.5</option>
                        <option value="3.0">3.0</option>
                        <option value="3.5">3.5</option>
                        <option value="4.0">4.0</option>
                        <option value="4.5">4.5</option>
                        <option value="5">5.0</option>
                    </select>
                    <p> Preferred themes:</p>
                    <input type="checkbox" name="theme[]" value="abstract">Abstract (no theme)<br>
                    <input type="checkbox" name="theme[]" value="old_west">Old West<br>
                    <input type="checkbox" name="theme[]" value="espionage">Espionage<br>
                    <input type="checkbox" name="theme[]" value="superhero">Superhero<br>
                    <input type="checkbox" name="theme[]" value="martial_arts">Martial Arts<br>
                    <input type="checkbox" name="theme[]" value="pirate">Pirate<br>
                    <input type="checkbox" name="theme[]" value="racing">Racing<br>
                    <input type="checkbox" name="theme[]" value="fantasy">Fantasy<br>
                    <input type="checkbox" name="theme[]" value="train">Train<br>
                    <input type="checkbox" name="theme[]" value="sports">Sports<br>
                    <input type="checkbox" name="theme[]" value="financial">Financial<br>
                    <input type="checkbox" name="theme[]" value="detective">Detective<br>
                    <input type="checkbox" name="theme[]" value="aviation">Aviation<br>
                    <input type="checkbox" name="theme[]" value="science_fiction">Science Fiction<br>
                    <input type="checkbox" name="theme[]" value="empire_building">Empire Building<br>
                    <input type="checkbox" name="theme[]" value="medieval">Medieval<br>
                    <input type="checkbox" name="theme[]" value="movie">Movie (including Star Wars)<br>
                    <input type="checkbox" name="theme[]" value="book">Book (including Lord of the Rings)<br>
                    <input type="checkbox" name="theme[]" value="television">Television (including Star Trek)<br>
                    <input type="checkbox" name="theme[]" value="geography">Geography<br>
                    <input type="checkbox" name="theme[]" value="animal">Animal<br>
                    <input type="checkbox" name="theme[]" value="horror">Horror<br>
                    <input type="checkbox" name="theme[]" value="caveman">Caveman<br>
                    <input type="checkbox" name="theme[]" value="archaeology">Archaeology<br>
                    <input type="checkbox" name="theme[]" value="mobster">Mobster<br>
                    <p> Preferred gameplay mechanisms:</p>
                    <input type="checkbox" name="mechanism[]" value="worker_placement">Worker Placement<br>
                    <input type="checkbox" name="mechanism[]" value="area_control">Area Control<br>
                    <input type="checkbox" name="mechanism[]" value="tile_placement">Tile Placement<br>
                    <input type="checkbox" name="mechanism[]" value="cooperative">Cooperative<br>
                    <input type="checkbox" name="mechanism[]" value="deck_building">Deck Building<br>
                    <input type="checkbox" name="mechanism[]" value="drafting">Drafting<br>
                    <input type="checkbox" name="mechanism[]" value="engine_building">Engine Building<br>
                    <input type="checkbox" name="mechanism[]" value="take_that">Take That<br>
                    <input type="checkbox" name="mechanism[]" value="trick_taking">Trick Taking<br>
                    <input type="checkbox" name="mechanism[]" value="puzzle">Puzzle<br>
                    <input type="checkbox" name="mechanism[]" value="legacy">Legacy<br>
                    <br>
                    <p>Get a game recommendation based on the preferences above:<input type="submit" value="GO"></p>
                </form>

            </section>
        </main>
        <footer>
            <?php include("../modules/footer.php"); ?>
        </footer>
    </div>
</body>

</html>
