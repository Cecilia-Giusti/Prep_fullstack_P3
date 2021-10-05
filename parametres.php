
<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
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
    <?php include("header.php");?>
   
      <!-- Paramètre du compte  -->
      <section id="formulaireDinscription">
        <form action="parametres_post.php" method="post">
            
          <h1> Paramètre du compte</h1>
          <div id="margeinscription">

            <!--Insertion d'une condition pour changer que les données changées en php-->
            <div class="label">
              <label for="name">Nom :</label>
            </div>
            <div class="emplacement"> <!-- Ajouter le php pour retrouver le nom initial-->
              <input type="text" id="name" name="name" value="<?php echo (ucwords($_SESSION['name']));?>" onFocus="this.value=''" />
            </div>

            <div class="label">
              <label for="firstname">Prénom :</label>
            </div>
            <div class="emplacement"><!-- Ajouter le php pour retrouver le prénom initial-->
              <input type="text" id="prenom" name="firstname" value="<?php echo (ucwords($_SESSION['firstname']));?>" onFocus="this.value=''" />
            </div>

            <div class="label">
              <label for="username">Identifiant :</label>
            </div>
            <div class="emplacement"><!-- Ajouter le php pour retrouver l'username initial-->
              <input type="text" id="userName" name="username" value="<?php echo $_SESSION['username'];?>" onFocus="this.value=''" />
            </div>

            <div class="label">
              <label for="password">Mot de passe :<p class="messageParametres"><i>Veuillez renseigner ce champ pour autoriser toutes modifications</i></p></label>
            </div>
            <div class="emplacement">
              <input type="password" id="password" name="password" required/>
            </div>

            <div id="modification">
              <input class="modifier" type="submit" value="Modifier"/>
            </div>

            <div class="motDePasseOublie">
              <i><a href="modification_mdp.php">Changer de mot de passe </a> </i>
            </div>
            <div class="motDePasseOublie">
              <i><a href="modification_question.php">Changer de question secrète </a> </i>
            </div>
            <div class="Retour">
              <i><a href="index.php">Retour </a> </i>
            </div>

          </div>
        </form>
      </section> 

    <?php include("footer.php"); ?>


  </div>

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
   
</body>

</html>
