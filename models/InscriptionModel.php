<?php

class InscriptionModel {
    private $accountModel;

    public function __construct($pdo) {
        $this->accountModel = new AccountModel($pdo);
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
    
    
            $insertUser = $this->accountModel->conn->prepare("INSERT INTO Account(name, email, password) VALUES(?, ?, ?)");
            $insertUser->execute(array($pseudo, $email, $password));
        } else {
            Utility::alert("Merci de completer tous les champs");
        }
    }
}
?>
