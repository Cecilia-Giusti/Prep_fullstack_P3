<?php
   // On démarre la session AVANT d'écrire du code HTML
 session_start();
 $_SESSION['id'] ;
 $_SESSION['name'];
 $_SESSION['firstname'] ;
 $_SESSION['username'] ;

 
 
 include ("dataBaseConnection.php");

    // Verification des données avec la base de données
    $req = $bdd->prepare('SELECT * FROM users WHERE id =:id ');
    $req->execute(array(
        'id' => $_SESSION['id'],
        ));
    $resultat = $req->fetch();
  ?>