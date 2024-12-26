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

        // echo "<form method=\"GET\" action=\"fightsController.php\">";
        // echo    "<p> 1 : Attaque physique   2 : Attaque Magique    3 : Potion </p>";
        // echo    "<label for='Choix'>Action : </label>";
        // echo    "<input type='text' id='Choix' name='Choix'>";
        // echo    "<button type='submit'>Envoyer</button>";
        // echo "</form>";


        if (isset($_GET['Choix'])) {
            $choix = htmlspecialchars($_GET['Choix']); // Sécuriser la valeur
            echo "Choix : " . $choix;
        }
        

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
        echo "<br> <br> <br>";
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
        // if(le héros veut boire une potion)
        //Affichage potions
        $conn = Database::connect();
        $query = "SELECT name, quantity from Inventory i join Items i2 using (item_id) where item_id BETWEEN 1 and 8 order by item_id;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo "Potions dans l'inventaire" . "<br>";
        while ($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Afficher chaque ligne
            echo " Nom : " . $recu['name'];
            echo " Quantité : " . $recu['quantity'] . "<br>";
            echo "<hr>";
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


?>