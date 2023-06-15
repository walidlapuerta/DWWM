<?php
require_once "Model.class.php";
require_once "livre.class.php";

class LivreManager extends Model{
    private $livres; //tableau de livres
    public function ajoutLivre($livre){
        $this->livres[] = $livre;
    }

    public function getLivres(){return $this->livres;}
    
    
    public function chargementLivres(){
    
        $req = $this->getBdd()->prepare("SELECT * FROM livres");
        $req->execute();
        $mesLivres = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        
        foreach ($mesLivres as $livre){
            $l = new Livre($livre['id'],$livre['titre'],$livre['nbpage'],$livre['images']);
            $this->ajoutLivre($l);
        }
    }

    public function getLivreByID($id){
        for($i=0; $i<count($this->livres); $i++){
            if($this->livres[$i]->getId() === $id){
                return $this->livres[$i] ;
            }
        }
    }

    public function ajoutLivreBd($titre, $nbPages, $image){
        $req = "
        INSERT INTO livres (titre, nbPage, images)
        values (:titre, :nbPage, :images)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nbPage", $nbPages, PDO::PARAM_INT);
        $stmt->bindValue(":images", $image, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat>0){
            $livre = new Livre($this->getBdd()->lastInsertId(),$titre,$nbPages,$image);
            $this->ajoutLivre($livre);
        }

    }


    public function suppressionLivreBd($id){
        $req = "
        Delete from livres where id = :idLivre
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idLivre", $id,PDO::PARAM_INT);
        $resultat = $stmt ->execute();
        $stmt->closeCursor();

        if($resultat>0){
            $livre = $this->getLivreByID($id);
            unset($livre) ;
        }
    }
}


?>