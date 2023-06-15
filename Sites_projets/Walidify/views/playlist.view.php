<?php ob_start()?>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    <?php foreach ($playlists as $playlist) { ?>
        <div class="col">
            <div class="card custom-card h-100">
        <div class="d-flex justify-content-center">
             <img src="public/images/<?= $playlist->getImages(); ?>" class="card-img-top fluid w-50" alt="Image de la playlist">
                </div>
                <div class="card-body">
                    <h5 class="card-title"> <a href="<?= URL ?>playlists/l/<?= $playlist->getId(); ?>"><?= $playlist->getPlaylist(); ?></a></h5>
                    <p class="card-text"><?= $playlist->getLink(); ?></p>
                </div>
                <div class="card-footer">
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                   
                    <a href="<?= URL ?>playlists/m/<?= $playlist->getId(); ?>" class="btn btn-warning">Modifier</a>
                    <form method="POST" action="<?= URL ?>playlists/s/<?= $playlist->getId(); ?>" onsubmit="return confirm('Voulez-vous vraiment supprimer cette playlist ?')">
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                <?php endif; ?>

                </div>

            </div>
        </div>
    <?php } ?>
</div>


<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
<a href="<?= URL ?>playlists/a" class="btn btn-success d-block">Ajouter</a>
<?php endif; ?>

<link rel="stylesheet" href="views/css/card.css">


<?php
;
$content = ob_get_clean() ;
$titre = "Page des playlists";

require "template.php" ;

?>