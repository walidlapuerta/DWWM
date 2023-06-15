<?php ob_start() ;?>

<div class="login-page">

    <form method="POST" action="<?= URL ?>connexion" enctype="multipart/form-data">
        <h1>Se connecter</h1>
        <div class="social-media">
            <p class="fab fa-google"></p>
            <p class="fab fa-youtube"></p>
            <p class="fab fa-facebook"></p>
            <p class="fab fa-twitter"></p>
        </div>
        <p class="choose-email" >Utiliser mon adresse e-mail</p>

        
        <div class="inputs">
            <input type="email" name="mail" placeholder="Email">
            <input type="password" name="mdp" placeholder="Mot de passe">
        </div>
        <p class="inscription">Je n'ai pas de compte.<a href="<?= URL ?>inscription">Je m'en crée un.</a></p>
        <div align="center">
            <button type="submit" name="envoi">Se connecter</button>
        </div>
    </form>
    </div>


    
    
    <link rel="stylesheet" href="views/css/connexion.css">
    <script src="https://kit.fontawesome.com/d832cb9a1e.js" crossorigin="anonymous"></script>

<?php

$content = ob_get_clean() ;
$titre = "Page de connexion";

require "views/template.php" ;

?>





