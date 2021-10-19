<!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <meta name="description" content="L'extranet pour les salariés de GBAF">
    <link rel="stylesheet" href="styles.css"/>
  </head>

  <body>       
    <div id="container">  
      <!-- Header  -->
      <?php include("header.php"); ?>
   
      <!-- Formulaire de connexion   -->
      <section id="formulaireDeConnexion">
        <form action="connexion_post.php" method="post">
          
          <h1> Se connecter</h1>
            <div id="connexion">
              <div class="label">
                <label for="username">Identifiant :</label>
              </div>

              <div class="emplacement">
                <input type="text" id="name" name="username" required />
              </div>

              <div class="label">
                <label for="password">Mot de passe :</label>
              </div>

              <div class="emplacement">
                <input type="password" id="password" name="password" required/>
              </div>

              <div id="motDePasseOublie">
                <i><a href="motDePasse.php">Mot de passe oublié ? </a> </i>
              </div>

              <div class="submit">
                <input type="submit" id='submit' value='Connexion' >
              </div>  

              <div id="inscription">
                <input onclick="window.location.href='inscription.php'" class="inscription" type="button" value="Inscription"/>
              </div>

            </div>
        </form>
      </section> 
      <?php include("footer.php"); ?>
    </div>
  </body>
</html>
