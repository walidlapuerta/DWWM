<?php

require_once "models/albumManager.class.php" ;
require_once "CommentController.controller.php" ; 


class AlbumsController{

    private $albumManager ;
    private $commentairesController; 


    public function __construct(){

    $this->albumManager = new AlbumManager() ;
    $this->albumManager->chargementAlbum();

    $this->commentairesController = new CommentaireManager(); 

    }

// Fonction afin d'afficher la liste des albums dans la page albums
    public function afficherAlbums(){

        $albums = $this->albumManager->getAlbums() ;
        require "views/album.view.php" ;    
    }

// Fonction afin d'afficher un Album dans une page

    public function afficherAlbum($id){
       $album = $this->albumManager->getAlbumById($id);
       $commentaires = $this->commentairesController->getCommentaires($id);
       require "views/affichage/afficherAlbum.view.php" ;
    }

// Fonction afin d'ajouter un album dans la liste

    public function ajoutAlbum(){
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            require "views/ajout/ajoutAlbum.view.php" ;
        } else {
            // Si l'utilisateur n'est pas un admin, redirigez-le vers une autre page ou affichez un message d'erreur.
            echo "Vous n'avez pas les permissions nécessaires pour accéder à cette page.";
        }
    }


    public function ajoutAlbumValidation(){
        $file = $_FILES['image'];
        // echo "<pre>";
        // print_r($file);
        // echo "</pre>";

        $repertoire = "public/images/" ;
        $nomImageAjoute =  $this->ajoutImage($file,$repertoire) ;
        $this->albumManager->ajoutAlbumBd($_POST['artiste'],$_POST['album'], $_POST['tracks'],$_POST['duree'],
        $_POST['dateSortie'], $_POST['statut'],$nomImageAjoute);
        
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Ajout réalisé avec succès"
        ];
        
        header('Location: ' . URL . "albums");
    }


    public function suppressionAlbum($id){

        $nomImage = $this->albumManager->getAlbumById($id)->getImage();
        unlink("public/images/".$nomImage);
        $this->albumManager->suppressionAlbumBd($id);

        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Suppression réalisée avec succès"
        ];

        header('Location: ' . URL . "albums");
    }


    public function modificationAlbum($id){
        $album = $this->albumManager->getAlbumById($id);
        require "views/modif/modifierAlbum.view.php";
    }


    public function modificationAlbumValidation(){
        $imageActuelle = $this->albumManager->getAlbumById($_POST['identifiant'])->getImage();
        $file = $_FILES['image'];

        if($file['size']>0){
            unlink("public/images/".$imageActuelle);
            $repertoire = "public/images/" ;
            $nomImageToAdd =  $this->ajoutImage($file,$repertoire) ; // upload de l'image
        } else{
            $nomImageToAdd = $imageActuelle ;
        }
        $this->albumManager->modificationAlbumBd($_POST['identifiant'],$_POST['artiste'],$_POST['album'], 
        $_POST['tracks'],$_POST['duree'],$_POST['dateSortie'], $_POST['statut'],$nomImageToAdd);
        
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Modification réalisée avec succès"
        ];

        header('Location: ' . URL . "albums");

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