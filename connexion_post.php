<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion_post</title>
    <meta name="description" content="L'extranet pour les salariés de GBAF">
    <link rel="stylesheet" href="styles.css"/>
  </head>

<body>   

<?php
 // Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}


// Données de la base de données
$req = $bdd->prepare('SELECT id, password FROM users WHERE username = :username');
$req->execute(array(
    'username' => $_POST['username'], 
    ));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

if (!$resultat)
{
    // Redirection
    header('Location: connexion.php');
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['username'] = $_POST['username'];
       // Redirection
        header('Location: index.php');
    }
    else {
        // Redirection
        header('Location: connexion.php');
    }
}
?>
</body>
</html>
