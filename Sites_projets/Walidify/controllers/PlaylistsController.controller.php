<?php

require "models/playlistManager.class.php" ;

class PlaylistsController{

    private $playlistManager ;

    public function __construct(){

    $this->playlistManager = new PlaylistManager() ;
    $this->playlistManager->chargementPlaylist();
    }


// Fonction afin d'afficher la liste des playlists dans la page playlists

    public function afficherPlaylist(){

        $playlists = $this->playlistManager->getPlaylists() ;
        require "views/playlist.view.php" ;
    }


// Fonction afin d'afficher une playlist dans une page

    public function affichagePlaylist($id){

        $playlist = $this->playlistManager->getPlaylistById($id);
        require "views/affichage/afficherPlaylist.view.php" ;
     }


// Fonction afin d'ajouter une playlist dans la liste

     public function ajoutPlaylist(){
        require "views/ajout/ajoutPlaylist.view.php" ;
    }

    public function ajoutPlaylistValidation(){
        $file = $_FILES['images'];
        // echo "<pre>";
        // print_r($file);
        // echo "</pre>";

        $repertoire = "public/images/" ;
        $nomImageAjoute =  $this->ajoutImage($file,$repertoire) ;
      
        $this->playlistManager->ajoutPlaylistBd($_POST['playlist'],$_POST['link'],$nomImageAjoute);

        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Ajout réalisé avec succès"
        ];
        header('Location: ' . URL . "playlists");
    }



    public function suppressionPlaylist($id){

        $nomImage = $this->playlistManager->getPlaylistById($id)->getImages();
        unlink("public/images/".$nomImage);
        $this->playlistManager->suppressionPlaylistBd($id);

        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Suppression réalisée avec succès"
        ];
        header('Location: ' . URL . "playlists");
    }



    public function modificationPlaylist($id){
        $playlist = $this->playlistManager->getPlaylistById($id);
        require "views/modif/modifierPlaylist.view.php";
    }


    public function modificationPlaylistValidation(){
        $imageActuelle = $this->playlistManager->getPlaylistById($_POST['identifiant'])->getImages();
        $file = $_FILES['images'];

        if($file['size']>0){
            unlink("public/images/".$imageActuelle);
            $repertoire = "public/images/" ;
            $nomImageToAdd =  $this->ajoutImage($file,$repertoire) ; // upload de l'image
        } else{
            $nomImageToAdd = $imageActuelle ;
        }
        $this->playlistManager->modificationPlaylistBd($_POST['identifiant'],$_POST['playlist'], $nomImageToAdd,$_POST['link']);
        
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Modification réalisée avec succès"
        ];

        header('Location: ' . URL . "playlists");

    }

    
    private function ajoutImage($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");

        if(!file_exists($dir)) mkdir($dir,0777);

        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];

        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }

}