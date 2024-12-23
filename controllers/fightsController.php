<?php
class fightsController{
    function index(){
        //Requête Monstre
        $conn = Database::connect();
        $query = "SELECT * FROM Monster where monster_id = 8";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $recu = $stmt->fetch(PDO::FETCH_ASSOC);
        //Requête Héros
        $query2 = "SELECT * FROM Hero where hero_id = 1";
        $stmt2 = $conn->prepare($query2);
        $stmt2->execute();
        $recu2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        //Calcul des nouvelles initiatives
        $R_initiative_M =  $recu['initiative'];
        $R_initiative_H = $recu2['initiative'];
        $T_initiative_M = $R_initiative_M + rand(1,6);
        $T_initiative_H = $R_initiative_H + rand(1,6);
        
        //Détermination de qui commence
        if($T_initiative_M < $T_initiative_H && $recu2['class_id'] != 3){
            $qui_c_qui_commence = "Héros";

        } elseif($T_initiative_M > $T_initiative_H && $recu2['class_id'] != 3) {
            $qui_c_qui_commence = "Monstre";

        } elseif($T_initiative_M == $T_initiative_H && $recu2['class_id'] == 3) {
            $qui_c_qui_commence = "Héros";

        } elseif($T_initiative_M == $T_initiative_H && $recu2['class_id'] != 3) {
            $qui_c_qui_commence = "Monstre";
        }
        //Attaques Physiques
        if($qui_c_qui_commence === "Héros" /*&& si il utilise une attaque physique*/){
            echo "Attaquant : Héros : PV = " . $recu2['pv'] . " Force ". $recu2['strength'] . "<br>";
            $attaque = rand(1, 6) + $recu2['strength']; //Ici, rajouter bonus d'arme (requête SQL avec du join)
            $defense = rand(1, 6) + (int)($recu['strength'] / 2);
            echo "Attaque : " . $attaque . " Défense " . $defense . "<br>";
            $degats = $attaque - $defense;
            if($degats > 0){//Dégats infligés, on met a jour les pv du monstre dans la base
                echo "Dégats infligés : " . $degats. "<br>";
            } else {
                echo "Le monstre ne l'a même pas senti passer";
            }
        } 
        else {
            echo "Attaquant : Monstre : PV = " . $recu['pv'] . " Force ". $recu['strength'] . "<br>";
            $attaque = rand(1, 6) + $recu['strength']; //Ici, rajouter bonus d'arme (requête SQL avec du join)
            $defense = rand(1, 6) + (int)($recu2['strength'] / 2); //Ici, rajouter bonus d'armure (requête SQL avec du join)
            echo "Attaque : " . $attaque . " Défense " . $defense . "<br>";
            $degats = $attaque - $defense;
            if($degats > 0){//Dégats infligés, on met a jour les pv du monstre dans la base
                echo "Dégats infligés : " . $degats. "<br>";
            } else {
                echo "Le Héros ne l'a même pas senti passer";
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


?>