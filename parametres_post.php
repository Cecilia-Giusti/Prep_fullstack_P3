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
    <title>Parametres post</title>
    <meta name="description" content="L'extranet pour les salariés de GBAF">
    <link rel="stylesheet" href="styles.css"/>
  </head>

<body>   

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

  // Données de la base de données
  $req = $bdd->prepare('SELECT * FROM users WHERE username = :username');
  $req->execute(array(
      'username' => $_SESSION['username'] 
      ));
  $resultat = $req->fetch();

  // Comparaison du pass envoyé via le formulaire avec la base
  $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

  if (!$resultat)
  {
      // Redirection
      header('Location: parametres.php');
  }
  else
  {
      if ($isPasswordCorrect) {

        if (isset($_POST['name'])) {
          //Modification du nom à l'aide d'une requête préparée
          $req = $bdd->prepare('UPDATE users SET name = :name');
          $req->execute(array(
              'name' => $_POST['name']
          ));
          $_SESSION['name'] = $_POST['name'];
        }
        
        if (isset($_POST['firstname'])) {
          //Modification du prénom à l'aide d'une requête préparée
          $req = $bdd->prepare('UPDATE users SET firstname = :firstname');
          $req->execute(array(
              'firstname' => $_POST['firstname']
          ));
          $_SESSION['firstname'] = $_POST['firstname'];
        }

          if (isset($_POST['username'])) {
            //Modification de l'identifiant à l'aide d'une requête préparée
            $req = $bdd->prepare('UPDATE users SET username = :username');
            $req->execute(array(
                'username' => $_POST['username']
            ));
          
            $_SESSION['username'] = $_POST['username'];
          }     
            
            
        // Redirection
        header('Location: index.php');
      }
     
      
      else {
          // Redirection
          header('Location: parametres.php');
      }
  }


?>
</body>
</html>
