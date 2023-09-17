<?php
spl_autoload_register("myAutoloader");

function myAutoloader($Class_name){
    $path = "classes/";
    $ext = ".class.php";
    $fill = $path . $Class_name .$ext;
    if(!file_exists($fill)){
        return false;
    }
    include_once $fill;
}