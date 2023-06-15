<?php session_start();

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

if(empty($_GET['page'])){

    require "accueil.php" ;

}else{
    switch($_GET['page']){
        case "accueil" : 
    require "accueil.php" ;
break;
    }
}