<?php
ob_start() ?>




<div class="row">
    <div class="col-12 col-sm-6 d-flex justify-content-center">
        <img class="img-fluid mx-auto" src="<?= URL ?>public/images/<?= $album->getImage(); ?>" alt="Album Image">
    </div>

    <div class="col-12 col-sm-6">
        <p>Titre : <?= $album->getAlbum(); ?></p>
        <p>Tracks : <?= $album->getTracks(); ?></p>
        <p>Durée : <?= $album->getDuree(); ?></p>
        <p>Date de sortie : <?= $album->getDatesortie(); ?></p>
    </div>
</div>





<section class="commentaire">

    <div class="comment">

        <p>Partagez votre expérience suite à l'écoute de <?= $album->getAlbum(); ?></p>

        <h2>Commentaires postés par nos utilisateurs :</h2>

        <button class="toggle-comment-form">Ajouter un commentaire</button>

        <?php if (isset($_SESSION['id']) && ($_SESSION['role'] === 'user' || $_SESSION['role'] === 'admin')) : ?>
            <form method="POST">
                <input type="text" name="pseudo" value="<?php echo $_SESSION['pseudo']; ?>" placeholder="Votre nom">
                <br />
                <textarea name="commentaire" placeholder="Votre commentaire..."></textarea>
                <br />
                <input type="submit" value="Poster mon commentaire" name="submit_commentaire">
            </form>
        <?php else : ?>
            <p>Vous devez être connecté pour poster un commentaire. <br /> 
            <a href="<?= URL ?>connexion">Se connecter</a> ou <a href="<?= URL ?>connexion/i">S'inscrire</a>.</p>
        <?php endif; ?>


        <?php if (isset($c_msg)) {
            echo $c_msg;
        } ?>


        <br />


        <?php
        if (isset($commentaires) && is_array($commentaires)) :
            foreach ($commentaires as $c) :
                $dateBdd = $c->getDate();
                $date = date_create_from_format('Y-m-d', $dateBdd);
                $formatDate = date_format($date, 'd/m/Y'); ?>
                <b class="pseudo"><?= $c->getPseudo(); ?></b>
                <span class="date">Date du post : <?= $formatDate; ?></span>
                <p class="commentaire"><?= $c->getCommentaire(); ?></p>
        <?php endforeach;
        endif;
        ?>



    </div>

<style>
.commentaire {
            background-color: #f8f9fa;
            border-radius: 15px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

.comment {
            padding: 20px;
        }

.comment p, .comment h2 {
            color: #333;
        }

.comment .pseudo {
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
        }

.comment .date {
            font-size: 0.8em;
            color: #777;
            margin-bottom: 1em;
        }

.comment .commentaire {
            font-size: 1em;
            color: #333;
            margin-bottom: 2em;
            padding: 1em;
            background-color: #f2f2f2;
            border-radius: 5px;
        }


.comment form {
            display: none;
            margin-top: 20px;
        }

.comment form input[type="text"], .comment form textarea {
            width: 100%;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    
.comment form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

.comment form input[type="submit"]:hover {
            background-color: #0056b3;
        }

.toggle-comment-form {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-bottom: 20px;
        }

.toggle-comment-form:hover {
            background-color: #0056b3;
        }
</style>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggleCommentFormButton = document.querySelector('.toggle-comment-form');
            var commentForm = document.querySelector('.comment form');

            toggleCommentFormButton.addEventListener('click', function() {
                commentForm.style.display = commentForm.style.display === 'none' ? 'block' : 'none';
            });
        });
    </script>




</section>




<?php

$content = ob_get_clean();
$titre = $album->getAlbum();

require "views/template.php";

?>