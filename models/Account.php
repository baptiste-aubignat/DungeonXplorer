<?php

class Account
{
    public $conn;
    private $info;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function getUserByNameOrEmail($pseudo)
    {
        $query = "SELECT account_id, name, email, password, isAdmin FROM Account WHERE name = :pseudo OR email = :pseudo";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['pseudo' => $pseudo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getPseudo($pseudo)
    {
        if (!isset($this->info)) {
            $this->info = $this->getUserByNameOrEmail($pseudo);
        }
        return $this->info['name'];
    }

    public function getAddresseMail($pseudo)
    {
        if (!isset($this->info)) {
            $this->info = $this->getUserByNameOrEmail($pseudo);
        }
        return $this->info['email'];
    }

    public function getIsAdmin($pseudo)
    {
        if (!isset($this->info)) {
            $this->info = $this->getUserByNameOrEmail($pseudo);
        }
        return $this->info['isAdmin'];
    }


    public function getHero($pseudo)
    {
        $query = "select h.name as hero_name, h.image as image, h.current_level as level, c.name as class_name, chapter_id from Account a join Hero_list l on a.account_id = l.account_id join Hero h on h.hero_id = l.hero_id join Class c on h.class_id = c.class_id where a.name = '" . $pseudo . "';";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
