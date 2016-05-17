<?php

function mw_autoload($class_name)
{
    echo "In Autoload<br>";
    try{
        //Simple directories for libraries
        $array_paths = array(
            __DIR__.'/../modules',
            __DIR__
        );

        //Try load from standard directories
        foreach ($array_paths as $path){
            echo "Try load ".$path.'/'.$class_name.'.php'."<br>";
            if(file_exists($path.'/'.$class_name.'.php')){
                require_once($path.'/'.$class_name.'.php');
                return;
            }
        }
    }
    catch (Exception $error){
        echo "System error: Try load class $class_name, class is missing in system";
    }


}

spl_autoload_register('mw_autoload');