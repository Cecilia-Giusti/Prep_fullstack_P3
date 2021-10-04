<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Inscription_post</title>
    </head>
    <body>
    
    <?php

    // Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Hachage du mot de passe
$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);


// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO users (name, firstname, username, password, question, answer) VALUES(?,?,?,?,?,?)');
$req->execute(array(
    $_POST['name'], 
    $_POST['firstname'],
    $_POST['username'],
    $pass_hache,
    $_POST['question'],
    $_POST['answer']
));


// Puis rediriger vers minichat.php comme ceci :
header('Location: connexion.php');
?>
    
        
    </body>
</html>