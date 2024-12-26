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
                    require_once("part/header.php");
                } else {
                    require_once("part/headerOff.php");
                }
            ?>
        </header>
        <main>
            <div class="container pt-large px-5">
                <div class="notification bsecondaire has-text-centered">
                    <h1 class="is-size-2 pirata">Créateur de personnage</h1>
                    <br>
                    <form id="creationHero" action="<?php echo BASE_URL; ?>/hero/selection" method="POST">
                        <label for="nom" class="tprincipal">nom personnage</label>
                        <input id="nom" type="text" name="nom">
                        <?php THIS->getClass(); ?>
                        <input type="submit" value="créer" class='tprincipal boutonOr button'>
                    </form>
                </div>
            </div>
        </main>
        <footer>
        <?PHP require_once("part/footer.php"); ?>
        </footer>
        <script defer src="<?php echo BASE_URL; ?>/scripts/script.js"></script>
    </body>
</html>