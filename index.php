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

    public function route($url) {
        /*
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
        }*/
        // Retirer le préfixe de l'URL si nécessaire
        if ($this->prefix && strpos($url, $this->prefix) === 0) {
            $url = substr($url, strlen($this->prefix));
        }

        // Supprimer les barres obliques en trop
        $url = trim($url, '/');

        foreach ($this->routes as $route => $action) {
            $pattern = preg_replace('#\{([a-zA-Z_]+)\}#', '([^/]+)', $route);
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);

                [$controller, $method] = explode('@', $action);

                if (class_exists($controller) && method_exists($controller, $method)) {
                    $instance = new $controller();
                    return call_user_func_array([$instance, $method], $matches);
                }
            }
        }

        http_response_code(404);
        echo "<h2>La page demandée n'existe pas</h2>";
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
$router->addRoute('chapitre', 'ChapitreController@index');
$router->addRoute('chapitre/{id}', 'ChapitreController@index');

$router->addRoute('profile', 'ProfileController@index');
$router->addRoute('logout', 'LogoutController@index');

// Appel de la méthode route
$router->route(trim($_SERVER['REQUEST_URI'], '/'));
