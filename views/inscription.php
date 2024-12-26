<!DOCTYPE html>
<html lang="fr" data-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Lignes en dessous à modifer en fonction de la page-->
        <meta name="description" content="Page d'inscription' à DongeonXplorer">
        <title> Inscription </title>
        <link rel="icon" href="images/Logo.png" type="<?php echo BASE_URL; ?>/image/png">
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
                require_once("part/headerOff.php");
            ?>
        </header>
        <main>
            <div class="section">
                <div class="container" style="max-width: 700px;">
                    <div class="column">
                        <form method="POST" class="box boxConnexion">
                            <h1 class="titreConnexion"> Inscription </h1>

                            <!--Pseudo-->
                            <div class="field">
                                <label class="label" for="pseudo">Pseudo</label>
                                <div class="control has-icons-left">
                                    <!--Icone-->
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>

                                    <!--Si pseudo non valide lors de la validation
                                    <div id="pseudoOuMailNonValide">
                                        <input class="input is-danger" type="text" placeholder="Pseudo">
                                        <p class="help is-danger">Pseudo déjà utilisé</p>
                                    </div>-->
                                    <!--Sinon-->
                                    <div class="pseudoOuMailValide">
                                        <input name="pseudo" class="input" type="text" placeholder="Pseudo" value="<?PHP echo (isset($_POST['pseudo']) ?  $_POST['pseudo']: ''); ?>">
                                    </div>

                                </div>
                            </div>

                            <!--Mail-->
                            <div class="field">
                                <label class="label" for="email">Mail</label>
                                <div class="control has-icons-left">
                                    <!--Icone-->
                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>

                                    <!--Si mail non valide lors de la validation
                                    <div id="pseudoOuMailNonValide">
                                        <input class="input is-danger" type="email" placeholder="Exemple@Dungeon.xplorer">
                                        <p class="help is-danger">Mail non valide</p>
                                    </div>-->
                                    <!--Sinon-->
                                    <div class="pseudoOuMailValide">
                                        <input name="email" class="input" type="email" placeholder="Exemple@Dungeon.xplorer" value="<?PHP echo (isset($_POST['email']) ?  $_POST['email']: ''); ?>">
                                    </div>

                                </div>
                            </div>

                            <!--Mot de passe-->
                            <div class="field">
                                <label class="label" for="password">Mot de passe</label>
                                <div class="control has-icons-left">
                                    <!--Icone-->
                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                    
                                    <div>
                                        <input name="password" class="input" type="password" placeholder="Mot de passe">
                                    </div> 
                                </div>
                            </div>

                            <!--Mot de passe x2-->
                            <div class="field">
                                <div class="control has-icons-left">
                                    <!--Icone-->
                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                    <!--Si Mot de passe différent lors de la validation
                                    <div id="mdpNonValide">
                                        <input class="input is-danger" type="password" placeholder="Récrivez votre mot de passe">
                                        <p class="help is-danger">Mot de passe différent !</p>
                                    </div>-->
                                    <!--Sinon-->
                                    <div id="mdpValide">
                                        <input name="passwordValid" class="input" type="password" placeholder="Récrivez votre mot de passe">
                                    </div>
                                </div>
                            </div>
                            <div class="field is-grouped">
                                <div class="control">
                                    <button class="button is-light">Créer</button>
                                </div>
                                <div class="control">
                                    <a class="button boutonOr" href="<?php echo BASE_URL; ?>">Annuler</a>
                                </div>
                            </div>
                        </form>
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