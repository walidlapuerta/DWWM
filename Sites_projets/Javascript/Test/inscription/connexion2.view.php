<?php ob_start()?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <div class="container" id ="container">
        <div class="form-container sign-up-container">
<form action="#">
    <h1>Créer un compte</h1>
    <div class="social-container">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-google-plus-g"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <span>Utiliser un compte G-Mail</span>
    <input type="text" placeholder="Nom">
    <input type="email" placeholder="Email">
    <input type="password" placeholder="Mot de passe">
    <button> Créer le compte</button>
</form>
    </div>       


    <div class="form-container login-container">
        <form action="#">
            <h1>Se connecter</h1>
            <div class="social-container">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>Je n'ai pas de compte</span>
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Mot de passe">
            <button>Créer un compte</button>
        </form>
            </div>       

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat laborum illo rem!</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum culpa soluta maxime!</p>
                    <button class="ghost" id="login">Se connecter</button>
                </div>

                <div class="overlay-panel overlay-right">
                    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat laborum illo rem!</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum culpa soluta maxime!</p>
                    <button class="ghost" id="signUp">Créer un compte</button>
                </div>
            </div>
        </div>
 
    </div>
    
    <script src="script.js"></script>
</body>
</html>


<?php

$content = ob_get_clean() ;
$titre = "Page d'accueil";

require "template.php" ;

?>





