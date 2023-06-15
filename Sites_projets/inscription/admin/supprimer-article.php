<?php



$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;charset=utf8;', 'root', '');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET['id'];
    $recupArticle = $bdd->prepare('SELECT * FROM articles WHERE id=?');
    $recupArticle->execute(array($getId));
    if($recupArticle->rowCount() > 0){

        $deleteArticle = $bdd->prepare('DELETE FROM articles WHERE id=?');
        $deleteArticle->execute(array($getId));
        header('Location: articles.php');

    }else{
        echo "Aucun article n'a été trouvé";
    }

}else{
    echo "Aucun identifiant n'a été récupéré" ;
}


?>