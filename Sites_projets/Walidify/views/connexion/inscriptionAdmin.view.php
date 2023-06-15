<?php ob_start() ;?>





<div class="login-page">

<form method="POST" action="" align="center">

<input type="text" name="pseudo_admin">
<br />


<input type="text" name="mail_admin">
<br />

<input type="password" name="mdp_admin" autocomplete="off">
<br /><br />

<input type="submit" name="valider_admin">
</form>

</div>

    <script src="https://kit.fontawesome.com/d832cb9a1e.js" crossorigin="anonymous"></script>


<?php

$content = ob_get_clean() ;
$titre = "Page d'inscription admin";

require "views/template.php" ;

?>





