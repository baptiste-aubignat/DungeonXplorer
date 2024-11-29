<?php 
// autoload.php
spl_autoload_register(function ($class) {
    $directories = array(
        'models/',
        'controllers/',
        'router/src/'
    );

    foreach ($directories as $directory) {
        $filePath = $directory . $class . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;
            return;
        }
    }
});
