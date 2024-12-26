<?php
class PlayController {
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
        require_once 'views/play.php';
    }
}
?>