
<?php
// On démarre la session 
session_start();
include("fonctions.php"); 
actualiser_session();

// Connexion à la base de données
include("dataBaseConnection.php");


// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO contact_forms (name,email,object,message) VALUES(?,?,?,?)');
$req->execute(array(
    htmlspecialchars($_POST['name']), 
    htmlspecialchars($_POST['email']),
    htmlspecialchars($_POST['object']),
    htmlspecialchars($_POST['message'])
));


// Redirection
header("Location: contact.php");

?>
