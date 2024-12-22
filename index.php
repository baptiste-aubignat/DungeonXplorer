<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'autoload.php';

class Router
{
    private $routes = [];
    private $prefix;

    public function __construct($prefix = '')
    {
        $this->prefix = trim($prefix, '/');
    }

    public function addRoute($uri, $controllerMethod)
    {
        $this->routes[trim($uri, '/')] = $controllerMethod;
    }

    public function route($url)
    {
        // Suppression du préfixe du début de l'URL
        if ($this->prefix && strpos($url, $this->prefix) === 0) {
            $url = substr($url, strlen($this->prefix) + 1);
        }

        // Suppression des barres obliques en trop
        $url = trim($url, '/');

        // Vérification de la correspondance de l'URL à une route définie
        if (array_key_exists($url, $this->routes)) {
            // Extraction du nom du contrôleur et de la méthode
            list($controllerName, $methodName) = explode('@', $this->routes[$url]);

            // Instanciation du contrôleur et appel de la méthode
            $controller = new $controllerName();
            $controller->$methodName();
        } else {
            // Gestion des erreurs (page 404, etc.)
            echo '<h2>la page demandée n\'existe pas</h2>';
        }
    }
}

// Instanciation du routeur
$router = new Router('DungeonXplorer');

// Ajout des routes
$router->addRoute('', 'HomeController@index');
$router->addRoute('menu', 'MenuController@index');
$router->addRoute('inscription', 'InscriptionController@index');
$router->addRoute('connexion', 'ConnexionController@index');
$router->addRoute('afficher_bdd', 'AfficherBddController@index');
// Ajout de tous les chapitres (miam)
$router->addRoute('chapitre_1', 'chapitre_1@index');
$router->addRoute('chapitre_2', 'chapitre_2@index');
$router->addRoute('chapitre_3', 'chapitre_3@index');
$router->addRoute('chapitre_4', 'chapitre_4@index');
$router->addRoute('chapitre_5', 'chapitre_5@index');
$router->addRoute('chapitre_6', 'chapitre_6@index');
$router->addRoute('chapitre_7', 'chapitre_7@index');
$router->addRoute('chapitre_8', 'chapitre_8@index');
$router->addRoute('chapitre_9', 'chapitre_9@index');
$router->addRoute('chapitre_10', 'chapitre_10@index');
$router->addRoute('chapitre_11', 'chapitre_11@index');
$router->addRoute('chapitre_12', 'chapitre_12@index');
$router->addRoute('chapitre_13', 'chapitre_13@index');
$router->addRoute('chapitre_14', 'chapitre_14@index');
$router->addRoute('chapitre_15', 'chapitre_15@index');
$router->addRoute('chapitre_16', 'chapitre_16@index');
$router->addRoute('chapitre_17', 'chapitre_17@index');
$router->addRoute('chapitre_18', 'chapitre_18@index');
$router->addRoute('chapitre_19', 'chapitre_19@index');
$router->addRoute('chapitre_20', 'chapitre_20@index');
$router->addRoute('chapitre_21', 'chapitre_21@index');
$router->addRoute('chapitre_22', 'chapitre_22@index');
$router->addRoute('chapitre_23', 'chapitre_23@index');
$router->addRoute('chapitre_24', 'chapitre_24@index');
$router->addRoute('chapitre_25', 'chapitre_25@index');
$router->addRoute('chapitre_26', 'chapitre_26@index');
$router->addRoute('chapitre_27', 'chapitre_27@index');
$router->addRoute('chapitre_28', 'chapitre_28@index');


// Appel de la méthode route
$router->route(trim($_SERVER['REQUEST_URI'], '/'));
