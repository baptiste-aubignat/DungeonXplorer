<?php
class adminPanelController {

    function index() {
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

        if($recu['isAdmin'] == 1) {
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
            switch($number) {
                case 1 : 
                    echo "Table Account";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Account";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['account_id'] . " " . $recu['name'] . " " . $recu['email'] . " " . $recu['password'] . " " . $recu['isAdmin'] . "<br>";
                    }
                    break;

                case 2 : 
                    echo "Table Armor";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Armor";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['armor_id'] . " " . $recu['item_id'] . " " . $recu['armor_bonus'] . " " . $recu['type'] . "<br>";
                    }
                    break;

                case 3 : 
                    echo "Table Chapter";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Chapter";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['chapter_id'] . " " . $recu['content'] . " " . $recu['image'] . "<br>";
                    }
                    break;
                
                case 4 : 
                    echo "Table Chapter_Treasure";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Chapter_Treasure";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['chap_treasure_id'] . " " . $recu['chapter_id'] . " " . $recu['item_id'] . " " . $recu['quantity'] . " " . $recu['probability'] . " " . $recu['class_id'] . "<br>";
                    }
                    break;

                case 5 : 
                    echo "Table Class";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Class";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['class_id'] . " " . $recu['name'] . " " . $recu['description'] . " " . $recu['base_pv'] . " " . $recu['base_mana'] . " " . $recu['strength'] . " " . $recu['initiative'] . " " . $recu['max_items'] . "<br>";
                    }
                    break;

                case 6 : 
                    echo "Table Encounter";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Encounter";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['encounter_id'] . " " . $recu['chapter_id'] . " " . $recu['monster_id'] . "<br>";
                    }
                    break;
                
                case 7 : 
                    echo "Table Hero";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Hero";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['hero_id'] . " " . $recu['name'] . " " . $recu['class_id'] . " " . $recu['image'] . " " . $recu['biography'] . " " . $recu['pv'] . " " . $recu['mana'] . " " . $recu['strength'] . " " . $recu['initiative'] . " " . $recu['armor_id'] . " " . $recu['left_hand_id'] . " " . $recu['right_hand_id'] . " " . $recu['chapter_id'] . " " . $recu['xp'] . " " . $recu['current_level'] . "<br>";
                    }
                    break;
                
                case 8 : 
                    echo "Table Hero_list";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Hero_list";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['hero_list_id'] . " " . $recu['account_id'] . " " . $recu['hero_id'] . "<br>";
                    }
                    break;

                case 9 : 
                    echo "Table Inventory";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Inventory";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['inventory_id'] . " " . $recu['hero_id'] . " " . $recu['item_id'] . " " . $recu['quantity'] . "<br>";
                    }
                    break;

                case 10 : 
                    echo "Table Items";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Items";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['item_id'] . " " . $recu['name'] . " " . $recu['description'] . "<br>";
                    }
                    break;

                case 11 : 
                    echo "Table Level";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Level";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['level_id'] . " " . $recu['class_id'] . " " . $recu['level'] . " " . $recu['required_xp'] . " " . $recu['pv_bonus'] . " " . $recu['mana_bonus'] . " " . $recu['strength_bonus'] . " " . $recu['initiative_bonus'] . "<br>";
                    }
                    break;

                case 12 : 
                    echo "Table Links";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Links";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['link_id'] . " " . $recu['chapter_id'] . " " . $recu['next_chapter_id'] . " " . $recu['description'] . "<br>";
                    }
                    break;
                
                case 13 : 
                    echo "Table Loot";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Loot";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['loot_id'] . " " . $recu['monster_id'] . " " . $recu['item_id'] . " " . $recu['quantity'] . " " . $recu['probability'] . " " . $recu['class_id'] . "<br>";
                    }
                    break;

                case 14 : 
                    echo "Table Monster";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Monster";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['monster_id'] . " " . $recu['name'] . " " . $recu['pv'] . " " . $recu['mana'] . " " . $recu['initiative'] . " " . $recu['strength'] . " " . $recu['attack'] . " " . $recu['xp'] . "<br>";
                    }
                    break;

                case 15 : 
                    echo "Table Potion";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Potion";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['potion_id'] . " " . $recu['item_id'] . " " . $recu['type'] . " " . $recu['heal_amount'] . " " . $recu['mana_recovery'] . "<br>";
                    }
                    break;
                
                case 16 : 
                    echo "Table Scroll";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Scroll";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['scroll_id'] . " " . $recu['item_id'] . " " . $recu['spell_id'] . "<br>";
                    }
                    break;
                
                case 17 : 
                    echo "Table Shield";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Shield";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['shield_id'] . " " . $recu['item_id'] . " " . $recu['armor_bonus'] . "<br>";
                    }
                    break;

                case 18 : 
                    echo "Table Spell";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Spell";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['spell_id'] . " " . $recu['name'] . " " . $recu['description'] . " " . $recu['cost'] . " " . $recu['level_needed'] . "<br>";
                    }
                    break;

                case 19 : 
                    echo "Table Spell_List";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Spell_list";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['spell_list_id'] . " " . $recu['spell_id'] . " " . $recu['class_id'] . " " . $recu['monster_id'] . "<br>";
                    }
                    break;

                case 20 : 
                    echo "Table Sword";
                    echo "<br>";
                    $conn = Database::connect();
                    $query = "SELECT * from Sword";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    while($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo $recu['sword_id'] . " " . $recu['item_id'] . " " . $recu['damage_bonus'] . " " . $recu['type'] . "<br>";
                    }
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