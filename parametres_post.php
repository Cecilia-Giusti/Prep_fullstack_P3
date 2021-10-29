<?php
include("middleware.php");

// Vérification des données de la base de données des utilisateurs
$req = $bdd->prepare('SELECT * FROM users WHERE username = :username');
$req->execute(array(
    'username' => $_SESSION['username'] 
    ));
$resultat = $req->fetch();

// Comparaison du mot de passe envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

if (!$resultat) // Si aucun résultat dans la base de données
{
    // Redirection
    header('Location: parametres.php');
}
else
{ // Si le mot de passe est correct
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

