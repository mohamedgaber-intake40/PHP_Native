<?php
function autoLoader($class)
{
    $path = $class . '.php';
    $path = realpath(__DIR__ . '/..').'\\'.$path;
//    var_dump(__DIR__);
//    var_dump(realpath(__DIR__ . '/..').'\\'.$path);
    if (is_file($path)) {
//        require_once __DIR__.'\\..\\' . $path;
        require_once ($path);
    } else {
        die('class ' . $path . ' does not exist');
    }
}

spl_autoload_register('autoloader');
