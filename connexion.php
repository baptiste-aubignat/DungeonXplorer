<!DOCTYPE html>
<html lang="fr" data-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Lignes en dessous à modifer en fonction de la page-->
        <meta name="description" content="Page de connexion à DongeonXplorer">
        <title> Connexion </title>
        <link rel="icon" href="images/Logo.png" type="image/png">

        <link rel="stylesheet" href="styles/style.css">
        <!-- Bulma -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!--Importation de Font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pirata+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar" aria-label="main navigation">
                <div class="navbar-brand pl-6">
                    <a class="navbar-item" href="index.php">
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
                        <a class="navbar-item tprincipal" href="index.php">
                            Home
                        </a>
                    </div>
                    <div class="navbar-end pr-6">
                        <div class="navbar-item">
                            <div class="buttons">
                                <a class="button boutonOr" href="inscriptionUtilisateur.php">
                                    S'inscrire
                                </a>
                                <a class="button is-light" href="connexionUtilisateur.php">
                                    Se connecter
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="section">
                <div class="container" style="max-width: 700px;">
                    <div class="column">
                        <form class="box boxConnexion">
                            <h1 class="titreConnexion"> Connexion </h1>

                            <!--Pseudo ou mail-->
                            <div class="field">
                                <label class="label">Pseudo ou email</label>
                                <div class="control has-icons-left">
                                    <!--Icone-->
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>

                                    <!--Si pseudo ou mail non valide lors de la validation-->
                                    <div id="pseudoOuMailNonValide">
                                        <input class="input is-danger" type="text" placeholder="Pseudo ou mail">
                                        <p class="help is-danger">Merci d'entrer un pseudo ou un mail valide !</p>
                                    </div>
                                    <!--Sinon-->
                                    <div id="seudoOuMailValide">
                                        <input class="input" type="text" placeholder="Pseudo ou mail">
                                    </div>
                                </div>
                            </div>

                            <!--Mot de passe-->
                            <div class="field">
                                <label class="label">Mot de passe</label>
                                <div class="control has-icons-left">
                                    <!--Icone-->
                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                    <!--Si Mot de passe invalide lors de la validation-->
                                    <div id="mdpNonValide">
                                        <input class="input is-danger" type="password" placeholder="Mot de passe">
                                        <p class="help is-danger">Mauvais mot de passe</p>
                                    </div>
                                    <!--Sinon-->
                                    <div id="mdpValide">
                                        <input class="input" type="password" placeholder="Mot de passe">
                                    </div>
                                    <button class="button is-ghost souligne boutonMotDePasseOublie"> Mot de passe oublié </button>
                                </div>
                            </div>
                            <div class="field is-grouped">
                                <div class="control">
                                    <a class="button is-light" href="inscriptionUtilisateur.php">
                                        Créer un compte
                                    </a>
                                </div>
                                <div class="control">
                                    <button class="button boutonOr">Connexion</button>
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
        <script defer src="scripts/script.js"></script>
    </body>
</html>