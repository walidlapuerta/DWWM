<?php
 ob_start()?>


<div class="row">
    <div class="col-6">
        <img src="<?= URL ?>public/images/<?=$playlist->getImages();?>"width="160px;">
    </div>
    <div class="col-6">
<p>Lien : <?= $playlist->getLink(); ?></p>
    </div>
</div>

<?php

$content = ob_get_clean() ;
$titre = $playlist->getPlaylist();

require "views/template.php" ;

?>