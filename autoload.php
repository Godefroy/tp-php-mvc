<?php

// Autoload
spl_autoload_register(function($classname) {
    $classname = str_replace('Blog\\', '/', $classname);
    $classname = str_replace('\\', '/', $classname);
    $classname = ltrim($classname, '/');
    require $classname . '.php';
});
