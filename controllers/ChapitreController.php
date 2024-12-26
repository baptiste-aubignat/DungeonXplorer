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
        $query = "SELECT * FROM Links where chapter_id = ".$this->nbChap.";";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $suiteExiste = false;
        while ($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<a href='".BASE_URL."/chapitre/".$recu['next_chapter_id']."' class='button is-size-4-desktop is-size-5-tablet'>".$recu['description']."</a>";
            $suiteExiste = true;
        }
        if (!$suiteExiste) {
            echo "<a href='".BASE_URL."/chapitre/".($this->nbChap+1)."' class='button'>prochain chapitre</a>";
        }
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
        require_once 'views/part/chapitre.php';
    }
}