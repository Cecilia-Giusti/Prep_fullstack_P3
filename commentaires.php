<?php
  // On démarre la session AVANT d'écrire du code HTML
  session_start();
  

  // Connexion à la base de données
  try
  {
    
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }


  if (isset($_SESSION['id'])){
  

    // Vérification des données

    
?>


<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paramètre extranet GBAF</title>
    <meta name="description" content="L'extranet pour les salariés de GBAF">
    <link rel="stylesheet" href="styles.css"/>
  </head>

  <body>       
  <div id="container">  
    <!-- Header  -->
    <?php include("header.php"); ?>

      <!-- Formulaire de commentaire   -->
      <section id="formulaireDinscription">
        <form action="commentaires_post.php" method="post">
          <h1> Ajouter un commentaire</h1>
            <div id="margeinscription">

              <div class="label">
                <label for="post">Votre message :</label>
              </div>
              
              <div class="emplacement">
                <textarea id="message" name="message" required rows="8" cols="35">
                </textarea>
              </div>

              <div id="inscription">
                <input class="inscription" type="submit" value="Envoyer"/>
              </div>
              <div class="Retour">
                <i><a href="partenaires.php">Retour </a> </i>
              </div>
            </div>
        </form>
      </section> 
    <?php include("footer.php"); ?>
  </div>
</body>
</html>

<?php
}
else {
  // Redirection
      header('Location: connexion.php');
}

?>