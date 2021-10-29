<?php
   // On démarre la session
 session_start();
 $_SESSION['id'] ;
 $_SESSION['name'];
 $_SESSION['firstname'] ;
 $_SESSION['username'] ;

 include ("dataBaseConnection.php");

  // Récupération des données de la base de données des utilisateurs
  $req = $bdd->prepare('SELECT * FROM users WHERE id =:id ');
  $req->execute(array(
      'id' => $_SESSION['id'],
      ));
  $resultat = $req->fetch();
  ?>