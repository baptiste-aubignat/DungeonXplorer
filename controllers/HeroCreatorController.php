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
}