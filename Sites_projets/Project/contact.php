<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <div class="contactez-nous">
        <h1>Contactez-nous</h1>
        <p>Vous souhaitez contacter votre artisan boulanger au sujet d'une commande ou autre ? N’hésitez pas à utiliser ce formulaire pour prendre contact avec nous !</p>
        <form action="/page-traitement-donnees" method="post">
          <div>
            <label for="nom">Votre nom</label>
            <input type="text" id="nom" name="nom" placeholder="Martin" required>
          </div>
          <div>
            <label for="email">Votre e-mail</label>
            <label for="numero">Votre numéro de téléphone</label>
            <input type="email" id="email" name="email" placeholder="monadresse@mail.com" required>
          </div>
          <div>
            <label for="sujet">Quel est le sujet de votre message ?</label>
            <select name="sujet" id="sujet" required>
                <option value="" disabled selected hidden>Choisissez le sujet de votre message</option>
                <option value="probleme-compte">Demande d'informations</option>
                <option value="question-produit">Question à propos d’un produit</option>
                <option value="suivi-commande">Suivi de ma commande</option>
                <option value="postuler">Postuler chez nous</option>

                <option value="autre">Autre...</option>
             </select>
          </div>
          <div>
            <label for="message">Votre message</label>
            <textarea id="message" name="message" placeholder="Bonjour, je vous contacte car...." required></textarea>
          </div>
          <div>
            <button type="submit">Envoyer mon message</button>
          </div>
        </form>
      </div>
</body>
</html>