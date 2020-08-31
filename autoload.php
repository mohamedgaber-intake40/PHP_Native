<?php
function autoLoader($class)
{
    $path = $class . '.php';
    if (is_file($path)) {
        require_once $path;
    } else {
        die('class ' . $path . ' does not exist');
    }
}

spl_autoload_register('autoloader');
