<?php
    // Connexion à la base de données
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
  catch (Exception $e)
  {
      die('Erreur : ' . $e->getMessage());
  }
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mot de passe oublié</title>
    <meta name="description" content="L'extranet pour les salariés de GBAF">
    <link rel="stylesheet" href="styles.css"/>
  </head>

<body>     
  <div id="container">  
    <?php include("header.php"); ?>
   
      <!-- Paramètre du compte  -->
      <section id="formulaireMotDePasse">
          <form action="motDePasse_post.php" method="post">
            
            <h1> Mot de passe oublié</h1>
            <div id="margeMotDePasse">

              <div class="label">
                <label for="username">Identifiant :</label>
              </div>
              <div class="emplacement">
                <input type="text" id="userName" name="username"  />
              </div>

              <div class="label">
                <label for="question">Question secrète :</label>
              </div>
              <div class="emplacement">
                <input type="text" id="question" name="question" required />
              </div>

              <div class="label">
                <label for="answer">Réponse :</label>
              </div>
              <div class="emplacement">
                <input type="text" id="reponse" name="answer" required />
              </div>

              <div class="label">
                <label for="password"> Nouveau mot de passe :</label>
              </div>
              <div class="emplacement">
                <input type="password" id="password" name="password" required/>
              </div>

              <div class="label">
                <label for="okpassword">Confirmer mot de passe :</label>
              </div>  
              <div class="emplacement">
                <input type="password" id="password" name="okpassword" required/>
              </div>

              <div id="modification">
                <input class="modification" type="submit" value="Modifier"/>
              </div>

              <div class="Retour">
                <i><a href="connexion.php">Retour </a> </i>
              </div>

            </div>
        </form>
      </section> 

    <?php include("footer.php"); ?>
  </div>
</body>
</html>
