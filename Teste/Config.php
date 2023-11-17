<?php

    $print = function($class)
    {
        if(file_exists('Classes/'.$class.'.php'))
        {
            include_once('Classes/'.$class.'.php');
        }
    };

    spl_autoload_register($print);

    define('HOST','localhost');
    define('DATABASE', 'alyson');
    define('USER','root');
    define('PASSWORD','');

?>