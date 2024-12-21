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
                    require_once("header.php");
                } else {
                    require_once("headerOff.php");
                }
            ?>
        </header>
        <main>
            <div class="container pt-large px-5">
                <div class="notification bsecondaire has-text-centered">
                    <figure class="image pb-3">
                        <img src="<?php echo BASE_URL; ?>/images/Logo.png" alt="logo DungeonXplorer" class="is-rounded grand-logo aligneHaut center">
                    </figure>
                    <h1 class="tprincipal pb-1 is-size-3 is-size-4-mobile has-text-weight-bold">
                        Bienvenue sur DungeonXplorer
                    </h1>
                    <p class="tsecondaire is-size-5-desktop is-size-6-tablet is-size-7-mobile px-4 has-text-justified">
                        Votre portail vers un monde de dark fantasy, où chaque choix vous rapproche un peu plus des ténèbres... ou de la lumière. 
                        Plongez dans un univers impitoyable inspiré des classiques du "livre dont vous êtes le héros" : ici, chaque décision compte et peut être votre dernière. 
                        En naviguant dans les couloirs sombres et les donjons maudits, vous devrez faire preuve de stratégie, de courage et d'un peu de folie pour survivre aux épreuves qui vous attendent. 
                        Créatures redoutables, énigmes mortelles et trésors interdits jalonnent votre chemin... Saurez-vous percer les secrets de DungeonXplorer ? Préparez-vous à écrire votre propre légende... ou à devenir une autre âme perdue dans les profondeurs.
                    </p>
                    <div class="buttons center pt-5">
                        <a class="button boutonOr mr-3 is-medium" href="<?php echo BASE_URL; ?>/inscription">
                            Rejoindre l'Ordre des Aventuriers
                        </a>
                        <a class="button is-light is-medium" href="<?php echo BASE_URL; ?>/connexion">
                            Poursuivre votre Destinée
                        </a>
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
