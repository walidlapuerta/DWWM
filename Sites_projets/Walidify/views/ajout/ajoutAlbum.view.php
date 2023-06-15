<?php ob_start() ?>


<form method="POST" action="<?= URL ?>albums/av" enctype="multipart/form-data">

    <div class="form-group">
        <label for="artiste">Artiste</label>
        <input type="text" class="form-control" id="artiste" name="artiste">
    </div>

    <div class="form-group">
        <label for="album">Titre de l'album</label>
        <input type="text" class="form-control" id="album" name="album">
    </div>

    <div class="form-group">
        <label for="tracks">Tracks</label>
        <input type="number" class="form-control" id="tracks" name="tracks">
    </div>

    <div class="form-group">
        <label for="duree">Durée</label>
        <input type="text" class="form-control" id="duree" name="duree">
    </div>

    <div class="form-group">
        <label for="dateSortie">Date de sortie</label>
        <input type="date" class="form-control" id="dateSortie" name="dateSortie">
    </div> 

    <div class="form-group">
        <label for="statut">Statut</label>
        <input type="text" class="form-control" id="statut" name="statut">
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Valider</button>

</form>
<?php

$content = ob_get_clean();
$titre = "Ajout d'un album";

require "views/template.php";

?>