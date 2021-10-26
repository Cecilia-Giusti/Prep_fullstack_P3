
<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

include("dataBaseConnection.php");

// Hachage du mot de passe
$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);


// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO users (name, firstname, username, password, question, answer) VALUES(?,?,?,?,?,?)');
$req->execute(array(
    htmlspecialchars($_POST['name']),
    htmlspecialchars($_POST['firstname']) ,
    htmlspecialchars ($_POST['username']) ,
    htmlspecialchars($pass_hache),
    htmlspecialchars($_POST['question']),
    htmlspecialchars($_POST['answer'])
));


// Redirection
header('Location: connexion.php');
?>
