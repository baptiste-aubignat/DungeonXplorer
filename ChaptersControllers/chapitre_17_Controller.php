<?php
class chapitre_17{
    function index(){

        $conn = Database::connect();

        $query = "SELECT * FROM Chapter where chapter_id = 17";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $recu = $stmt->fetch(PDO::FETCH_ASSOC);

        while ($recu = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<br> " . $recu['content'] . "<br>";
        }

        

        if (!defined('BASE_URL')) {
            define('BASE_URL', '/DungeonXplorer');
        }
        require_once 'ChapterViews/chapitre_17.php';

        
    }
}

