<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
  <link rel="stylesheet" href="views/css/template.css">


  <title>Walidify</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= URL ?>accueil">Walidify</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" 
      aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarColor02">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= URL ?>artistes">Artistes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URL ?>albums">Albums</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URL ?>playlists">Playlists</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URL ?>news">Actualités</a>
          </li>
          <?php if (!isset($_SESSION['role'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= URL ?>connexion">Connexion/Inscription</a>
            </li>
          <?php endif; ?>
          <?php if (isset($_SESSION['role'])) : ?>
            <li class="nav-item">
              <a href="<?= URL ?>deconnexion" class="btn btn-deco">Se déconnecter</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container">



    <h1 class="rounded border border-dark p-2 m-2 text-center texte-dark bg-danger"><?= $titre ?></h1>
    <?= $content ?>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>

</html>