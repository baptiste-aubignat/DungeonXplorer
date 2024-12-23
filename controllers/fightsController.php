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
        //Attaques Physiques
        if($qui_c_qui_commence === "Héros" /*&& si il utilise une attaque physique*/){

            echo "Attaquant : Héros : PV = " . $hero->pv . " attaque ". $hero->attaque . "<br>";
            $attaque = rand(1, 6) + $hero->attaque; //Ici, rajouter bonus d'arme (requête SQL avec du join)
            $defense = rand(1, 6) + (int)($monster->attaque / 2);
            echo "Attaque : " . $attaque . " Défense " . $defense . "<br>";
            $degats = $attaque - $defense;

            if($degats > 0){//Dégats infligés
                echo "Dégats infligés : " . $degats. "<br>";
                $monster->pv -= $degats;
                echo "Défenseur : Monstre : PV = " . $monster->pv . " attaque ". $monster->attaque . "<br>";
            } else {
                echo "Le monstre ne l'a même pas senti passer";
            }
        } 
        else {

            echo "Attaquant : Monstre : PV = " . $monster->pv . " attaque ". $monster->attaque . "<br>";
            $attaque = rand(1, 6) + $monster->attaque; //Ici, rajouter bonus d'arme (requête SQL avec du join)
            $defense = rand(1, 6) + (int)($hero->attaque / 2);
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
        echo "<br> <br> <br>";
        //Attaque magique
        if($qui_c_qui_commence === "Héros" /*&& si il utilise une attaque magique && si mana suffisant*/){

            echo "Attaquant : Héros : PV = " . $hero->pv . " Mana ". $hero->mana . "<br>";
            $attaque = rand(1, 6) + rand(1,6); //Ici, rajouter bonus de sort (requête SQL avec du join)
            $defense = rand(1, 6) + (int)($monster->attaque / 2);
            echo "Attaque : " . $attaque . " Défense " . $defense . "<br>";
            $degats = $attaque - $defense;
            //Retirer Mana en fonction du sort
            if($degats > 0){//Dégats infligés
                echo "Dégats infligés : " . $degats. "<br>";
                $monster->pv -= $degats;
                echo "Défenseur : Monstre : PV = " . $monster->pv . " attaque ". $monster->attaque . "<br>";
            } else {
                echo "Le monstre ne l'a même pas senti passer";
            }
        } 
        else /* if mana suffisant*/{
            
            echo "Attaquant : Monstre : PV = " . $monster->pv . " Mana ". $monster->mana . "<br>";
            $attaque = rand(1, 6) + rand(1,6); //Ici, rajouter bonus de sort (requête SQL avec du join)
            $defense = rand(1, 6) + (int)($hero->attaque / 2);
            echo "Attaque : " . $attaque . " Défense " . $defense . "<br>";
            $degats = $attaque - $defense;
            //Retirer Mana (1 seul sort)
            if($degats > 0){//Dégats infligés
                echo "Dégats infligés : " . $degats. "<br>";
                $hero->pv -= $degats;
                echo "Défenseur : Héros : PV = " . $hero->pv . " attaque ". $hero->attaque . "<br>";
            } else {
                echo "Le héros ne l'a même pas senti passer";
            }
        }
        // Si le héros veut boire une potion, requête pour récupérer le nombre de pv/mana
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