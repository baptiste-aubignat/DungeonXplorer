<?php
class AfficherBddController{
    function index(){

        $conn = Database::connect();

        $query = "SELECT * FROM Monster";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        
        echo $stmt->fetch(PDO::FETCH_ASSOC)['name'];

        if (!defined('BASE_URL')) {
            define('BASE_URL', '/DungeonXplorer');
        }
        require_once 'views/afficher_bdd.php';

        
    }
}

