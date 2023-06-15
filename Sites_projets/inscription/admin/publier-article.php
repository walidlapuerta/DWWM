<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;charset=utf8;', 'root', '');

if(!$_SESSION['mdp']){
    header('Location: admin.connexion.php');
}


if(isset($_POST['envoi'])){
    if(!empty($_POST['titre']) AND !empty($_POST['contenu'])){
        $titre = htmlspecialchars($_POST['titre']);
        $contenu = nl2br(htmlspecialchars($_POST['contenu']));

        $insererArticle = $bdd->prepare('INSERT INTO articles(titre, contenu) VALUES(?, ?)');
        $insererArticle->execute(array($titre, $contenu));

        echo "Votre article a bien été envoyé" ;

    }else{
        echo "Veuillez compléter tous les champs" ;
    }
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier un article</title>
</head>
<body>

<form method="POST">
    <input type="text" name="titre">
    <br>
    <textarea name="contenu"></textarea>
    <br>
    <input type="submit" name="envoi">
</form>
    
</body>
</html>