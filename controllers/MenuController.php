<?php
class MenuController {

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
        require_once 'views/menu.php';
    }

    public function listHero($pseudo) {
        $hero = $this->account->getHero($pseudo);
        while ($recu = $hero->fetch(PDO::FETCH_ASSOC)) {
            echo "
                <div class='cell'>
                    <div class='card'>
                        <div class='card-image'>
                            <figure class='image'>
                            <img
                                src='".BASE_URL."/".$recu["image"]."'
                                alt='Hero portrait'
                            />
                            </figure>
                        </div>
                        <div class='card-content'>
                            <div class='media'>
                                <div class='media-content'>
                                    <p class='title is-4'>".$recu["hero_name"]."</p>
                                    <p class='subtitle is-6'>".$recu["class_name"]." level .".$recu["level"].". <br> Chapitre 9</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        echo "
            <div class='cell'>
                <div class='card'>
                    <div class='card-image'>
                        <figure class='image'>
                        <img
                            src='".BASE_URL."/images/more.png'
                            alt='More'
                        />
                        </figure>
                    </div>
                    <div class='card-content'>
                        <div class='media'>
                            <div class='media-content'>
                                <p class='title is-4'>Créer un nouveau personnage</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }
}