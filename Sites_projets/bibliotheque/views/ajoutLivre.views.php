<?
ob_start();
?>
<form method="POST" action="<?= URL ?>livres/av" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre" class="form-label">Titre :</label>
        <input type="text" class="form-control" id="Titre" name="titre">
    </div>
    <div class="form-group">
        <label for="nbPages" class="form-label">Nombre de pages :</label>
        <input type="number" class="form-control" id="nbPages" name="nbPages">
    </div>

    <div class="mb-3 form-group">
        <label for="image">Image</label>
        <input class="form-control-file" type="file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php 
$content = ob_get_clean();
$titre = "Ajout d'un livre";
require "template.php" ;
?>