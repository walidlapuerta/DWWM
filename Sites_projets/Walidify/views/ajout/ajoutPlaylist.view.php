<?php ob_start() ?>


<form method="POST" action="<?= URL ?>playlists/av" enctype="multipart/form-data">

    <div class="form-group">
        <label for="playlist"> nom de la playlist</label>
        <input type="text" class="form-control" id="playlist" name="playlist">
    </div>

    <div class="form-group">
        <label for="link">Lien</label>
        <input type="text" class="form-control" id="link" name="link">
    </div>


    <div class="form-group">
        <label for="images">Image</label>
        <input type="file" class="form-control" id="images" name="images">
    </div>

    <button type="submit" class="btn btn-primary">Valider</button>

</form>
<?php

$content = ob_get_clean();
$titre = "Ajout d'une playlist";

require "views/template.php";

?>