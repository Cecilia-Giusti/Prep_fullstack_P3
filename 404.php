
<?php 
// La session est detruite
session_destroy();
?>


<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Erreur 404</title>
    <meta name="description" content="L'extranet pour les salariés de GBAF">
    <link rel="stylesheet" href="styles.css"/>
  </head>

  <body>       
    <div id="container">  
      <!-- Header  -->
      <?php include("header.php"); ?>

      <!-- Corps  -->
      <section id="error">
        <p>Oups ! La page n'a pas été trouvé.</p>
        <p>Pour retourner à l'accueil, veuillez <a href='connexion.php'>cliquer ici </a></p>
      </section>
          
      <!-- Footer  -->
      <?php include("footer.php"); ?>
    </div>
  </body>
</html>
