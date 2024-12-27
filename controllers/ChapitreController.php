<?php
class ChapitreController {

    public $nbChap;
    public $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function setNbChap($id) {
        $this->nbChap = $id;
    }

    public function getChap() {
        echo "<figure class='image'><img src='".BASE_URL."/images/Chapitre_".$this->nbChap.".png' alt='image du chapitre ".$this->nbChap."'></figure>";

        $query = "SELECT * FROM Chapter where chapter_id = ".$this->nbChap.";";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        echo "<br>";

        while ($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<p class='is-size-5-desktop is-size-6-tablet'> " . $recu['content'] . "</p>";
        }

        echo "<br>";

        $this->getSuite();

        
    }

    public function getSuite() {
        if (isset($_SESSION["combat"]) && $_SESSION["combat"] === true) {
            echo "<a class='button is-size-4-desktop is-size-5-tablet' href='".BASE_URL."/play'>au combat !</a>";
        } else {
            $query = "SELECT * FROM Links where chapter_id = ".$this->nbChap.";";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
    
            $suiteExiste = false;
            while ($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<a class='button is-size-4-desktop is-size-5-tablet chapitreButton' name='".$recu['next_chapter_id']."'>".$recu['description']."</a>";
                $suiteExiste = true;
            }
        }
    }

    public function reset() {
        $query = "UPDATE Hero set current_level = 1 where name = '".$_SESSION["hero"]."' and hero_id IN (select hero_id from Hero_list hl join Account a on a.account_id = hl.account_id where a.name = '".$_SESSION["user"]."');";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $query = "UPDATE Hero h set pv = (select c.base_pv from Class c where c.class_id = h.class_id) where name = '".$_SESSION["hero"]."' and hero_id IN (select hero_id from Hero_list hl join Account a on a.account_id = hl.account_id where a.name = '".$_SESSION["user"]."');";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $query = "UPDATE Hero h set mana = (select c.base_mana from Class c where c.class_id = h.class_id) where name = '".$_SESSION["hero"]."' and hero_id IN (select hero_id from Hero_list hl join Account a on a.account_id = hl.account_id where a.name = '".$_SESSION["user"]."');";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }


    public function index() {
        if (!defined('BASE_URL')) {
            define('BASE_URL', '/DungeonXplorer');
        }
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        define('CHAP', $this);
        $query = "select h.chapter_id from Hero h join Hero_list hl on hl.hero_id = h.hero_id join Account a on a.account_id = hl.account_id where a.name = '".$_SESSION["user"]."' and h.name = '".$_SESSION["hero"]."';";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $this->setNbChap($stmt->fetch(PDO::FETCH_ASSOC)["chapter_id"]);
        if ($this->nbChap == 10) {
            $this->reset();
        }
        require_once 'views/part/chapitre.php';
    }
}