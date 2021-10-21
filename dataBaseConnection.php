<?php 

 // Connexion à la base de données
 try
 {
     $bdd = new PDO('mysql:host=www.pma.ceciliagiusti.fr;dbname=gbaf;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 }
 catch (Exception $e)
 {
     die('Erreur : ' . $e->getMessage());
 }

 ?>
