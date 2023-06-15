<?php



ob_start(); ?>

<table class="table text-center">
    <tr class="table-white">
        <th>Image</th>
        <th>titre</th>
        <th>Nombre de pages</th>
        <th colspan="2">Actions</th>
    </tr>

    <?php 
    for ($i = 0 ; $i <count($livres); $i++) { ?>
        <tr>
            <td class="align-middle"><img src="public/images/<?= $livres[$i]->getImage() ?>" width="60px;"></td>
            <td class="align-middle"><a href="<?= URL ?>livres/l/<?= $livres[$i]->getId();?>"><?=$livres[$i]->getTitre()?></td>
            <td class="align-middle"><?= $livres[$i]->getNbPages() ?></td>
            <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle">
            <form method="POST" action="<?= URL ?>livres/s/<?= $livres[$i]->getId();?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le livre ?')">
            <button class="btn btn-danger" type="submit">Supprimer</button></form>
            </td>
            </td>
        </tr>
    <?php } ?>

</table>
<a href="<?= URL ?>livres/a" class="btn btn-success d-block">Ajouter</a>

<?php
$content = ob_get_clean();
$titre = "les livres";
require "template.php";
?>