<?php

require_once "models/LivreManager.class.php";


class LivreController{

    private $livremanager ;


    public function __construct()
    {
        $this->livremanager = new LivreManager;
        $this->livremanager->chargementLivres();
    }

    public function AfficherLivres(){

    $livres = $this->livremanager->getLivres();

        require "views/livres.view.php" ;
    }

    public function afficherLivre($id){
       $livre = $this->livremanager->getLivreByID($id);
       require "views/afficherLivre.view.php" ;
    }

    public function ajoutLivre(){
        require "views/ajoutLivre.views.php" ;
     }


     public function ajoutLivreValidation(){
        $file = $_FILES["image"];
        $repertoire = "public/images/";
        $nomImagesAjoute = $this->ajoutImage($file,$repertoire);
        $this->livremanager->ajoutLivreBd($_POST["titre"],$_POST["nbPages"], $nomImagesAjoute);
        header("Location:" . URL . "livres");
     }

     private function ajoutImage($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");

        if(!file_exists($dir)) mkdir($dir,0777);

        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $targetfile = $dir.$random."".$file['name'];

        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($targetfile))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $targetfile))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."".$file['name']);
    }

    public function suppressionLivre($id){
        
        $nomImage = $this->livremanager->getLivreByID($id)->getImage();
        unlink("public/images/".$nomImage);
        $this->livremanager->suppressionLivreBd((int)$id);
        header ('Location: ' . URL . "livres");
    }


    

}
