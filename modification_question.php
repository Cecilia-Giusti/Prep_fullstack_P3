<?php 
  include("middleware.php");
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification de la question secrète</title>
    <meta name="description" content="L'extranet pour les salariés de GBAF">
    <link rel="stylesheet" href="styles.css"/>
  </head>

  <body>       
  <div id="container">  
    <!-- Header  -->
    <?php include("header.php"); ?>
   
    <!-- Modification de la question secrète  -->
    <section id="modificationQuestion">
      <form action="modification_question_post.php" method="post">
            
        <h1> Modifier la question secrète</h1>
        <div id="margeMotDePasse">
          <div class="label">
            <label for="password">Mot de passe :</label>
          </div>
          <div class="emplacement">
            <input type="password" id="password" name="password" required />
          </div>

          <div class="label">
            <label for="question">Nouvelle question secrète :</label>
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

          <div id="modification">
            <input class="modification" type="submit" value="Modifier"/>
          </div>

          <div class="retour">
            <i><a href="parametres.php">Retour </a> </i>
          </div>
        </div>
      </form>  
    </section> 
    <?php include("footer.php"); ?>
  </div>
</body>
</html>

