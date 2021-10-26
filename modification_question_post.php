
<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
include("fonctions.php"); 
actualiser_session();

include("dataBaseConnection.php");


// Données de la base de données
$req = $bdd->prepare('SELECT * FROM users WHERE id = :id');
$req->execute(array(
    'id' => $_SESSION['id'], 
    ));
$resultat = $req->fetch();


    // Comparaison du password envoyé via le formulaire avec la base de données
    $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);


if (!$resultat)
{
    // Redirection
    header('Location: connexion.php');
}
else
{
    if ($isPasswordCorrect){

        //Modification de la question et de la réponse à l'aide d'une requête préparée
        $req = $bdd->prepare('UPDATE users SET question = :question , answer = :answer WHERE id =:id');
        $req->execute(array(
            'id'=> $_SESSION['id'],
            'question' => htmlspecialchars($_POST['question']),
            'answer' => htmlspecialchars($_POST['answer'])
        ));

        // Redirection
        header('Location: index.php');
        }

        else {
            // Redirection
            header('Location: modification_question.php');
        }
}
?>

