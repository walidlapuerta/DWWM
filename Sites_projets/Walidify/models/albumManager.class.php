<?php

// 2.0 Je génére la création des albums en BDD dans la class AlbumManager, qui devient héritière de Model
require_once "Model.class.php";

require_once "album.class.php";


// ajout du tableau albums dans la class Manager

class AlbumManager extends Model{

    private $albums ; 

    public function ajoutAlbum($album){

        $this->albums[] = $album ;
        return $this->albums ;
    }

    public function getAlbums(){
        return $this->albums ;
    }

// Je crée la requête pour récupérer les albums dans ma BDD 
    public function chargementAlbum(){
        $req = $this->getBdd()->prepare("SELECT * FROM albums ORDER BY id ASC");
        $req->execute();
// fetchAll permet de récupérer toutes les lignes/ FETCH_ASSOC permet d'éviter les doublons\ $mesalbums =/ attribut $albums
        $mesalbums = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();


// Parcourir le tableau $mesalbums grâce au foreach et récupérer chaque élément
        foreach($mesalbums as $album){

            $al = new Album($album["id"],$album["nom"],$album["album"],$album["statut"],
            $album["duree"],$album["tracks"],$album["date"],$album["image"]);

            $this->ajoutAlbum($al);
        }
    }

// Fonction qui permet de récupérer un livre selon l'id 
    public function getAlbumById($id){

        for($i=0; $i < count($this->albums); $i++)
        {
            if ($this->albums[$i]->getId() === $id){
                return $this->albums[$i] ;
            }
        }
    }

    public function ajoutAlbumBd($nom, $album, $tracks, $duree, $dateSortie,$statut,$image){

        // var_dump($dateSortie, $image); die();

        $req ="INSERT INTO albums(nom, album,tracks , duree,date, statut,image)
        values (:nom, :album, :tracks ,:duree, :date, :statut, :image)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nom",$nom, PDO::PARAM_STR);
        $stmt->bindValue(":album",$album, PDO::PARAM_STR);
        $stmt->bindValue(":tracks",$tracks, PDO::PARAM_INT);
        $stmt->bindValue(":duree",$duree, PDO::PARAM_STR);
        $stmt->bindValue(":date",$dateSortie);
        $stmt->bindValue(":statut",$statut, PDO::PARAM_STR);
        $stmt->bindValue(":image",$image, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){

            $album = new Album($this->getBdd()->lastInsertId(), $nom, $album, $tracks , $duree, $dateSortie, $statut,$image);
            $this->ajoutAlbum($album);
        }

    }


    public function suppressionAlbumBd($id){

        $req = "
        Delete from albums where id = :idAlbum
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAlbum",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat>0){
            $album =$this->getAlbumById($id);
            unset($album);
        }

    }


    public function modificationAlbumBd($id, $nom, $album, $tracks , $duree, $dateSortie, $statut,$image){

        $req ="
        update albums
        set nom = :nom,
        album = :album,
        tracks = :tracks,
        duree = :duree,
        date = :date,
        statut = :statut,
        image = :image
        where id = :id";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id",$id, PDO::PARAM_INT);
        $stmt->bindValue(":nom",$nom, PDO::PARAM_STR);
        $stmt->bindValue(":album",$album, PDO::PARAM_STR);
        $stmt->bindValue(":tracks",$tracks, PDO::PARAM_INT);
        $stmt->bindValue(":duree",$duree, PDO::PARAM_STR);
        $stmt->bindValue(":date",$dateSortie);
        $stmt->bindValue(":statut",$statut, PDO::PARAM_STR);
        $stmt->bindValue(":image",$image, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat>0){
            $this->getAlbumById($id)->setNom($nom);
            $this->getAlbumById($id)->setAlbum($album);
            $this->getAlbumById($id)->setTracks($tracks);
            $this->getAlbumById($id)->setDuree($duree);
            $this->getAlbumById($id)->setDatesortie($dateSortie);
            $this->getAlbumById($id)->setStatut($statut);
            $this->getAlbumById($id)->setImage($image);   
        }
    }

}