<?php

// Class Model va permettre de gérer  la connexion à la BDD
abstract class Model{

// Définit l'attribut en static afin qu'il soit accessible par toutes les class qui héritent de la class Model
    private static $pdo;

    private static function setBdd(){

// Définit le chemin afin d'accéder à la BDD
        self::$pdo = new PDO("mysql:host=localhost;dbname=walidify;charset=utf8", "root", "");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }

// Protected = accessible par les class filles mais pas par des algorithmes tiers
    protected function getBdd(){

// Dans cette fonction, je test si j'ai déjà une instance de PDO qui existe/ si mon attribut static PDO est vide ou non
// Si c'est null, il faut que je génére une 1ère connexion
        if(self::$pdo === null){
            self::setBdd();
        }

        return self::$pdo ;

    }

}