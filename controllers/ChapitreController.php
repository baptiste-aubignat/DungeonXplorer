<?php
class ChapitreController {

    public $nbChap;

    public function setNbChap($id) {
        $this->nbChap = $id;
    }

    public function getChap() {
        $conn = Database::connect();

        echo "<figure class='image'><img src='".BASE_URL."/images/Chapitre_".$this->nbChap.".png' alt='image du chapitre ".$this->nbChap."'></figure>";

        $query = "SELECT * FROM Chapter where chapter_id = ".$this->nbChap.";";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        echo "<br>";

        while ($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<p class='is-size-5-desktop is-size-6-tablet'> " . $recu['content'] . "</p>";
        }

        echo "<br>";

        $this->getSuite();

        
    }

    public function getSuite() {
        $conn = Database::connect();

        $query = "SELECT * FROM Links where chapter_id = ".$this->nbChap.";";
        $stmt = $conn->prepare($query);
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


    public function index($id=0) {
        if (!defined('BASE_URL')) {
            define('BASE_URL', '/DungeonXplorer');
        }
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        define('CHAP', $this);
        $this->setNbChap($id);
        require_once 'views/chapitre.php';
    }
}