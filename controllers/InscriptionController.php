<?php
class InscriptionController {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function inscription($user, $pass, $passValid, $email){
        if ( !empty($user) and !empty($pass) and !empty($passValid) and !empty($email)) {
            if ($pass != $passValid) {
                Utility::alert("Mot de passe différent !");
                return false;
            }

            Utility::alert("Compte crée !");
            $pseudo = htmlspecialchars($user);
            $password = sha1($pass);
            $email = htmlspecialchars($email);
    
    
            $insertUser = $this->conn->prepare("INSERT INTO Account(name, email, password) VALUES(?, ?, ?)");
            $insertUser->execute(array($pseudo, $email, $password));
            $_SESSION['user'] = $pseudo;
        } else {
            Utility::alert("Merci de completer tous les champs");
        }
    }
    public function index() {
        if (!defined('BASE_URL')) {
            define('BASE_URL', '/DungeonXplorer');
        }
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
            if (isset($_SESSION["user"])) {
                echo "<script type='text/javascript'>location.href = '".BASE_URL."/menu';</script>";
                die();
            }
        }
        
        $controller = new InscriptionController();
        if (isset($_POST['pseudo'])) {
            $controller->inscription($_POST['pseudo'], $_POST['password'], $_POST['passwordValid'], $_POST['email']);
            //reinitialisation des mots de passe
            $_POST['password'] = '';
            $_POST['passwordValid'] = '';
        }
        require_once 'views/inscription.php';
    }
}