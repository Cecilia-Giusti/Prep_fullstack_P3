<?php
  // On démarre la session AVANT d'écrire du code HTML
  session_start();
  include("fonctions.php"); 
  actualiser_session();

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

  // Données de la base de données
  $req = $bdd->prepare('SELECT * FROM actors WHERE id = :id');
  $req->execute(array(
      'id' => $_GET['id'] 
      ));
  $resultat = $req->fetch();
  
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Partenaires et acteurs de la GBAF</title>
    <meta name="description" content="L'extranet pour les salariés de GBAF">
    <link rel="stylesheet" href="styles.css"/>
  </head>

 <body>       
  <div id="container">  
       <!-- Header  -->
    <?php include("header.php"); ?>
   
   <!-- Section   -->
   <section id="acteurPartenaire">
    <img src="<?php echo(htmlspecialchars($resultat['logo']));?>" alt="Logo"/>
    <h2><?php echo(htmlspecialchars($resultat['actor']));?></h2>
    <p><?php echo(htmlspecialchars($resultat['description']));?>
    </p>
   </section> 

  <section id="commentaire">
    <div id="menuCommentaire">
      <p>XX commentaires </p>
      <input onclick="window.location.href='index.html'" class="boutonCommentaire" type="button" value="Commenter"/>
      
      <div class="like"><a  href="like.php"><img src="images_web/like.png" alt="Like"/>  X</a></div>
      <div class="like"><a href="like.php">X   <img src="images_web/dislike.png" alt="dislike"/> </a></div>
    </div>

    <article>
      <p>Prénom :</p>
      <p>Date :</p>
      <p>Texte :</p>
    </article>

    <article>
      <p>Prénom :</p>
      <p>Date :</p>
      <p>Texte :</p>
    </article>

    <article>
      <p>Prénom :</p>
      <p>Date :</p>
      <p>Texte :</p>
    </article>
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
