<?php
class HeroCreatorController {

    private $account;

    public function __construct() {
        $this->account = new Account();
    }

    public function index() {
        if (!defined('BASE_URL')) {
            define('BASE_URL', '/DungeonXplorer');
        }
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!defined('THIS')) {
            define('THIS', $this);
        }
        require_once 'views/HeroCreator.php';
    }

    public function getClass() {
        $query = "SELECT * FROM Class;";
        $stmt = $this->account->conn->prepare($query);
        $stmt->execute();
        echo "<br>";
        echo "<br>";
        while ($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<input type='radio' id='".$recu["name"]."' name='class' value='".$recu["class_id"]."'>";
            echo "<label for='".$recu["name"]."'>".$recu["name"]."</label>";
            echo "<br>";
        }
    }
}