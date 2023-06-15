<?php ob_start() ?>


<form method="POST" action="<?= URL ?>playlists/mv" enctype="multipart/form-data">
<input type="hidden" name="identifiant" value="<?= $playlist->getId(); ?>">

    <div class="form-group">
        <label for="playlist"> nom de la playlist</label>
        <input type="text" class="form-control" id="playlist" name="playlist" value="<?= $playlist->getPlaylist()?>">
    </div>

    <div class="form-group">
        <label for="link">Lien</label>
        <input type="text" class="form-control" id="link" name="link" value="<?=$playlist->getLink()?>">
    </div>

    <h3>Image actuelle : </h3>

    <img src="<?= URL ?>public/images/<?= $playlist->getImages()?>" width="360px">

    <div class="form-group">
        <label for="images">Changer l'image ?</label>
        <input type="file" class="form-control" id="images" name="images">
    </div>


    <button type="submit" class="btn btn-primary">Valider</button>

</form>
<?php

$content = ob_get_clean();
$titre = "Modification d'une playlist : " .$playlist->getId();

require "views/template.php";

?>