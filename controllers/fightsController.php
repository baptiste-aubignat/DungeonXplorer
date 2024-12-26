<?php



class Hero{

    public $pv;
    public $attaque;
    public $initiative;
    public $mana;
    public $class;

    public function __construct() {
        $conn = Database::connect();
        $query = "SELECT * FROM Hero where hero_id = 1";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $recu = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->pv = $recu['pv'];
        $this->attaque = $recu['strength'];
        $this->initiative = $recu['initiative'];
        $this->mana = $recu['mana'];
        $this->class = $recu['class_id'];
    }
    
}

class Monster{

    public $pv;
    public $attaque;
    public $initiative;
    public $mana;

    public function __construct() {
        $conn = Database::connect();
        $query = "SELECT * FROM Monster where monster_id = 8";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $recu = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->pv = $recu['pv'];
        $this->attaque = $recu['strength'];
        $this->initiative = $recu['initiative'];
        $this->mana = $recu['mana'];
    }
    
}


class fightsController{
    function index(){
        
        $hero = new Hero();
        $monster = new Monster();

        //Calcul des nouvelles initiatives
        $hero->initiative += rand(1,6);
        $monster->initiative += rand(1,6);

        //Détermination de qui commence
        if($monster->initiative < $hero->initiative){
            $qui_c_qui_commence = "Héros";

        } elseif($monster->initiative > $hero->initiative) {
            $qui_c_qui_commence = "Monstre";

        } elseif($monster->initiative == $hero->initiative && $hero->class == 3) {
            $qui_c_qui_commence = "Héros";

        } elseif($monster->initiative == $hero->initiative && $hero->class != 3) {
            $qui_c_qui_commence = "Monstre";
        }

        // Génération du formulaire avec des echo
        echo '<form method="POST" action="">';
        echo    '<p>Choisissez une action : 1 = Attaque Physique || 2 = Attaque Magique (Impossible en tant que guerrier) || 3 = Utiliser une potion </p>';
        echo    '<label for="valeur">Entrez une valeur entre 1 et 3 :</label><br>';
        echo    '<input type="number" id="valeur" name="valeur" min="1" max="3" required><br>';
        echo    '<button type="submit">Agir !</button>';
        echo '</form>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifier si la valeur est présente
            if (isset($_POST['valeur'])) {
                $choix = (int)$_POST['valeur']; // En gros, tout le code part d'ici, sinon, j'ai pas accès au choix
                if($choix === 1){
                    //Attaques Physiques
                    if($qui_c_qui_commence === "Héros" /*&& si il utilise une attaque physique*/){
        
                        //Calcul Bonus d'arme
                        $conn = Database::connect();
                        $query = "SELECT damage_bonus from Sword where item_id in (select right_hand_id from Hero)";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                        $bonusArme = $recu['damage_bonus'];
                        echo "Bonus Arme : " . $bonusArme . "<br>";
        
                        //Calcul de dégâts
                        echo "Attaquant : Héros : PV = " . $hero->pv . " attaque ". $hero->attaque . "<br>";
                        $attaque = rand(1, 6) + $hero->attaque + $bonusArme; 
                        $defense = rand(1, 6) + (int)($monster->attaque / 2);
                        echo "Attaque : " . $attaque . " Défense " . $defense . "<br>";
                        $degats = $attaque - $defense;
        
                        //Retrait ou non de PV
                        if($degats > 0){//Dégats infligés
                            echo "Dégats infligés : " . $degats. "<br>";
                            $monster->pv -= $degats;
                            echo "Défenseur : Monstre : PV = " . $monster->pv . " attaque ". $monster->attaque . "<br>";
                        } else {
                            echo "Le monstre ne l'a même pas senti passer";
                        }
                    } 
                    else {
                        //Calcul Bonus d'armure
                        $conn = Database::connect();
                        $query = "SELECT armor_bonus from Armor where armor_id in (select armor_id from Hero)";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                        $bonusArmure = $recu['armor_bonus'];
                        echo "Bonus Armure : " . $bonusArmure . "<br>";
        
                        //Calcul de dégâts
                        echo "Attaquant : Monstre : PV = " . $monster->pv . " attaque ". $monster->attaque . "<br>";
                        $attaque = rand(1, 6) + $monster->attaque; 
                        if($hero->class != 3){
                            $defense = rand(1, 6) + (int)($hero->attaque / 2) + $bonusArmure;
                        } else {
                            $defense = rand(1, 6) + (int)($hero->initiative / 2) + $bonusArmure;
                        }
                        
                        echo "Attaque : " . $attaque . " Défense " . $defense . "<br>";
                        $degats = $attaque - $defense;
        
                        //Retrait ou non de PV
                        if($degats > 0){//Dégats infligés
                            echo "Dégats infligés : " . $degats. "<br>";
                            $hero->pv -= $degats;
                            echo "Défenseur : Héros : PV = " . $hero->pv . " attaque ". $hero->attaque . "<br>";
                        } else {
                            echo "Le héros ne l'a même pas senti passer";
                        }
                    }
                } elseif($choix === 2 && $hero->class != 2){
                    //Attaque magique
                    if($qui_c_qui_commence === "Héros" /*&& si il utilise une attaque magique && si mana suffisant*/){
        
                        //Calcul Bonus (coût) de sort
                        $conn = Database::connect();
                        $query = "SELECT cost from Spell s where spell_id in (SELECT spell_id from Scroll where item_id in (SELECT item_id from Inventory i));";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $recu = $stmt->fetch(PDO::FETCH_ASSOC); 
                        $bonusSort = $recu['cost'];
                        echo "Bonus Sort : " . $bonusSort . "<br>";
        
                        echo "Attaquant : Héros : PV = " . $hero->pv . " Mana ". $hero->mana . "<br>";
                        $attaque = rand(1, 6) + rand(1,6) + $bonusSort; 
                        $defense = rand(1, 6) + (int)($monster->attaque / 2);
                        echo "Attaque : " . $attaque . " Défense " . $defense . "<br>";
                        $degats = $attaque - $defense;
                        //Retirer Mana en fonction du sort
                        $hero->mana -= $bonusSort;
                        //Calcul de dégâts
                        if($degats > 0){//Dégats infligés
                            echo "Dégats infligés : " . $degats. "<br>";
                            $monster->pv -= $degats;
                            echo "Défenseur : Monstre : PV = " . $monster->pv . " attaque ". $monster->attaque . "<br>";
                        } else {
                            echo "Le monstre ne l'a même pas senti passer";
                        }
                    } 
                    else /*C'est le monstre qui commence*/{
                        //Calcul Bonus d'armure
                        $conn = Database::connect();
                        $query = "SELECT armor_bonus from Armor where armor_id in (select armor_id from Hero)";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $recu = $stmt->fetch(PDO::FETCH_ASSOC);
                        $bonusArmure = $recu['armor_bonus'];
                        echo "Bonus Armure : " . $bonusArmure . "<br>";
                        
                        echo "Attaquant : Monstre : PV = " . $monster->pv . " Mana ". $monster->mana . "<br>";
                        $attaque = rand(1, 6) + rand(1,6);
                        if($hero->class != 3){
                            $defense = rand(1, 6) + (int)($hero->attaque / 2) + $bonusArmure;
                        } else {
                            $defense = rand(1, 6) + (int)($hero->initiative / 2) + $bonusArmure;
                        }
                        echo "Attaque : " . $attaque . " Défense " . $defense . "<br>";
                        $degats = $attaque - $defense;
        
                        if($degats > 0){//Dégats infligés
                            echo "Dégats infligés : " . $degats. "<br>";
                            $hero->pv -= $degats;
                            echo "Défenseur : Héros : PV = " . $hero->pv . " attaque ". $hero->attaque . "<br>";
                        } else {
                            echo "Le héros ne l'a même pas senti passer";
                        }
                    }
                } elseif($choix === 3){
                    //Le héros veut boire une potion
                    //Affichage potions
                    $conn = Database::connect();
                    $query = "SELECT item_id, name, quantity from Inventory i join Items i2 using (item_id) where item_id BETWEEN 1 and 8 order by item_id;";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
        
                    //Récuperer item_id minimum
                    $connMin = Database::connect();
                    $queryMin = "SELECT min(item_id) from Inventory i join Items i2 using (item_id) where item_id BETWEEN 1 and 8 order by item_id;";
                    $stmtMin = $connMin->prepare($queryMin);
                    $stmtMin->execute();
                    $recuMin = $stmtMin->fetch(PDO::FETCH_ASSOC);
                    
                    //Récupérer item_id maximum
                    $connMax = Database::connect();
                    $queryMax = "SELECT max(item_id) from Inventory i join Items i2 using (item_id) where item_id BETWEEN 1 and 8 order by item_id;";
                    $stmtMax = $connMax->prepare($queryMax);
                    $stmtMax->execute();
                    $recuMax = $stmtMax->fetch(PDO::FETCH_ASSOC);
        
                    echo "Potions dans l'inventaire" . "<br>";
                    while ($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        // Afficher chaque ligne
                        echo "N°" . $recu['item_id'] . " Nom : " . $recu['name'];
                        echo " Quantité : " . $recu['quantity'] . "<br>";
                    }
        
                    // Génération du formulaire avec des echo
                    echo '<form method="POST" action="">';
                    echo    '<p> Choisissez une potion à utiliser </p>';
                    echo    '<label for="valeurPotion">Entrez le numéro de la potion :</label><br>';
                    echo    '<input type="number" id="valeurPotion" name="valeurPotion" min="' . $recuMin['min(item_id)'] . '" max="' . $recuMax['max(item_id)'] . '" required><br>';
                    echo    '<button type="submit">Boire la potion</button>';
                    echo '</form>';
        
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Vérifier si la valeur est présente
                        if (isset($_POST['valeurPotion'])) {
                            $choixPotion = (int)$_POST['valeurPotion']; // Convertir en entier
                            //Actualisation PV ou Mana
                            echo $choixPotion;
                            if($choixPotion <= 4 && $choixPotion >= 1){
                                $conn2 = Database::connect();
                                $query2 = "SELECT heal_amount from Potion p where item_id in (select item_id from Inventory i where item_id = $choixPotion)";
                                $stmt2 = $conn2->prepare($query2);
                                $stmt2->execute();
                                $recu2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                                $hero->pv += $recu2['heal_amount'];
                                echo "<br>" . "Potion bue ! : " . $recu2['heal_amount'] . " PV restaurés";

                                //Actualisation dans la base
                                $query4 = "UPDATE Inventory set quantity = $recu['quantity'] - 1 where item_id = $choixPotion";
                                $stmt4 = $conn3->prepare($query4);
                                $stmt4->execute();

                            } elseif($choixPotion <= 8 && $choixPotion >= 5) {
                                $conn3 = Database::connect();
                                $query3 = "SELECT mana_recovery from Potion p where item_id in (select item_id from Inventory i where item_id = $choixPotion)";
                                $stmt3 = $conn3->prepare($query3);
                                $stmt3->execute();
                                $recu3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                                $hero->mana += $recu3['mana_recovery'];
                                echo "<br>" . "Potion bue ! : " . $recu3['mana_amount'] . " Mana restaurés";

                                //Actualisation dans la base
                                $query4 = "UPDATE Inventory set quantity = $recu['quantity'] - 1 where item_id = $choixPotion";
                                $stmt4 = $conn3->prepare($query4);
                                $stmt4->execute();
                            }
        
                            // Vérifier si la valeurPotion est bonne
                            if (!($choixPotion >= $recuMin['min(item_id)'] && $recuMax['max(item_id)'] <= 3)) {
                                echo "Erreur : La valeur de la Potion est mauvaise <br>";
                                $choixPotion = -1;
                            }
                        } else {
                            echo "Merci de rentrer une valeur";
                        }
                    }
                // // Vérifier si la valeur est comprise entre 1 et 3
                // if (!($choix >= 1 && $choix <= 3)) {
                //     echo "Erreur : La valeur doit être comprise entre 1 et 3.<br>";
                //     $choix = -1;
                // }
            } else {
                echo "Erreur : Aucun champ n'a été soumis.<br>";
            }
        }
        

            
            if (!defined('BASE_URL')) {
                define('BASE_URL', '/DungeonXplorer');
            }
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            require_once 'views/fight.php';
        } 
    }
}


?>