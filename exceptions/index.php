<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 8/31/16
 * Time: 12:08 AM
 */


/**
 * @param $class_name
 */
function exception_autoload($class_name){
    $valid_url = str_replace('\\', '/', $class_name).'.php';
    if(file_exists(__DIR__.'/'.$valid_url)){
        require_once(__DIR__.'/'.$valid_url);
    }
}

spl_autoload_register("exception_autoload");
