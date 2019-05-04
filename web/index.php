<!DOCTYPE html>
<!--
This is the home page for Board Games for Families
Author: Nikkala Thomson
-->

<html lang="en-us">

<head>
    <?php require_once("modules/config.php");
        include (ROOT_PATH . "modules/head.php"); ?>
    <title>Home | Board Games for Families</title>
</head>

<body>
    <header>
        <?php require_once("modules/config.php");
        include (ROOT_PATH . "modules/header.php"); ?>
    </header>
    <div class=center-block>
        <nav>
            <?php include ("modules/nav.php"); ?>
        </nav>
        <main>
            <figure class=center-block>
                <!--Main image -->
                <img src="images/familygame.jpg" alt="Family playing games">
            </figure>

            <footer>
                <?php include ("modules/footer.php"); ?>
            </footer>
        </main>
    </div>
</body>

</html>
