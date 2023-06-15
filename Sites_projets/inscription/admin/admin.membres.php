<?php
session_start();


$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;charset=utf8;', 'root', '');


if (!$_SESSION['mdp']) {
    header('Location: admin.connexion.php');
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Afficher les membres</title>
</head>

<body>
    <!--Afficher tous les membres-->
    <?php

    $recupUsers = $bdd->query('SELECT * FROM membres');
    while ($user = $recupUsers->fetch()) {
    ?>
        <p><?= $user['pseudo']; ?><a href="bannir.php?id=<?= $user['id']; ?>" style="color:red; text-decoration: none;"> <br/>Bannir le membre</a></p>
    <?php
    }
    ?>

    <!--Fin d'afficher tous les membres-->

</body>

</html>