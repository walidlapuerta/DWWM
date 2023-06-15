<?php

require_once "models/artisteManager.class.php" ;

class ArtistesController{

    private $artisteManager ;

    public function __construct(){

    $this->artisteManager = new ArtisteManager() ;
    $this->artisteManager->chargementArtiste();
    }

// Fonction afin d'afficher la liste des artistes dans la page artistes

    public function afficherArtistes(){

        $artistes = $this->artisteManager->getArtistes() ;
        require "views/artiste.view.php" ;
        
    }

// Fonction afin d'afficher un artiste dans une page

    public function afficherArtiste($id){

        $artiste = $this->artisteManager->getArtisteById($id);
        require "views/affichage/afficherArtiste.view.php" ;
     }

// Fonction afin d'ajouter un artiste dans la liste

     public function ajoutArtiste(){
        require "views/ajout/ajoutArtiste.view.php" ;
    }

    public function ajoutArtisteValidation(){
        $file = $_FILES['pics'];
        // echo "<pre>";
        // print_r($file);
        // echo "</pre>";

        $repertoire = "public/images/" ;
        $nomImageAjoute =  $this->ajoutImage($file,$repertoire) ;
      
        $this->artisteManager->ajoutArtisteBd($_POST['nom'],$_POST['age'], $_POST['infos'],$nomImageAjoute);

        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Ajout réalisé avec succès"
        ];

        header('Location: ' . URL . "artistes");
    }


    public function suppressionArtiste($id){

        $nomImage = $this->artisteManager->getArtisteById($id)->getPics();
        unlink("public/images/".$nomImage);
        $this->artisteManager->suppressionArtisteBd($id);

        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Suppression réalisée avec succès"
        ];

        header('Location: ' . URL . "artistes");
    }



    public function modificationArtiste($id){
        $artiste = $this->artisteManager->getArtisteById($id);
        require "views/modif/modifierArtiste.view.php";
    }


    public function modificationArtisteValidation(){
        $imageActuelle = $this->artisteManager->getArtisteById($_POST['identifiant'])->getPics();
        $file = $_FILES['pics'];

        if($file['size']>0){
            unlink("public/images/".$imageActuelle);
            $repertoire = "public/images/" ;
            $nomImageToAdd =  $this->ajoutImage($file,$repertoire) ; // upload de l'image
        } else{
            $nomImageToAdd = $imageActuelle ;
        }
        $this->artisteManager->modificationArtisteBd($_POST['identifiant'],$_POST['nom'],$_POST['age'], $_POST['infos'],$nomImageToAdd);
        
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Modification réalisée avec succès"
        ];

        header('Location: ' . URL . "artistes");

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