
<?php
include ("middleware.php");

// Récupération des données de la base de données des utilisateurs
$req = $bdd->prepare('SELECT * FROM users WHERE id = :id');
$req->execute(array(
    'id' => $_SESSION['id'], 
    ));
$resultat = $req->fetch();


    // Comparaison du password envoyé via le formulaire avec la base de données
    $isPasswordCorrect = password_verify($_POST['passwordOld'], $resultat['password']);


if (!$resultat)
{
    // Redirection
    header('Location: connexion.php');
}
else
{   // Si le mot de passe est correct
    if (($isPasswordCorrect) AND ($_POST['password'] == $_POST['passwordok'])){
    
        // Hachage du mot de passe
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Modification du mot de passe à l'aide d'une requête préparée
        $req = $bdd->prepare('UPDATE users SET password = :password WHERE id =:id');
        $req->execute(array(
            'id'=> $_SESSION['id'],
            'password' => $pass_hache
        ));

        // Redirection
        header('Location: index.php');
        }

        else {
            // Redirection
            header('Location: modification_mdp.php');
        }
}
?>

