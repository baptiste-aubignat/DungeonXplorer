<!DOCTYPE html>
<html lang="fr" data-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DungeonXplorer</title>
        <link rel="icon" href="<?php echo BASE_URL; ?>/images/Logo.png" type="image/png">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/bulma.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pirata+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <?PHP
                if (isset($_SESSION["user"])) {
                    require_once("part/header.php");
                } else {
                    require_once("part/headerOff.php");
                }
            ?>
        </header>
        <main>
            <div class="container pt-large px-5">
                <div class="notification bsecondaire has-text-centered">
                    <figure class="image pb-3">
                        <img src="<?php echo BASE_URL; ?>/images/Logo.png" alt="logo DungeonXplorer" class="is-rounded grand-logo aligneHaut center">
                    </figure>
                    <?php 
                        if (isset($_SESSION["user"])) {
                            require_once("part/home.php");
                        } else {
                            require_once("part/homeOff.php");
                        }
                    ?>
                </div>
              </div>
        </main>
        <footer>
            <?PHP require_once("part/footer.php"); ?>
        </footer>
        <script defer src="<?php echo BASE_URL; ?>/scripts/script.js"></script>
    </body>
</html>
