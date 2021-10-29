
<?php
include ("middleware.php");


// Verification qu'il existe bien un id dans la barre de navigation
if (isset($_GET['id'])) {

    // Récupération des données de la base de données des utilisateurs
    $req = $bdd->prepare('SELECT * FROM users WHERE name = :name AND firstname =:firstname AND username=:username ');
    $req->execute(array(
        'name' => $_SESSION['name'],
        'firstname' => $_SESSION['firstname'],
        'username'=> $_SESSION['username']
        ));
    $resultat = $req->fetch();

    // Récupération des données de la base de données des commentaires
    $req = $bdd->prepare('SELECT * FROM posts WHERE id = :id');
    $req->execute(array(
        'id' => htmlspecialchars($_GET['id']) 
        ));
    $commentaire = $req->fetch();

    // Récupération des données de la base de données des acteurs - partenaires
    $req = $bdd->prepare('SELECT * FROM actors WHERE id = :id');
    $req->execute(array(
        'id' => $commentaire['id_actor'] 
        ));
    $donnees = $req->fetch();

    // Placement de l'id récupéré dans une variablepour la redirection
    $id = $donnees['id'];


     // Verification si l'utilisateur en ligne est le même que l'utilisateur qui a commenté   
     if ($resultat['id']==$commentaire['id_user'])

     { 
        // Suppression du commentaire à l'aide d'une requête préparée
        $req = $bdd->prepare('DELETE FROM posts WHERE id = :id');
        $req->execute(array(
        'id'=> htmlspecialchars($_GET['id'])
        ));

     }

     else {
        // Redirection
        header("Location: 404.php");
     }

    // Redirection
    header("Location: partenaires.php?id=$id");
    }

else {
    // Redirection
    header("Location: deconnexion.php");
    }




   

    


    
?>
