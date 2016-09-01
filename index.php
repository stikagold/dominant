<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once 'init.php';

try{
    $tmp = new SomeClass();
}
catch (Exception $e){
    echo $e->getMessage();
}