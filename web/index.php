<!DOCTYPE html>
<!--
This is the home page for Board Games for Families
Author: Nikkala Thomson
-->

<html lang="en-us">

<head>
    <?php include("modules/head.php"); ?>
    <title>Home | Board Games for Families</title>
</head>

<body>
    <header>
        <?php include("modules/header.php"); ?>
    </header>
    <div class=center-block>
        <nav>
            <ul>
                <li id="active-nav"><a href=".">Home<img src="images/yellow-arrow.png" alt=""></a></li>
                <li><a href="links.php">Links</a></li>
            </ul>
        </nav>
        <main>
            <figure class=center-block>
                <!--Main image -->
                <img src="images/familygame.jpg" alt="Family playing games">
            </figure>
            <div class="flex">
                <section>
                    <p>Playing board games with your families creates fond memories and lasting experiences. Consider trying out one of these board games today!</p>

                </section>
                <section>
                    <li><a href="https://boardgamegeek.com/boardgame/148228/splendor" target="_blank">07 Splendor</a></li>
                    <li><a href="https://boardgamegeek.com/boardgame/9209/ticket-ride" target="_blank">08 Ticket to Ride</a></li>
                    <li><a href="https://boardgamegeek.com/boardgame/199561/sagrada" target="_blank">09 Sagrada</a></li>
                    <li><a href="https://boardgamegeek.com/boardgame/230802/azul" target="_blank">10 Azul</a></li>
                </section>
            </div>

        </main>
        <footer>
            <?php include("modules/footer.php"); ?>
        </footer>
    </div>
</body>

</html>
