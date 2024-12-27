<?php
class PlayController {

    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function index() {
        if (!defined('BASE_URL')) {
            define('BASE_URL', '/DungeonXplorer');
        }
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
            if (!isset($_SESSION["user"])) {
                echo "<script type='text/javascript'>location.href = '".BASE_URL."';</script>";
                die();
            } else if (!isset($_SESSION["hero"])) {
                echo "<script type='text/javascript'>location.href = '".BASE_URL."/hero/selection';</script>";
                die();
            }
        }
        define('PLAY', $this);
        require_once 'views/play.php';
        
    }

    public function checkCombat() {
        $query = "select count(monster_id) as nb from Encounter e join Hero h on h.chapter_id = e.chapter_id join Hero_list hl on hl.hero_id = h.hero_id join Account a on a.account_id = hl.account_id where a.name = '".$_SESSION["user"]."' and h.name = '".$_SESSION["hero"]."';";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $_SESSION["combat"] = false;
        if ($stmt->fetch(PDO::FETCH_ASSOC)["nb"] > 0) {
            $_SESSION["combat"] = true;
        }
    }
}
?>