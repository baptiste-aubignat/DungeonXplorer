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
        if ($this->prefix && strpos($url, $this->prefix) === 0) {
            $url = substr($url, strlen($this->prefix));
        }

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
$router->addRoute('hero/selection', 'HeroSelectionController@index');
$router->addRoute('hero/create', 'HeroCreatorController@index');
$router->addRoute('play', 'PlayController@index');

$router->addRoute('afficher_bdd', 'AfficherBddController@index');

$router->addRoute('chapitre', 'ChapitreController@index');
$router->addRoute('chapitre/{id}', 'ChapitreController@index');

$router->addRoute('account/inscription', 'InscriptionController@index');
$router->addRoute('account/connexion', 'ConnexionController@index');
$router->addRoute('account/profile', 'ProfileController@index');
$router->addRoute('account/logout', 'LogoutController@index');
$router->addRoute('fight', 'fightsController@index');
$router->addRoute('private/tool/ajax', 'Ajax@index');


// Appel de la méthode route
$router->route(trim($_SERVER['REQUEST_URI'], '/'));
