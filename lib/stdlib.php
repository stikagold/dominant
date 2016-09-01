<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 8/30/16
 * Time: 6:30 PM
 */
define("LIB_DIR", __DIR__.'/');
define("ROOT_DIR", __DIR__.'/../');
define("MODS_DIR", ROOT_DIR.'modules/');
define("EXCEPTIONS", ROOT_DIR.'exceptions/');

require_once(EXCEPTIONS.'index.php');

/**
 * @param $class_name
 * @throws ClassNotFound
 */
function dominant_autoload($class_name){
    $valid_url = str_replace('\\', '/', $class_name).'.php';
    if(file_exists($valid_url))
        require_once($valid_url);
    else{

        $available_directories = [
            'lib',
            'modules',
        ];
        $is_linked = false;
        foreach ($available_directories as $directory){
            if(file_exists($directory.'/'.$valid_url)){
                require_once($directory.'/'.$valid_url);
                $is_linked = true;
            }
        }
        if(!$is_linked)throw new ClassNotFound("The class ".$class_name." is missing in system");
    }
}

spl_autoload_register("dominant_autoload");