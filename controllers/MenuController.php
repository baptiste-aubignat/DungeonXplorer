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
            if (!isset($_SESSION["user"])) {
                echo "<script type='text/javascript'>location.href = '".BASE_URL."/account/connexion';</script>";
                die();
            } else if (isset($_POST["nom"]) && isset($_POST["classe"])) {
                $this->createHero();
                $_POST = array();
            }
        }
        if (!defined('THIS')) {
            define('THIS', $this);
        }
        require_once 'views/menu.php';
    }

    public function createHero() {
        $nom = htmlspecialchars($_POST["nom"]);
        $classe = htmlspecialchars($_POST["classe"]);
        $compte = $this->account->getUserByNameOrEmail($_SESSION["user"]);

        $query = "select count(*) as nb from Hero h join Hero_list hl on hl.hero_id = h.hero_id join Account a on a.account_id = hl.account_id where a.account_id = ".$compte["account_id"]." and h.name = '".$nom."';";
        $stmt = $this->account->conn->prepare($query);
        $stmt->execute();
        if ($stmt->fetch(PDO::FETCH_ASSOC)["nb"] > 0) {
            return;
        }

        $query = "SELECT * FROM Class where class_id = ".$classe.";";
        $stmt = $this->account->conn->prepare($query);
        $stmt->execute();
        $classe_stat = $stmt->fetch(PDO::FETCH_ASSOC);

        switch ($classe) {
            case 1 : //magicien
                $image = "Magician.jpg";
                break;
            case 2 : //guerrier
                $image = "Berserker.jpg";
                break;
            case 3 : //voleur
                $image = "Thief.jpg";
                break;
            default:
                $image = "More.png";
        }

        $insertUser = $this->account->conn->prepare("INSERT INTO Hero(name, class_id, image, pv, mana, strength, initiative, xp) VALUES(?, ?, ?, ?, ?, ?, ?, 0)");
        $insertUser->execute(array($nom, $classe, $image, $classe_stat["base_pv"], $classe_stat["base_mana"], $classe_stat["strength"], $classe_stat["initiative"]));

        $query = "SELECT * FROM Hero where name = '".$nom."' and class_id = '".$classe."';";
        $stmt = $this->account->conn->prepare($query);
        $stmt->execute();
        $id_hero = $stmt->fetch(PDO::FETCH_ASSOC);

        $insertUser = $this->account->conn->prepare("INSERT INTO Hero_list(account_id, hero_id) VALUES(?, ?)");
        $insertUser->execute(array($compte["account_id"], $id_hero["hero_id"]));

        $_POST = array();
    }

    public function listHero($pseudo) {
        $hero = $this->account->getHero($pseudo);
        while ($recu = $hero->fetch(PDO::FETCH_ASSOC)) {
            echo "
                <a class='cell'>
                    <div class='card'>
                        <div class='card-image'>
                            <figure class='image'>
                            <img
                                src='".BASE_URL."/images/".$recu["image"]."'
                                alt='Hero portrait'
                            />
                            </figure>
                        </div>
                        <div class='card-content'>
                            <div class='media'>
                                <div class='media-content'>
                                    <p class='title is-4'>".$recu["hero_name"]."</p>
                                    <p class='subtitle is-6'>".$recu["class_name"]." level ".$recu["level"]." <br> Chapitre ".$recu["chapter_id"]."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            ";
        }
        echo "
            <a class='cell' href='".BASE_URL."/hero/create'>
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
            </a>
        ";
    }
}