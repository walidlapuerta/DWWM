<?php

require_once "Model.class.php";
require_once "commentaire.class.php";

class CommentaireManager extends Model {



    public function getCommentaires($idAlbum){

        $commentaires = $this->getBdd()->prepare('SELECT * FROM commentaires WHERE idAlbum = ? ORDER BY id DESC');
        $commentaires->execute(array($idAlbum));

        $commentaireObjects = [];
        while ($commentaireData = $commentaires->fetch()) {
            $commentaireObjects[] = new Commentaire(
                $commentaireData['id'],
                $commentaireData['pseudo'],
                $commentaireData['commentaire'],
                $commentaireData['date_time_post'],
                $commentaireData['idAlbum']
            );
        }
        return $commentaireObjects;
    }

    public function addCommentaire($pseudo, $commentaire, $idAlbum) {
        $ins = $this->getBdd()->prepare('INSERT INTO commentaires (pseudo, commentaire, date_time_post,idAlbum) VALUES (?,?,NOW(),?)');
        $ins->execute(array($pseudo, $commentaire,$idAlbum));
    }
}



?>