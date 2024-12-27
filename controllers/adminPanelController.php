<?php
class adminPanelController{

    function index(){
        session_start();
        if (!isset($_SESSION["user"])) {
            echo "Pas connecté";
            die();
        }

        $conn = Database::connect();
        $query = "SELECT isAdmin from Account where name = '".$_SESSION["user"]."';";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $recu = $stmt->fetch(PDO::FETCH_ASSOC);

        if($recu['isAdmin'] == 1){
            echo "<h1> Voici les tables à modifier </h1>";
        } else {
            echo "Vous n'avez pas les droits";
        }

        
        // Vérification si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Récupérer la valeur envoyée par l'utilisateur
            $number = isset($_POST['number']) ? (int)$_POST['number'] : 0;

            // Validation : vérifier que c'est un entier entre 1 et 20
            if ($number >= 1 && $number <= 20) {
                echo "<p>Merci ! Vous avez entré le nombre : $number.</p>";
            } else {
                echo "<p style='color: red;'>Erreur : Veuillez entrer un entier entre 1 et 20.</p>";
            }
        }

        echo "<form method=\"POST\" action=\"adminPanelController.php\">";
        echo    "<p> 1 : Attaque physique   2 : Attaque Magique    3 : Potion </p>";
        echo    "<label for='Choix'>Action : </label>";
        echo    "<input type='text' id='Choix' name='Choix'>";
        echo    "<button type='submit'>Envoyer</button>";
        echo "</form>";


        if (!defined('BASE_URL')) {
            define('BASE_URL', '/DungeonXplorer');
        }
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        require_once 'views/afficher_bdd.php';
    }
}
?>