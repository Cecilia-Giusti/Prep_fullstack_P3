
<?php
include("dataBaseConnection.php");


// Données de la base de données
$req = $bdd->prepare('SELECT * FROM users WHERE username = :username AND question = :question AND answer = :answer');
$req->execute(array(
    'username' => htmlspecialchars($_POST['username']), 
    'question' => htmlspecialchars($_POST['question']), 
    'answer' => htmlspecialchars($_POST['answer']) 
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
        $req = $bdd->prepare('UPDATE users SET password = :password WHERE id =:id');
        $req->execute(array(
            'id'=> $resultat['id'],
            'password' => $pass_hache
            
        ));

        // Redirection
        header('Location: connexion.php');
        }

        else {
            // Redirection
            header('Location: motDePasse.php');
        }
}
?>

