<?php
class LogoutController {
    public function index() {
        if (!defined('BASE_URL')) {
            define('BASE_URL', '/DungeonXplorer');
        }
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
            if (isset($_SESSION["user"])) {
                session_unset();
                session_destroy();
            }
        }
        echo "<script type='text/javascript'>location.href = '".BASE_URL."';</script>";
        die();
    }
}