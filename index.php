<!DOCTYPE html>
<html lang="fr" data-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DungeonXplorer</title>
        <link rel="icon" href="images/Logo.png" type="image/png">

        <link rel="stylesheet" href="styles/bulma.min.css">
        <link rel="stylesheet" href="styles/style.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pirata+One&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar" aria-label="main navigation">
                <div class="navbar-brand pl-6">
                    <a class="navbar-item" href="#">
                        <figure class="image">
                            <img src="images/Logo.png" alt="logo DungeonXplorer" class="is-rounded logo aligneBas">
                        </figure>
                    </a>

                    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>

                <div class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item tprincipal" href="#">
                            Home
                        </a>
                    </div>

                    <div class="navbar-end pr-6">
                        <div class="navbar-item">
                            <div class="buttons">
                                <a class="button boutonOr">
                                S'inscrire
                                </a>
                                <a class="button is-light">
                                Se connecter
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </nav>
        </header>

        <main>
            <div class="container pt-large px-5">
                <div class="notification bsecondaire has-text-centered">
                    <figure class="image pb-3">
                        <img src="images/Logo.png" alt="logo DungeonXplorer" class="is-rounded grand-logo aligneHaut center">
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
                        <a class="button boutonOr mr-3 is-medium">
                            Rejoindre l'Ordre des Aventuriers
                        </a>
                        <a class="button is-light is-medium">
                            Poursuivre votre Destinée
                        </a>
                    </div>
                </div>
              </div>
        </main>
        <footer>
            <p>&copy; Pixels & Parchelins 2024</p>
        </footer>
        <script defer src="scripts/script.js"></script>
    </body>
</html>
