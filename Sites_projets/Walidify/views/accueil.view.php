<?php ob_start();

if (!empty($_SESSION['alert'])) :


?>

    <div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
        <?= $_SESSION['alert']['msg'] ?>
    </div>
<?php unset($_SESSION['alert']);
endif;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/css/accueil.css">
    <link rel="stylesheet" href="views/css/video.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Accueil</title>
</head>

<body>

    <h1 class="text-center fw-bold display-1 mb-5">Bienvenue sur <span class="text-danger">WALIDIFY</span></h1>

    <div class="video-background">
        <video autoplay loop muted src="public/images/Jumbotron.mp4"></video>
    </div>
    <div class="message">
        <p>
            Bienvenue sur Walidify, votre escale incontournable dans le monde passionnant du Rap et du RnB. À travers notre plateforme, 
            nous vous invitons à un voyage rythmé par les beats percutants et les mélodies captivantes qui façonnent l'essence de ces genres musicaux.
            <br>
            <br>
            Walidify n'est pas qu'un simple site, c'est une expérience immersive qui vous plonge au cœur de l'actualité du Rap et du RnB. 
            Que vous soyez un aficionado de la première heure ou un novice curieux, notre contenu riche et varié saura vous captiver.
            <br>
            <br>
            Des icônes légendaires du Hip-Hop aux étoiles montantes du RnB, en passant par les dernières tendances et les analyses perspicaces, 
            Walidify est votre guide pour naviguer dans l'univers fascinant de ces genres qui ont révolutionné la scène musicale mondiale.
            <br>
            <br>
            Bien plus qu'un site, Walidify est un pont entre vous et la musique qui définit notre époque. 
            Rejoignez-nous dans cette aventure et laissez-vous porter par le courant des rythmes et des rimes qui façonnent le paysage du Rap et du RnB.
        </p>
    </div>


    <script>
        $(document).ready(function() {
            let paragraphs = $('.message p').html().split('<br><br>');
            $('.message p').remove();

            $.each(paragraphs, function(i, paragraph) {
                let newParagraph = $('<p>').html(paragraph).css({
                    opacity: 0,
                    position: 'relative',
                    left: '-100px'
                });

                $('.message').append(newParagraph);

                setTimeout(function() {
                    newParagraph.animate({
                        opacity: 1,
                        left: 0
                    }, 3000);
                }, 3000 * i);
            });
        });
    </script>

</body>

</html>

<?php

$content = ob_get_clean();
$titre = "Page d'accueil";

require "template.php";


?>