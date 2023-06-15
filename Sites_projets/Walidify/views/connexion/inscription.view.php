<?php ob_start() ;

?>



<div class="inscription-page">

    <form method="POST" action="<?= URL ?>inscription" enctype="multipart/form-data">
        <h1>S'inscrire</h1>
        <div class="social-media">
            <p class="fab fa-google"></p>
            <p class="fab fa-youtube"></p>
            <p class="fab fa-facebook"></p>
            <p class="fab fa-twitter"></p>
        </div>
        <p class="put-email">Mettre mon adresse e-mail</p>


        <div class="inputs">
            <input type="text" name="pseudo" placeholder="Votre pseudo">
            <input type="email" name="mail" placeholder="Email">
            <input type="password" name="mdp" placeholder="Mot de passe">
        </div>
        <p class="inscription"><a href="<?= URL ?>connexion">J'ai déjà un compte</a></p>
        <div align="center">
            <button type="submit" name="envoi">Se connecter</button>
        </div>
    </form>
</div>

<link rel="stylesheet" href="views/css/inscription.css">
<script src="https://kit.fontawesome.com/d832cb9a1e.js" crossorigin="anonymous"></script>


<?php

$content = ob_get_clean();
$titre = "Page d'inscription";

require "views/template.php";

?>