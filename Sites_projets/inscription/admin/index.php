<?php

session_start();


if(!$_SESSION['mdp']){
    header('Location: admin.connexion.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <a href="admin.membres.php">Afficher tous les membres</a>
   <a href="publier-article.php">Publier un article</a>
   <a href="articles.php">Afficher tous les articles</a>


</body>
</html>