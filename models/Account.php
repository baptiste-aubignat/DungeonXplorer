<?php

class Account
{
    public $conn;
    private $info;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function getUserByNameOrEmail($pseudo) {
        $query = "SELECT account_id, name, email, password FROM Account WHERE name = :pseudo OR email = :pseudo";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['pseudo' => $pseudo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getPseudo($pseudo) {
        if (!isset($this->info)) {
            $this->info = $this->getUserByNameOrEmail($pseudo);
        }
        return $this->info['name'];
    }

    public function getAddresseMail($pseudo) {
        if (!isset($this->info)) {
            $this->info = $this->getUserByNameOrEmail($pseudo);
        }
        return $this->info['email'];
    }
}
?>
