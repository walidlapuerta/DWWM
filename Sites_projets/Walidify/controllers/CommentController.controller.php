<?php

require_once "models/commentaireManager.class.php" ;



class CommentaireController{

    private $commentaireManager;

    public function __construct() {
        $this->commentaireManager = new CommentaireManager();
    }

    public function addCommentaire($idAlbum) { // Ajoutez $idAlbum comme paramètre
        if(isset($_POST['submit_commentaire'])){
if(isset($_POST['pseudo'], $_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire']) ){
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $commentaire =  htmlspecialchars($_POST['commentaire']);
                if(strlen($pseudo) < 25){
                    $this->commentaireManager->addCommentaire($pseudo, $commentaire, $idAlbum);
                    
                    
                    $c_msg = "Votre commentaire a bien été posté !";
                }else{
                    $c_msg = "Erreur : Le pseudo doit faire moins de 25 caractères";
                }
            }else{
                $c_msg = "Erreur : Tous les champs doivent être complétés";
            }
        }
    }
    

    public function getCommentaires($idAlbum) { 
        return $this->commentaireManager->getCommentaires($idAlbum); 
    }
    
    

  


}



?>