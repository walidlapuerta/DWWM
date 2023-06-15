<!DOCTYPE html>
<html>

<head>
  <title>L'ARTISAN</title>
  <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/lux/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img class="logo" src="images/logo.png" href="#accueil" alt="" style="height: 50px; width:160px;">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#accueil">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">À Propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
      </ul>
    </div>
  </nav>

  <header class="d-flex align-items-center">
    <div class="container text-center">
      <img src="" alt="tas de baguettes de pain">
      <h2 class="display-3 font-weight-bold">Bienvenue chez l'artisan</h2>
      <p class="display-4 font-italic">BOULANGER - PATISSIER - TRAITEUR</p>
    </div>
  </header>


  <section class="main" id="products">
    <div class="content">

      <div class="card">
        <div class="left">
          <h2>Nos valeurs</h2>
          <p class="font-italic">Nous nous engageons à vous fournir du pain et des pâtisseries de haute qualité. Nos ingrédients sont
            choisis avec soin, privilégiant les producteurs locaux pour vous garantir une saveur authentique.
            Nos boulangers sont passionnés par leur métier et chaque produit reflète cet amour de l'artisanat.
            Venez nous rendre visite, savourez nos délices artisanaux et découvrez la passion qui anime notre famille depuis
            des générations.</p>
        </div>

        <div class="right">
          <img src="images/img2.png" alt="">
        </div>

      </div>



      <div class="card">
        <div class="left">
          <h2>Nos produits</h2>
          <p class="font-italic">Nous sommes fiers de proposer une large gamme de produits préparés sur place avec des ingrédients
            de la plus haute qualité.
            Nos services de traiteur sont pensés pour toutes vos occasions spéciales.
            Mariage, réception d'entreprise ou anniversaire, nous sommes prêts à répondre à vos besoins.
            Chez L'Artisan, nous mettons notre passion et notre savoir-faire au service de vos événements. 
            Venez en apprendre davantage sur nos services de traiteur dès aujourd'hui.</p>
        </div>

        <div class="right">
          <img src="images/pati.png" alt="">
        </div>

      </div>

    </div>


  </section>




  <section id="services" class="bg-light">
    <div class="container">
      <h2 class="text-center mb-4">Nos Services</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body">
              <h3 class="card-title">Boulangerie.</h3>
              <p class="card-text">Vente en magasin de pains, viennoiseries, ainsi que pains spéciaux faits maison.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body">
              <h3 class="card-title">Patisserie.</h3>
              <p class="card-text">Vente de viennoiseries, gâteaux, patisseries orientales et desserts en tous genres.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body">
              <h3 class="card-title">Traiteur.</h3>
              <p class="card-text">Vente d'une énorme variété de repas, sandwiches, cuisines orientales, plateaux et gateaux pour tous
                vos évènements.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="about">
    <div class="container">
      <h2 class="text-center mb-4">À Propos de Nous</h2>
      <p class="text-center">Notre magasin se situe au 413, rue de la République à Saint-Pol-sur-mer. <br>
        Vous pouvez nous contacter via l'espace "contact" de ce site, ainsi que par téléphone au 06 62 83 72 26.</p>
    </div>
  </section>


  <section id="contact" class="bg-light">
    <div class="container">
      <h2 class="text-center mb-4">Contactez-nous</h2>
      <p class="text-center">Utilisez le formulaire ci-dessous pour nous contacter.</p>

      <form action="contact.php" id="contact-form" method="POST" onsubmit="return confirm('Cliquez sur Ok pour confirmer votre message')">

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Nom" name="surname">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Prenom" name="firstname">
        </div>

        <div class="form-group">
          <input type="email" class="form-control" placeholder="Adresse e-mail" name="email">
        </div>

        <div class="form-group">
          <textarea class="form-control" placeholder="Votre message" name="message"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>

      </form>
    </div>
  </section>

  <footer>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/js/bootstrap.min.js"></script>
  <script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
  </script>
</body>

</html>