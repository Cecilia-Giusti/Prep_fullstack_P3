
<?php
include("middleware.php");


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
