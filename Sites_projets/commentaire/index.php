<?php

$bdd = new PDO('mysql:host=localhost;dbname=espace_commentaire;charset=utf8;', 'root', '');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $getId = $_GET['id'];
    $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $article->execute(array($getId));
    $article = $article->fetch();



    if(isset($_POST['submit_commentaire'])){
        if(isset($_POST['pseudo'], $_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire']) ){

            $pseudo = htmlspecialchars($_POST['pseudo']);
            $commentaire =  htmlspecialchars($_POST['commentaire']);
            if(strlen($pseudo) < 25){

                $ins = $bdd->prepare('INSERT INTO commentaires (pseudo, commentaire, id_article, date_time_post) VALUES (?,?,?,NOW())');
                $ins->execute(array($pseudo, $commentaire,$getId));
                $c_msg = "Votre commentaire a bien été posté !";


            }else{
                $c_msg = "Erreur : Le pseudo doit faire moins de 25 caractères";
            }

        }else{
            $c_msg = "Erreur : Tous les champs doivent être complétés";
        }
    }

    $commentaires = $bdd->prepare('SELECT * FROM commentaires WHERE id_article = ? ORDER BY id DESC');
    $commentaires->execute(array($getId));


?>


<h2>Article : </h2>

<p><?= $article['contenu'] ?></p>

<br/>

<h2>Commentaire :</h2>

<form method="POST">

<input type="text" name="pseudo" placeholder="Votre pseudo"/>
<br/>

<textarea name="commentaire" placeholder="Votre commentaire..."></textarea>
<br/>
<input type="submit" value="Poster mon commentaire" name="submit_commentaire">
</form>

<?php if(isset($c_msg)){ echo $c_msg;}?>
 
<br/>

<?php while($c = $commentaires->fetch()){?>
    <b><?= $c['pseudo']; ?></b> :  <?= $c['commentaire']?> Date du post : <?= $c['date_time_post'];?><br/>

<?php } ?>


<?php
}

?>