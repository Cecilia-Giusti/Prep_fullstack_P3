<?php
  // On démarre la session AVANT d'écrire du code HTML
  session_start();
  include("fonctions.php"); 
  actualiser_session();

  include("dataBaseConnection.php");

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
              'name' => htmlspecialchars($_POST['name'])
          ));

          $_SESSION['name'] = htmlspecialchars($_POST['name']);
        }
        
        if (isset($_POST['firstname'])) {
          //Modification du prénom à l'aide d'une requête préparée
          $req = $bdd->prepare('UPDATE users SET firstname = :firstname');
          $req->execute(array(
              'firstname' => htmlspecialchars($_POST['firstname'])
          ));
          $_SESSION['firstname'] = htmlspecialchars($_POST['firstname']);
        }

          if (isset($_POST['username'])) {
            //Modification de l'identifiant à l'aide d'une requête préparée
            $req = $bdd->prepare('UPDATE users SET username = :username');
            $req->execute(array(
                'username' => htmlspecialchars($_POST['username'])
            ));
          
            $_SESSION['username'] = htmlspecialchars($_POST['username']);
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

