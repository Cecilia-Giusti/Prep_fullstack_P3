
<?php

include("dataBaseConnection.php");
include("middleware.php");

if (isset($_POST['id']) AND isset($_GET['id']) AND isset($_POST['post']) AND ($_POST['post'] != "Votre commentaire")){

    // Verification des données avec la base de données
    $req = $bdd->prepare('SELECT * FROM users WHERE id = :id');
    $req->execute(array(
        'id' => htmlspecialchars($_POST['id']) 
        ));
    $resultat = $req->fetch();

    // Base de données des acteurs - partenaires
    $req = $bdd->prepare('SELECT * FROM actors WHERE id = :id');
    $req->execute(array(
        'id' => htmlspecialchars($_GET['id']) 
        ));
    $donnees = $req->fetch();

    $id = $donnees['id'];


    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO posts (id_user,id_actor,post) VALUES(?,?,?)');
    $req->execute(array(
        $resultat['id'], 
        $donnees['id'],
        htmlspecialchars($_POST['post'])
    ));


    
     // Redirection
     header("Location: partenaires.php?id=$id");

    
}
else
{
    // Redirection
    header("Location: deconnexion.php");
}

    
?>
