<!DOCTYPE html>
<html lang="fr" data-type="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Lignes en dessous à modifer en fonction de la page-->
    <meta name="description" content="Page d'inscription' à DongeonXplorer">
    <title> Inscription </title>

    <link rel="stylesheet" href="styles/style.css">
    <!-- Bulma -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!--Importation de Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pirata+One&display=swap" rel="stylesheet">
</head>

<body>
    <div class="section">
        <div class="container" style="max-width: 700px;">
            <div class="column">

                <form class="box boxConnexion">

                    <h1 class="titreConnexion"> Inscription </h1>

                    <!--Pseudo-->
                    <div class="field">
                        <label class="label">Pseudo</label>
                        <div class="control has-icons-left">
                            <!--Icone-->
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>

                            <!--Si pseudo non valide lors de la validation-->
                            <div id="pseudoOuMailNonValide">
                                <input class="input is-danger" type="text" placeholder="Pseudo">
                                <p class="help is-danger">Pseudo déjà utilisé</p>
                            </div>
                            <!--Sinon-->
                            <div id="pseudoOuMailValide">
                                <input class="input" type="text" placeholder="Pseudo">
                            </div>

                        </div>
                    </div>

                    <!--Mail-->
                    <div class="field">
                        <label class="label">Mail</label>
                        <div class="control has-icons-left">
                            <!--Icone-->
                            <span class="icon is-small is-left">
                                <i class="fa-solid fa-envelope"></i>
                            </span>

                            <!--Si mail non valide lors de la validation-->
                            <div id="pseudoOuMailNonValide">
                                <input class="input is-danger" type="email" placeholder="Exemple@Dungeon.xplorer">
                                <p class="help is-danger">Mail non valide</p>
                            </div>
                            <!--Sinon-->
                            <div id="pseudoOuMailValide">
                                <input class="input" type="email" placeholder="Exemple@Dungeon.xplorer">
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
                            
                            <div>
                                <input class="input" type="password" placeholder="Mot de passe">
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
                            <!--Si Mot de passe différent lors de la validation-->
                            <div id="mdpNonValide">
                                <input class="input is-danger" type="password" placeholder="Récrivez votre mot de passe">
                                <p class="help is-danger">Mot de passe différent !</p>
                            </div>
                            <!--Sinon-->
                            <div id="mdpValide">
                                <input class="input" type="password" placeholder="Récrivez votre mot de passe">
                            </div>
                        </div>
                    </div>


                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-light">Créer</button>
                        </div>
                        <div class="control">
                            <button class="button boutonOr">Annuler</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</body>

</html>