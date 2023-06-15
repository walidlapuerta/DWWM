<?php
class Commentaire {
    
    private $id;
    private $pseudo;
    private $commentaire;
    private $date_time_post;
    private $idAlbum;

    public function __construct($id, $pseudo, $commentaire,$date_time_post, $idAlbum) {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->commentaire = $commentaire;
        $this->date_time_post = $date_time_post;
        $this->idAlbum = $idAlbum;

    }

    public function getId(){return $this->id;}
    public function getPseudo(){return $this->pseudo;}
    public function getCommentaire(){return $this->commentaire;}
    public function getDate(){return $this->date_time_post;}
    public function getIdalbum(){return $this->idAlbum;}



    public function setPseudo($pseudo){$this->pseudo = $pseudo;}
    public function setCommentaire($commentaire){$this->commentaire = $commentaire;}
    

}


?>