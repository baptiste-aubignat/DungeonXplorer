<?php
class ProfileController {

    public function index() {
        if (!defined('BASE_URL')) {
            define('BASE_URL', '/DungeonXplorer');
        }
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
            if (!isset($_SESSION["user"])) {
                echo "<script type='text/javascript'>location.href = '".BASE_URL."/connexion';</script>";
                die();
            }
        }
        if (!defined('PROFILE')) {
            define('PROFILE', new Account());
        }
        require_once 'views/profile.php';
    }
}