<?php
class Artiste {
    private $id;
    private $nom;
    private $age;
    private $infos ;
    private $pics ;


    public function __construct($id , $nom , $age, $infos, $pics){
        $this->id = $id;
        $this->nom = $nom;
        $this->age = $age;
        $this->infos = $infos;
        $this->pics = $pics;


    
    }


// Getter & Setter
    public function getId(){return $this->id;}
    public function getNom(){return $this->nom;}
    public function getAge(){return $this->age;}
    public function getInfos(){return $this->infos;}
    public function getPics(){return $this->pics;}



    public function setNom($nom){$this->nom = $nom;}
    public function setAge($age){$this->age = $age;}
    public function setInfos($infos){$this->infos = $infos;}
    public function setPics($pics){$this->pics = $pics;}


}