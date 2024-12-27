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
            echo "Bienvenue sur le panneau de contrôle, modifiez ici tout à votre guise";
        } else {
            echo "Vous n'avez pas les droits";
        }

        echo '<form method="POST" action="">';
        echo    '<p> Choisissez une table à mettre a jour <br> </p>';
        echo    '<p> 1 : Account | 2 : Armor | 3 : Chapter | 4 : Chapter Treasure | 5 : Class |
        6 : Encounter | 7 : Hero | 8 : Hero_List | 9 : Inventory | 10 : Items <br> 11 : Level | 12 : Links | 13 : Loot | 14 : Monster | 15 : Potion | 16 : Scroll | 17 :  Shield | 18 : Spell | 19 : Spell List | 20 : Sword</p>';
        echo    '<label for="number">Entrez une valeur entre 1 et 20 :</label><br>';
        echo    '<input type="number" id="valeur" name="number" min="1" max="20" required><br>';
        echo    '<button type="submit">Sélectionner </button>';
        echo '</form>';
        
        // Vérification si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Récupérer la valeur envoyée par l'utilisateur
            $number = isset($_POST['number']) ? (int)$_POST['number'] : 0;
            switch($number){
                case 1 : 
                    echo "Table Account";
                    $conn = Database::connect();
                    $query = "SELECT * from Account";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo $recu
                    }
                    break;

                case 2 : 
                    echo "Table Armor";
                    $conn = Database::connect();
                    $query = "SELECT * from Armor";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;

                case 3 : 
                    echo "Table Chapter";
                    $conn = Database::connect();
                    $query = "SELECT * from Chapter";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;
                
                case 4 : 
                    echo "Table Chapter_Treasure";
                    $conn = Database::connect();
                    $query = "SELECT * from Chapter_Treasure";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;

                case 5 : 
                    echo "Table Class";
                    $conn = Database::connect();
                    $query = "SELECT * from Class";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;

                case 6 : 
                    echo "Table Encounter";
                    $conn = Database::connect();
                    $query = "SELECT * from Encounter";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;
                
                case 7 : 
                    echo "Table Hero";
                    $conn = Database::connect();
                    $query = "SELECT * from hero";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;
                
                case 8 : 
                    echo "Table Hero_list";
                    $conn = Database::connect();
                    $query = "SELECT * from Account";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;

                case 9 : 
                    echo "Table Inventory";
                    $conn = Database::connect();
                    $query = "SELECT * from Inventory";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;

                case 10 : 
                    echo "Table Items";
                    $conn = Database::connect();
                    $query = "SELECT * from Items";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;

                case 11 : 
                    echo "Table Level";
                    $conn = Database::connect();
                    $query = "SELECT * from Level";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;

                case 12 : 
                    echo "Table Links";
                    $conn = Database::connect();
                    $query = "SELECT * from Links";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;
                
                case 13 : 
                    echo "Table Loot";
                    $conn = Database::connect();
                    $query = "SELECT * from Loot";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;

                case 14 : 
                    echo "Table Monster";
                    $conn = Database::connect();
                    $query = "SELECT * from Monster";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;

                case 15 : 
                    echo "Table Potion";
                    $conn = Database::connect();
                    $query = "SELECT * from Potion";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;
                
                case 16 : 
                    echo "Table Scroll";
                    $conn = Database::connect();
                    $query = "SELECT * from Scroll";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;
                
                case 17 : 
                    echo "Table Shield";
                    $conn = Database::connect();
                    $query = "SELECT * from Shield";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;

                case 18 : 
                    echo "Table Spell";
                    $conn = Database::connect();
                    $query = "SELECT * from Spell";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;

                case 19 : 
                    echo "Table Spell_List";
                    $conn = Database::connect();
                    $query = "SELECT * from Spell_list";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;

                case 20 : 
                    echo "Table Sword";
                    $conn = Database::connect();
                    $query = "SELECT * from Sword";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;

                default: 
                    echo "Aucune valeur";
                    break;
            }
        }


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