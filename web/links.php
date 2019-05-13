<!DOCTYPE html>
<!--
This is the links page for Board Games for Families
Author: Nikkala Thomson
-->


<html lang="en-us">

<head>
    <?php $ROOT = './';
    include 'modules/head.php'; ?>
    <title>Links | Board Games for Families</title>
</head>

<body>
    <header>
        <?php include("modules/header.php"); ?>
    </header>
    <div class=center-block>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li id='active-nav'><a href=".">Links<img src="images/yellow-arrow.png" alt=""></a></li>
                <li><a href="shopping/index.php">Shopping</a></li>
            </ul>
        </nav>

        <main>
            <!-- Text area -->
            <div class="flex">
                <section>
                    <p>Links:</p>
                    <ul>
                        <li><a href="02teach.php" target="_blank">02 Teach: Team Activity</a></li>
                        <li><a href="03teach/index.php" target="_blank">03 Teach: Team Activity</a></li>
                        <li><a href="shopping/index.php" target="_blank">PHP Shopping Simulator</a></li>
                        <li><a href="" target="_blank">05 Teach: Team Activity</a></li>
                        <li><a href="" target="_blank">06 Teach: Team Activity</a></li>
                    </ul>
                </section>
                <section>

                    <ul>
                        <li><a href="" target="_blank">07 Teach: Team Activity</a></li>
                        <li><a href="" target="_blank">08 Teach: Team Activity</a></li>
                        <li><a href="" target="_blank">09 Teach: Team Activity</a></li>
                        <li><a href="" target="_blank">10 Teach: Team Activity</a></li>
                    </ul>
                </section>
            </div>

            <footer>
                <?php include("modules/footer.php"); ?>
            </footer>

        </main>
    </div>
</body>

</html>
