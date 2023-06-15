<?php

session_start();

// Définition de la constante URL qui permettra d'accéder à toutes les ressources en repartant de la racine du site
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/AlbumsController.controller.php";
require_once "controllers/ArtistesController.controller.php";
require_once "controllers/PlaylistsController.controller.php";
require_once "controllers/ConnexionController.controller.php";
require_once "controllers/CommentController.controller.php";




$albumController = new AlbumsController;
$artisteController = new ArtistesController;
$playlistController = new PlaylistsController;
$affichageController = new connexionController;
$commentaireController = new CommentaireController;




if (isset($_SESSION['id']) && $_SESSION['role'] === 'user') {
    echo "Vous êtes connecté en tant que " . $_SESSION['pseudo'];
} elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    echo "Vous êtes connecté en tant qu'admin " . $_SESSION['pseudo_admin'];
}


// Permet de rediriger vers la page d'accueil ou autre selon contenu de l'URL après 'page' grâce au switch


try {
    if (empty($_GET['page'])) {

        require "views/accueil.view.php";
    } else {

        // Découpage de l'URL pour accéder aux routes
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);


        switch ($url[0]) {
            case "accueil":
                require "views/accueil.view.php";
                break;


            case "albums":
                if (empty($url[1])) {

                    $albumController->afficherAlbums();

                } else if ($url[1] === "l") {

                // affichage d'un album
                    $albumController->afficherAlbum($url[2]);
                    $commentaireController->addCommentaire($url[2]);
                    $commentaires = $commentaireController->getCommentaires($url[2]);


                } else if ($url[1] === "a") {

                // ajout d'un album

                    $albumController->ajoutAlbum();
                }
                 else if ($url[1] === "m") {

                // modification d'un album

                    $albumController->modificationAlbum($url[2]);
                } else if ($url[1] === "s") {

                // suppression d'un album

                    $albumController->suppressionAlbum($url[2]);
                } else if ($url[1] === "av") {

                    $albumController->ajoutAlbumValidation();
                } else if ($url[1] === "mv") {

                    $albumController->modificationAlbumValidation();
                } else {
                    throw new Exception("La page n'existe pas.");
                }
                break;


            case "artistes":


                if (empty($url[1])) {
                    $artisteController->afficherArtistes();
                } else if ($url[1] === "l") {

                    $artisteController->afficherArtiste($url[2]);
                } else if ($url[1] === "a") {
                    $artisteController->ajoutArtiste();
                } else if ($url[1] === "m") {
                    $artisteController->modificationArtiste($url[2]);
                } else if ($url[1] === "s") {
                    $artisteController->suppressionArtiste($url[2]);
                } else if ($url[1] === "av") {
                    $artisteController->ajoutArtisteValidation();
                } else if ($url[1] === "mv") {

                    $artisteController->modificationArtisteValidation();
                } else {
                    throw new Exception("La page n'existe pas.");
                }
                break;


            case "playlists":

                if (empty($url[1])) {

                    $playlistController->afficherPlaylist();
                } else if ($url[1] === "l") {

                    $playlistController->affichagePlaylist($url[2]);
                } else if ($url[1] === "a") {

                    $playlistController->ajoutPlaylist();
                } else if ($url[1] === "m") {
                    $playlistController->modificationPlaylist($url[2]);
                } else if ($url[1] === "s") {
                    $playlistController->suppressionPlaylist($url[2]);
                } else if ($url[1] === "av") {
                    $playlistController->ajoutPlaylistValidation();
                } else if ($url[1] === "mv") {

                    $playlistController->modificationPlaylistValidation();
                } else {
                    throw new Exception("La page n'existe pas.");
                }
                break;


                case "connexion":
                    if (empty($url[1])) {
                        $affichageController->AfficherPageConnexion();
                    } else if ($url[1] === "i") {
    
                        $affichageController->AfficherPageInscription();
                    } 
                    else if ($url[1] === "d") {
    
                        $affichageController->deconnexion();
                    } 
                    else if ($url[1] === "admin") {
                        $affichageController->AfficherPageConnexionAdmin();
    
                    } 

                    else if ($url[1] === "admininscrip") {
                        $affichageController->AfficherPageInscriptionAdmin();
    
                    } 
                    
                    break;

                    case "inscription":
                        if (empty($url[1])) {
                            $affichageController->AfficherPageInscription();

                        }
                        
                        break;
                        
                  case "deconnexion" : 
                        if (empty($url[1])) {
                            $affichageController->deconnexion();
                        }
                    
                    break;

                      case "news":
                    require "views/news.view.php";
                    break;

            default:
                throw new Exception("La page n'existe pas.");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
