<?php
ob_start();

if (!empty($_SESSION['alert'])) :

?>


<div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
        <?= $_SESSION['alert']['msg'] ?>
    </div>
<?php unset($_SESSION['alert']);
endif;
?>


<link rel="stylesheet" href="views/css/card.css">
<link rel="stylesheet" href="views/css/video.css">



<div class="video-background">
    <video autoplay loop muted src="public/images/travisvideo.mp4"></video>
</div>

<div class="content container-fluid my-5">

<!-- Boucle FOR afin d'afficher chaque élément souhaité de l'album grâce aux GETTER & SETTER -->

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php for ($i = 0; $i < count($albums); $i++) { ?>
<div class="col">
    <div class="card custom-card">
        <div class="d-flex justify-content-center">
<img src="public/images/<?= $albums[$i]->getImage(); ?>" class="card-img-top fluid w-50" alt="Image de l'album <?= $albums[$i]->getAlbum(); ?>">
        </div>
    <div class="card-body">
<h5 class="card-title"><a href="<?= URL ?>albums/l/<?= $albums[$i]->getId(); ?>"><?= $albums[$i]->getAlbum(); ?></a></h5>
<p class="card-text"><small class="text-muted">Par <a href="<?= URL ?>artistes/l/<?= $albums[$i]->getId(); ?>"><?= $albums[$i]->getNom(); ?></a></small></p>
<p class="card-text"><?= $albums[$i]->getDatesortie(); ?></p>
<p class="card-text"><?= $albums[$i]->getStatut(); ?></p>
    </div>
                  
    <div class="card-footer d-flex">
<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
<a href="<?= URL ?>albums/m/<?= $albums[$i]->getId(); ?>" class="btn btn-warning">Modifier</a>
<form method="POST" action="<?= URL ?>albums/s/<?= $albums[$i]->getId(); ?>" 
onsubmit="return confirm('Voulez-vous vraiment supprimer cet album ?')">
            <button class="btn btn-danger" type="submit">Supprimer</button>
</form>
 <?php endif; ?>

     </div>
</div>
</div>
        <?php }; ?>
    </div>
</div>

<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
<a href="<?= URL ?>albums/a" class="btn btn-success d-block" style="margin-bottom: 30px;">Ajouter</a>
<?php endif; ?>



<?php

$content = ob_get_clean();
$titre = "Page des albums";

require "template.php";

?>