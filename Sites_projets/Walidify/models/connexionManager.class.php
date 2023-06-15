<?php

require_once "Model.class.php";
require_once "connexion.class.php";

class UserModel extends Model
{
    // Méthodes pour les utilisateurs
    public function insertUser($pseudo,$mail,$mdp)
    {
        $insertUser = $this->getBdd()->prepare('INSERT INTO users(pseudo, mail, mdp)VALUES(?, ?, ?)');
        $insertUser->execute(array($pseudo, $mail, $mdp));
        return $this->getBdd()->lastInsertId();
    }

    public function getUser($mail, $mdp)
    {
        $recupUser = $this->getBdd()->prepare('SELECT * FROM users WHERE mail = ? AND mdp = ?');
        $recupUser->execute(array($mail, $mdp));

        $userData = $recupUser->fetch(PDO::FETCH_ASSOC);
    return $userData ? new User($userData['mail'], $userData['pseudo'], $userData['mdp'], $userData['id'],
     null, null, null, null) : null;

    }

    // Méthodes pour les administrateurs
    public function insertAdmin($pseudo_admin,$mail_admin,$mdp_admin)
    {
        $insertAdmin = $this->getBdd()->prepare('INSERT INTO admin(pseudo_admin, mail_admin, mdp_admin)VALUES(?, ?, ?)');
        return $insertAdmin->execute(array($pseudo_admin,$mail_admin,$mdp_admin));
    }

    public function getAdmin($mail_admin, $mdp_admin)
    {
        $recupAdmin = $this->getBdd()->prepare('SELECT * FROM admin WHERE mail_admin = ? AND mdp_admin = ?');
        $recupAdmin->execute(array($mail_admin, $mdp_admin));

        $adminData = $recupAdmin->fetch(PDO::FETCH_ASSOC);
    return $adminData ? new User(null, null, null, null, $adminData['mail_admin'], $adminData['pseudo_admin'], $adminData['mdp_admin'], $adminData['id_admin']) : null;

    }

}




?>