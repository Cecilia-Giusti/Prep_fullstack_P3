<?php
  // On démarre la session AVANT d'écrire du code HTML
  session_start();
  $_SESSION['id'] ;
  $_SESSION['name'];
  $_SESSION['firstname'] ;
  $_SESSION['username'] ;
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

  ?>