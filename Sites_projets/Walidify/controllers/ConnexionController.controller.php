<?php

require_once "models/connexionManager.class.php" ;
class ConnexionController {
    // Instance de UserModel
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function AfficherPageConnexion() {
        if (isset($_POST['envoi'])) {
            if (!empty($_POST['mail']) and !empty($_POST['mdp'])) {
                $mail = htmlspecialchars($_POST['mail']);
                $mdp = sha1($_POST['mdp']);
                $user = $this->userModel->getUser($mail, $mdp);

                if ($user) {
                    $_SESSION['role'] = 'user';
                    $_SESSION['mail'] = $mail;
                    $_SESSION['mdp'] = $mdp;
                    $_SESSION['id'] = $user->getId();
                    $_SESSION['pseudo'] = $user->getPseudo();
                    $_SESSION['alert'] = [
                        "type" => "success",
                        "msg" => "Connexion réalisée avec succès"
                    ];
            
                    header('Location: ' . URL . "accueil");

                } else {
                    echo "Votre mot de passe ou pseudo est incorrect";
                }
            } else {
                echo "Veuillez compléter tous les champs";
            }
        }
        require "views/connexion/connexion.view.php";
    }

    public function AfficherPageInscription() {
        if (isset($_POST['envoi'])) {
            if (!empty($_POST['pseudo']) and !empty($_POST['mdp']) and !empty($_POST['mail'])) {
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $mail = htmlspecialchars($_POST['mail']);
                $mdp = sha1($_POST['mdp']);
                $id = $this->userModel->insertUser($pseudo, $mail, $mdp);
            
            $_SESSION['id'] = $id;
            $_SESSION['role'] = 'user';
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mail'] = $mail;
            $_SESSION['mdp'] = $mdp;
            


                $_SESSION['alert'] = [
                    "type" => "success",
                    "msg" => "Inscription réalisée avec succès"
                ];
        
                header('Location: ' . URL . "accueil");
            } else {
                echo "Veuillez compléter tous les champs";
            }
        }
        require "views/connexion/inscription.view.php";
    }

    public function AfficherPageConnexionAdmin() {
        if (isset($_POST['valider_admin'])) {
            if (!empty($_POST['mail_admin']) && !empty($_POST['mdp_admin'])) {
                $mail = htmlspecialchars($_POST['mail_admin']);
                $mdp = sha1($_POST['mdp_admin']);
                $admin = $this->userModel->getAdmin($mail, $mdp);
                if ($admin) {
                    $_SESSION['role'] = 'admin';
                    $_SESSION['mail_admin'] = $mail;
                    $_SESSION['mdp_admin'] = $mdp;
                    $_SESSION['pseudo_admin'] = $admin->getPseudoAdmin();
                    $_SESSION['alert'] = [
                        "type" => "success",
                        "msg" => "Connexion admin réalisée avec succès"
                    ];
            
                    header('Location: ' . URL . "accueil");
                } else {
                    echo "Mot de passe incorrect pour l'administrateur.";
                }
            } else {
                echo "Veuillez compléter tous les champs.";
            }
        }
        require "views/connexion/connexionAdmin.view.php";
    }

    public function AfficherPageInscriptionAdmin() {
        if (isset($_POST['valider_admin'])) {
            if (!empty($_POST['pseudo_admin']) and !empty($_POST['mdp_admin']) and !empty($_POST['mail_admin'])) {
                $pseudo = htmlspecialchars($_POST['pseudo_admin']);
                $mail = htmlspecialchars($_POST['mail_admin']);
                $mdp = sha1($_POST['mdp_admin']);
                $this->userModel->insertAdmin($pseudo, $mail, $mdp);
                $_SESSION['alert'] = [
                    "type" => "success",
                    "msg" => "Inscription admin réalisée avec succès"
                ];
        
                header('Location: ' . URL . "accueil");
            } else {
                echo "Veuillez compléter tous les champs";
            }
        }
        require "views/connexion/inscriptionAdmin.view.php";
    }

    public function deconnexion() {
        $_SESSION = array();
        session_destroy();
        header("Location: index.php");
    }
}

