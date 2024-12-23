<!DOCTYPE html>
<html lang="fr" data-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Lignes en dessous à modifer en fonction de la page-->
        <meta name="description" content="Menu de début de jeu">
        <title> Menu principal </title>
        <link rel="icon" href="<?php echo BASE_URL; ?>/images/Logo.png" type="image/png">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/style.css">

        <!-- Bulma -->
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/bulma.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!--Importation de Font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pirata+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <?PHP
                if (isset($_SESSION["user"])) {
                    require_once("header.php");
                } else {
                    require_once("headerOff.php");
                }
            ?>
        </header>
        <main>
            <div class="container">
                <div class="box boxMenu">
                    <h1>Menu principal</h1>
                    <div class="texte">
                        <p>
                            Poursuivez une aventure déjà commencée ou bien commencez-en une nouvelle !
                        </p>
                    </div>
                    <div class="boutons">
                        <button class="button">Rejoindre l'aventure</button>
                        <button class="button boutonOr">Nouvelle aventure</button>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <p>&copy; Pixels & Parchemins 2024</p>
        </footer>
        <script defer src="<?php echo BASE_URL; ?>/scripts/script.js"></script>
    </body>
</html>