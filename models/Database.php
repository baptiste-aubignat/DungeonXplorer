<?php
class Database {
    private static $pdo; //singleton \o/

    public static function connect() {
        if (self::$pdo === null) {
            require_once 'config/param_connexion.php'; // Charger la config
            try {
                self::$pdo = new PDO(DB_HOST, DB_USERNAME, DB_PASSWORD);
                //self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
