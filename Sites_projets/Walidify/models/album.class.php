<?php
class Album {
    private $id;
    private $nom;
    private $album;
    private $statut;
    private $duree;
    private $tracks;
    private $dateSortie ;
    private $image ;

     
    public function __construct($id , $nom, $album , $statut , $duree, $tracks, $dateSortie, $image){
        $this->id = $id;
        $this->nom = $nom;
        $this->album = $album;
        $this->statut = $statut;
        $this->duree = $duree;
        $this->tracks = $tracks;
        $this->dateSortie = $dateSortie;
        $this->image = $image;

    }


// Getter & Setter à utiliser dans la page Albums

    public function getId(){return $this->id;}
    public function getNom(){return $this->nom;}
    public function getAlbum(){return $this->album;}
    public function getStatut(){return $this->statut;}
    public function getDuree(){return $this->duree;}
    public function getTracks(){return $this->tracks;}
    public function getDatesortie(){return $this->dateSortie;}
    public function getImage(){return $this->image;}



    public function setNom($nom){$this->nom = $nom;}
    public function setAlbum($album){$this->album = $album;}
    public function setStatut($statut){$this->statut = $statut;}
    public function setDuree($duree){$this->duree = $duree;}
    public function setTracks($tracks){$this->tracks = $tracks;}
    public function setDatesortie($dateSortie){$this->dateSortie = $dateSortie;}
    public function setImage($image){$this->image = $image;}

}

?>