<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;charset=utf8;', 'root', '');

if(!$_SESSION['mdp']){
    header('Location: admin.connexion.php');
}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les articles</title>
</head>
<body>
<?php 

$recupArticle = $bdd->query('SELECT * FROM articles');
while($article = $recupArticle->fetch()){
    ?>
<div class="article" style="border: 1px solid black">

    <h1><?= $article['titre']; ?> </h1>

    <p><?= $article['contenu']; ?></p>

    <a href="supprimer-article.php?id=<?= $article['id']; ?>">
    <button style="background-color: red; color: white; margin-bottom: 10px">Supprimer l'article</button>
    </a>

    <a href="modifier-article.php?id=<?= $article['id']; ?>">

    <button style="background-color: orange; color: black; margin-bottom: 10px">Modifier l'article</button>

    </a>

</div>
<br>
    <?php

}

?>
    
</body>
</html>