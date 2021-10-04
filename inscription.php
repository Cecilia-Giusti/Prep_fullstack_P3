<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscritpion extranet GBAF</title>
    <meta name="description" content="L'extranet pour les salariés de GBAF">
    <link rel="stylesheet" href="styles.css"/>
  </head>

<body>     
  <div id="container">  
    <!-- Header  -->
      <header>
        <nav>
          <!-- Logo-->
          <div id="logo_GBAF">
            <img src="images_web/logo_fonbblanc.png" alt="Logo GBAF" />
          </div>

          <!-- Nom & prénom s'il y a connexion-->

          <!--Deconnexion s'il y a connexion -->

        </nav>
      </header>
   
    <!-- Formulaire d'inscription   -->
      <section id="formulaireDinscription">
          <form action="inscription_post.php" method="post">
            
            <h1> Inscription</h1>
              <div id="margeinscription">
                
                <div class="label">
                  <label for="name">Nom :</label>
                </div>
                <div class="emplacement">
                  <input type="text" id="name" name="name" required />
                </div>

                <div class="label">
                  <label for="firstname">Prénom :</label>
                </div>
                <div class="emplacement">
                  <input type="text" id="prenom" name="firstname" required />
                </div>

                <div class="label">
                  <label for="username">Identifiant :</label>
                </div>
                <div class="emplacement">
                  <input type="text" id="userName" name="username" required />
                </div>

                <div class="label">
                  <label for="password">Mot de passe :</label>
                </div>
                <div class="emplacement">
                  <input type="password" id="password" name="password" required/>
                </div>

                <div id="messageInscription">
                <p><i>Si vous oubliez votre mot de passe, vous pourrez saisir votre
                  UserName et répondre à la question secrète pour en créer un nouveau</i></p>
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

                <div id="inscription">
                  <input class="inscription" type="submit" value="Inscription"/>
                </div>

              </div>
          </form>
        <div id="retourConnexion">
          <i><a href="connexion.html">J'ai déjà un compte ? Je me connecte</a></i>
        </div>
      </section> 


   
      <footer>
        <div id="menuFooter">
          <ul>
            <Li>|<a href="mentionslegales.html"> Mentions Légales </a>|</Li>
            <li><a href="contact.html">Contact </a>|</li>
          </ul>
        </div>
      </footer>
  </div>



  


  <?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>



</body>
</html>
