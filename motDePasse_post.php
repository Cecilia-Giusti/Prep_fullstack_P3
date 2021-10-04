<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mot de passe oublié post</title>
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
$req = $bdd->prepare('SELECT * FROM users WHERE username = :username AND question = :question AND answer = :answer');
$req->execute(array(
    'username' => $_POST['username'], 
    'question' => $_POST['question'], 
    'answer' => $_POST['answer'] 
    ));
$resultat = $req->fetch();

if (!$resultat)
{
    // Redirection
    header('Location: motDePasse.php');
}
else
{
    if ($_POST['password'] == $_POST['okpassword']){
    
        // Hachage du mot de passe
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Modification du mot de passe à l'aide d'une requête préparée
        $req = $bdd->prepare('UPDATE users SET password = :password');
        $req->execute(array(
            'password' => $pass_hache
        ));

        // Redirection
        header('Location: index.php');
        }

        else {
            // Redirection
            header('Location: motDePasse.php');
        }
}

?>
</body>
</html>
