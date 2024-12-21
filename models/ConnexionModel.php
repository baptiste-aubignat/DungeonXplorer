<?php

class ConnexionModel {
    private $accountModel;

    public function __construct($pdo) {
        $this->accountModel = new AccountModel($pdo);
    }

    public function login($user, $pass) {
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
}
?>
