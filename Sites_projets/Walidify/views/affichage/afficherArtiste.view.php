<?php
 ob_start()?>

<div class="row">
    <div class="col-6 ">
        <img src="<?= URL ?>public/images/<?=$artiste->getPics();?>"width="160px;">
    </div>
    <div class="col-6">
<p>Age : <?= $artiste->getAge(); ?></p>
<p>Infos : <?= $artiste->getInfos(); ?></p>


    </div>
</div>


<?php

$content = ob_get_clean() ;
$titre = $artiste->getNom();

require "views/template.php" ;

?>