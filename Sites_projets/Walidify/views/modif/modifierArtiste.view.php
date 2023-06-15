<?php ob_start()?>


<form method="POST" action="<?= URL ?>artistes/mv" enctype="multipart/form-data">

    <div class="form-group">
        <label for="nom">Artiste</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?= $artiste->getNom()?>">
    </div>

    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" id="age" name="age" value="<?= $artiste->getAge()?>">
    </div>

    <div class="form-group">
        <label for="infos">Infos</label>
        <input type="text" class="form-control" id="infos" name="infos" value="<?= $artiste->getInfos()?>">
    </div>

    <h3>Image actuelle : </h3>
    <img src="<?= URL ?>public/images/<?= $artiste->getPics()?>" width="360px">
    <div class="form-group">
        <label for="pics">Changer l'image ?</label>
        <input type="file" class="form-control" id="pics" name="pics">
    </div>

    <input type="hidden" name="identifiant" value="<?= $artiste->getId(); ?>">

    <button type="submit" class="btn btn-primary">Valider</button>

</form>

<?php

$content = ob_get_clean() ;
$titre = "Modification de l'artiste : ". $artiste->getId();

require "views/template.php" ;

?>