<?php
class ConnexionController {
    private $accountModel;

    public function __construct() {
        $this->accountModel = new Account();
    }

    public function connexion($user, $pass) {
        if (!empty($user) && !empty($pass)) {
            $user = $this->accountModel->getUserByNameOrEmail($user);
            $pass = sha1($pass);

            if ($user) {
                if ($pass === $user['password']) {
                    $_SESSION['user'] = $user; // Enregistre l'utilisateur dans la session
                    Utility::alert("Connexion établie");
                    return true;
                } else {
                    Utility::alert("Mot de passe incorrect !");
                    return false;
                }
            } else {
                Utility::alert("Adresse mail ou pseudo inexistant");
            }
        } else {
            Utility::alert("Merci de compléter tous les champs");
        }
    }

    public function index() {
        if (!defined('BASE_URL')) {
            define('BASE_URL', '/DungeonXplorer');
        }
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $controller = new ConnexionController();
        if (isset($_POST['envoiConnexion'])) {
            $controller->connexion($_POST['pseudoMail'], $_POST['password']);
            //reinitialisation des mots de passe
            $_POST['password'] = '';
        }
        require_once 'views/connexion.php';
    }
}