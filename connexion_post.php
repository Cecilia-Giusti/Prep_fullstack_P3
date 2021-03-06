<?php
 include("dataBaseConnection.php");

    // Récupération des données de la base de données des utilisateurs
    $req = $bdd->prepare('SELECT * FROM users WHERE username = :username');
    $req->execute(array(
        'username' => htmlspecialchars($_POST['username']), 
        ));
    $resultat = $req->fetch();

    // Comparaison du password envoyé via le formulaire avec la base de données
    $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

    if (!$resultat)
    {
        // Redirection
        header('Location: deconnexion.php');
    }
    else
    {
        // Création de la session
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['name'] = $resultat['name'];
            $_SESSION['firstname'] = $resultat['firstname'];
            $_SESSION['username'] = $resultat['username'];

            // Redirection
            header('Location: index.php');
        }
        else {
            // Redirection
            header('Location: deconnexion.php');
        }
    }
?>

