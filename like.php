
<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
$_SESSION['id'] = '';
$_SESSION['name'] = '';
$_SESSION['firstname'] = '';
$_SESSION['username'] = '';
?>



<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Like et dislike des acteurs/partenaires</title>
    <meta name="description" content="L'extranet pour les salariés de GBAF">
    <link rel="stylesheet" href="styles.css"/>
  </head>

  <body>       
  <div id="container">  
       <!-- Header  -->
    <?php include("header.php"); ?>