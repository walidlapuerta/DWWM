<?php


// require_once "artisteManager.class.php";
// require_once "artiste.class.php";


ob_start()?>


<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    <?php for($i=0; $i<count($artistes); $i++) { ?>
    <div class="col mb-4">
        <div class="card custom-card">
        <div class="d-flex justify-content-center">
            <img src="public/images/<?= $artistes[$i]->getPics(); ?>" class="card-img-top fluid w-50" alt="<?= $artistes[$i]->getNom(); ?>">
            </div>
            
            <div class="card-body">
                <h5 class="card-title"><?= $artistes[$i]->getNom(); ?></h5>
                <p class="card-text"><?= $artistes[$i]->getAge(); ?></p>
                <p class="card-text"><?= $artistes[$i]->getInfos(); ?></p>
                <div class="d-flex justify-content-between">
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                    <a href="<?= URL ?>artistes/m/<?= $artistes[$i]->getId(); ?>" class="btn btn-warning">Modifier</a>
                    <form method="POST" action="<?= URL ?>artistes/s/<?= $artistes[$i]->getId(); ?>" onsubmit="return confirm('Voulez-vous vraiment supprimer cet artiste ?')">
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>


<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
<?php endif; ?>

<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
<a href="<?= URL ?>artistes/a" class="btn btn-success d-block">Ajouter</a>
<?php endif; ?>

<link rel="stylesheet" href="views/css/card.css">




<?php

$content = ob_get_clean() ;
$titre = "Page des artistes";
require "template.php" ;

?>