!<!DOCTYPE html>
<html>
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
            <nav class="navbar" aria-label="main navigation">
                <div class="navbar-brand pl-6">
                    <a class="navbar-item" href="#">
                        <figure class="image">
                            <img src="<?php echo BASE_URL; ?>/images/Logo.png" alt="logo DungeonXplorer" class="is-rounded logo aligneBas">
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
                                <a class="button boutonOr" href="<?php echo BASE_URL; ?>/inscription">
                                S'inscrire
                                </a>
                                <a class="button is-light" href="<?php echo BASE_URL; ?>/connexion">
                                Se connecter
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        
        <script defer src="<?php echo BASE_URL; ?>/scripts/script.js"></script>
    </body>
</html>