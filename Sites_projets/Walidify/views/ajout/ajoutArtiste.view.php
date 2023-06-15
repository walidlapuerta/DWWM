<?php ob_start() ?>


<form method="POST" action="<?= URL ?>artistes/av" enctype="multipart/form-data">

    <div class="form-group">
        <label for="nom">Artiste</label>
        <input type="text" class="form-control" id="nom" name="nom">
    </div>

    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" id="age" name="age">
    </div>

    <div class="form-group">
        <label for="infos">Infos</label>
        <input type="text" class="form-control" id="infos" name="infos">
    </div>

    
    <div class="form-group">
        <label for="pics">Image</label>
        <input type="file" class="form-control" id="pics" name="pics">
    </div>

    <button type="submit" class="btn btn-primary">Valider</button>

</form>
<?php

$content = ob_get_clean();
$titre = "Ajout d'un artiste";

require "views/template.php";

?>