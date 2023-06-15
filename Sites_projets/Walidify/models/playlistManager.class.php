<?php
require_once "Model.class.php";
require_once "playlist.class.php";

// ajout du tableau artistes dans la class Manager

class PlaylistManager extends Model
{

    private $playlists;

    // L'objet de type $artiste est transféré en paramètre de fonction dans le tableau $artistes[] qui est dans la class album (self)
    public function ajoutPlaylist($playlist)
    {

        $this->playlists[] = $playlist;
        return $this->playlists;
    }

    public function getPlaylists()
    {
        return $this->playlists;
    }


    // Je crée la requête pour récupérer les albums dans ma BDD 
    public function chargementPlaylist()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM playlists ORDER BY id ASC");
        $req->execute();
        // fetchAll permet de récupérer toutes les lignes/ FETCH_ASSOC permet d'éviter les doublons\ $mesalbums =/ attribut $albums
        $mesplaylist = $req->fetchAll(PDO::FETCH_ASSOC);




        // Parcourir le tableau $mesalbums grâce au foreach et récupérer chaque élément
        foreach ($mesplaylist as $playlist) {

            $play = new Playlist(

                $playlist["id"],
                $playlist["playlist"],
                $playlist["link"],
                $playlist["images"],

            );

            $this->ajoutPlaylist($play);
        }
        $req->closeCursor();
    }


    // Fonction qui permet de récupérer un livre selon l'id 
    public function getPlaylistById($id)
    {

        for ($i = 0; $i < count($this->playlists); $i++) {
            if ($this->playlists[$i]->getId() === $id) {
                return $this->playlists[$i];
            }
        }
    }


    // Fonction afin d'ajouter le nouvel élément dans la BDD

    public function ajoutPlaylistBd($playlist, $images, $link)
    {

        // var_dump($dateSortie, $image); die();

        $req = "INSERT INTO playlists(playlist, link, images)
    values (:playlist, :link, :images)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":playlist", $playlist, PDO::PARAM_STR);
        $stmt->bindValue(":link", $link, PDO::PARAM_STR);
        $stmt->bindValue(":images", $images, PDO::PARAM_STR);


        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {

            $playlist = new Playlist($this->getBdd()->lastInsertId(), $playlist, $images, $link);
            $this->ajoutPlaylist($playlist);

        }
    }


    public function suppressionPlaylistBd($id){

        $req = "
        Delete from playlists where id = :idPlaylist
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idPlaylist",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat>0){
            $playlist =$this->getPlaylistById($id);
            unset($playlist);
        }

    }
    

    public function modificationPlaylistBd($id,$playlist, $link, $images){

        $req ="
        UPDATE playlists
        set playlist = :playlist, link = :link, images = :images
        where id = :id";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id",$id, PDO::PARAM_INT);
        $stmt->bindValue(":playlist",$playlist, PDO::PARAM_STR);
        $stmt->bindValue(":link",$link, PDO::PARAM_STR);
        $stmt->bindValue(":images",$images, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        // echo 'Error occurred:'.implode(":",$this->$req->errorInfo());


        if($resultat>0){
            $this->getPlaylistById($id)->setPlaylist($playlist);
            $this->getPlaylistById($id)->setLink($link);
            $this->getPlaylistById($id)->setImages($images);

        } 
    }
}
