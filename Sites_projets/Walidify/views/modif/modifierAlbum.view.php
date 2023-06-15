<?php ob_start()?>



<form method="POST" action="<?= URL ?>albums/mv" enctype="multipart/form-data">

    <div class="form-group">
        <label for="artiste">Artiste</label>
        <input type="text" class="form-control" id="artiste" name="artiste" value="<?= $album->getNom()?>">
    </div>

    <div class="form-group">
        <label for="album">Titre de l'album</label>
        <input type="text" class="form-control" id="album" name="album" value="<?= $album->getAlbum()?>">
    </div>

    <div class="form-group">
        <label for="tracks">Tracks</label>
        <input type="number" class="form-control" id="tracks" name="tracks" value="<?= $album->getTracks()?>">
    </div>

    <div class="form-group">
        <label for="duree">Durée</label>
        <input type="text" class="form-control" id="duree" name="duree" value="<?= $album->getDuree()?>">
    </div>

    <div class="form-group">
        <label for="dateSortie">Date de sortie</label>
        <input type="date" class="form-control" id="dateSortie" name="dateSortie" value="<?= $album->getDatesortie()?>">
    </div> 

    <div class="form-group">
        <label for="statut">Statut</label>
        <input type="text" class="form-control" id="statut" name="statut" value="<?= $album->getStatut()?>">
    </div>
    <br>
<h3>Cover actuelle : </h3>
<img src="<?= URL ?>public/images/<?= $album->getImage() ?>" width="360px">

    <div class="form-group">
        <label for="image">Changer la cover : </label>
        <input type="file" class="form-control" id="image" name="image">
    </div>

    <input type="hidden" name="identifiant" value="<?= $album->getId(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>

</form>


<?php

$content = ob_get_clean() ;
$titre = "Modification de l'album : ".$album->getId();

require "views/template.php" ;

?>