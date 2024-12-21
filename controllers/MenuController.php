<?php
class MenuController {
    public function index() {
        if (!defined('BASE_URL')) {
            define('BASE_URL', '/DungeonXplorer');
        }
        require_once 'views/menu.php';
    }
}