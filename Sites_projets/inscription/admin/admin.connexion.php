<?php session_start();

if(isset($_POST['valider'])){

    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){

        $pseudo_par_defaut = "admin";
        $mdp_par_defaut = "admin1234";

        $pseudo_saisie = htmlspecialchars($_POST['pseudo']);
        $mdp_saisie = htmlspecialchars($_POST['mdp']);
        
        if($pseudo_saisie == $pseudo_par_defaut AND  $mdp_saisie == $mdp_par_defaut){

            $_SESSION['mdp'] = $mdp_saisie ;
            header('Location: index.php');

        }else{
            echo "Votre mot de passe ou pseudo est incorrect";
        }

    }else{
        echo "Veuillez compléter tout les champs";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace de connexion admin</title>
</head>

<body>
    <form method="POST" action="" align="center">

        <input type="text" name="pseudo">
        <br />

        <input type="password" name="mdp" autocomplete="off">
        <br /><br />

        <input type="submit" name="valider">
    </form>
</body>

</html>