<?php


class User {
    private $mail;
    private $pseudo;
    private $mdp;
    private $id;
    
    private $mail_admin;
    private $pseudo_admin;
    private $mdp_admin;
    private $id_admin;

    public function __construct($mail, $pseudo, $mdp, $id, $mail_admin, $pseudo_admin, $mdp_admin, $id_admin) {
        $this->mail = $mail;
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->id = $id;

        $this->mail_admin = $mail_admin; // Assigner à la propriété correcte
        $this->pseudo_admin = $pseudo_admin; // Assigner à la propriété correcte
        $this->mdp_admin = $mdp_admin; // Assigner à la propriété correcte
        $this->id_admin = $id_admin; // Assigner à la propriété correcte
    }

// users
    public function getId(){return $this->id;}
    public function getMail(){return $this->mail;}
    public function getPseudo(){return $this->pseudo;}
    public function getMdp(){return $this->mdp;}

    public function setMail($mail){$this->mail = $mail;}
    public function setPseudo($pseudo){$this->pseudo = $pseudo;}
    public function setMdp($mdp){$this->mdp = $mdp;}
  
// admin



    public function getIdAdmin(){return $this->id_admin;}
    public function getMailAdmin(){return $this->mail_admin;}
    public function getPseudoAdmin(){return $this->pseudo_admin;}
    public function getMdpAdmin(){return $this->mdp_admin;}


 

    public function setMailAdmin($mail_admin){$this->mail_admin = $mail_admin;}
    public function setPseudoAdmin($pseudo_admin){$this->pseudo_admin = $pseudo_admin;}
    public function setMdpAdmin($mdp_admin){$this->mdp_admin = $mdp_admin;}

    

}


?>