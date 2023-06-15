<?php

require_once "Model.class.php";
require_once "artiste.class.php";




// ajout du tableau artistes dans la class Manager

class ArtisteManager extends Model
{

    private $artistes;

    // L'objet de type $artiste est transféré en paramètre de fonction dans le tableau $artistes[] qui est dans la class album (self)
    public function ajoutArtiste($artiste)
    {

        $this->artistes[] = $artiste;
        return $this->artistes;
    }

    public function getArtistes()
    {
        return $this->artistes;
    }



    // Je crée la requête pour récupérer les albums dans ma BDD 
    public function chargementArtiste()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM artiste ORDER BY id ASC");
        $req->execute();
        // fetchAll permet de récupérer toutes les lignes/ FETCH_ASSOC permet d'éviter les doublons\ $mesalbums =/ attribut $albums
        $mesartistes = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();



        // Parcourir le tableau $mesalbums grâce au foreach et récupérer chaque élément
        foreach ($mesartistes as $artiste) {

            $art = new Artiste(
                $artiste["id"],
                $artiste["nom"],
                $artiste["age"],
                $artiste["infos"],
                $artiste["pics"]
            );

            $this->ajoutArtiste($art);
        }
    }


    // Fonction qui permet de récupérer un livre selon l'id 
    public function getArtisteById($id)
    {

        for ($i = 0; $i < count($this->artistes); $i++) {
            if ($this->artistes[$i]->getId() === $id) {
                return $this->artistes[$i];
            }
        }
    }
    
    public function ajoutArtisteBd($nom , $age, $infos, $pics){

        // var_dump($dateSortie, $image); die();

        $req ="INSERT INTO artiste(nom, age, infos, pics)
        values (:nom, :age, :infos, :pics)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nom",$nom, PDO::PARAM_STR);
        $stmt->bindValue(":age",$age, PDO::PARAM_INT);
        $stmt->bindValue(":infos",$infos, PDO::PARAM_STR);
        $stmt->bindValue(":pics",$pics, PDO::PARAM_STR);

        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){

            $artiste = new Artiste($this->getBdd()->lastInsertId(), $nom, $age, $infos, $pics);
            $this->ajoutArtiste($artiste);
        }


    }



    public function suppressionArtisteBd($id){

        $req = "
        Delete from artiste where id = :idArtiste
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idArtiste",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat>0){
            $artiste =$this->getArtisteById($id);
            unset($artiste);
        }

    }


    public function modificationArtisteBd($id,$nom, $age, $infos, $pics){

        $req ="
        update artiste
        set nom = :nom,
        age = :age,
        infos = :infos,
        pics = :pics
        where id = :id";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id",$id, PDO::PARAM_INT);
        $stmt->bindValue(":nom",$nom, PDO::PARAM_STR);
        $stmt->bindValue(":age",$age, PDO::PARAM_INT);
        $stmt->bindValue(":infos",$infos, PDO::PARAM_STR);
        $stmt->bindValue(":pics",$pics, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat>0){
            $this->getArtisteById($id)->setNom($nom);
            $this->getArtisteById($id)->setAge($age);
            $this->getArtisteById($id)->setInfos($infos);
            $this->getArtisteById($id)->setPics($pics);
           
        }
    }



}
