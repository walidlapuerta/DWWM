<?
ob_start();
?>

ICI la page d'accueil

<?php 
$content = ob_get_clean();
$titre = "Bibliothèque";
require "template.php" ;
?>