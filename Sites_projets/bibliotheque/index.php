<?php


define("URL", str_replace("index.php", "",(isset($_SERVER["HTTPS"]) ? "https" : "http" ).
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/livre.controller.php" ;

$livrecontroller = new LivreController ;

try {

if(empty($_GET['page'])){

require "views/accueil.views.php";

} else {

    $url = explode("/", filter_var($_GET["page"]),FILTER_SANITIZE_URL);
    // echo "<pre>" ;
    // print_r($url);

    switch ($url[0]){
        case "accueil" : require "views/accueil.views.php";
        break;
        case "livres" : 
        if(empty($url[1])){
            $livrecontroller->AfficherLivres() ;
        }
        else if($url[1] ==="l"){
            // echo "affichage d'un livre" ;
            $livrecontroller->afficherLivre($url[2]);
        }
        else if($url[1] ==="a"){
            // echo "ajout d'un livre" ;
            $livrecontroller->ajoutLivre();
        }
        else if($url[1] ==="n"){
            echo "modifier d'un livre" ;
        }
        else if($url[1] ==="s"){
            // echo "suppression d'un livre" ;
            $livrecontroller->suppressionLivre($url[2]);
        }
        else if($url[1] ==="av"){
            // echo "validation d'ajout d'un livre" ;
            $livrecontroller->ajoutLivreValidation() ;
        }
        else {
            throw new Exception("La page n'existe pas") ;
        }
        break;
            
            default : throw new Exception("La page n'existe pas") ;
    }
}

}
catch(Exception $e){
    echo $e->getMessage();
};