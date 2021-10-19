
<?php
    // On démarre la session 
    session_start();
    include("fonctions.php"); 
    actualiser_session();

    // Connexion à la base de données
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }

    // Verification des données avec la base de données
    $req = $bdd->prepare('SELECT * FROM users WHERE name = :name AND firstname =:firstname AND username=:username ');
    $req->execute(array(
        'name' => $_SESSION['name'],
        'firstname' => $_SESSION['firstname'],
        'username'=> $_SESSION['username']
        ));
    $resultat = $req->fetch();

     // Verification des données avec la base de données
     $req = $bdd->prepare('SELECT * FROM posts WHERE id = :id');
     $req->execute(array(
         'id' => $_GET['id'] 
         ));
     $commentaire = $req->fetch();

      // Base de données des acteurs - partenaires
    $req = $bdd->prepare('SELECT * FROM actors WHERE id = :id');
    $req->execute(array(
        'id' => $commentaire['id_actor'] 
        ));
    $donnees = $req->fetch();

    $id = $donnees['id'];



     if ($resultat['id']==$commentaire['id_user'])

     { 
         // Suppression du commentaire à l'aide d'une requête préparée
    $req = $bdd->prepare('DELETE FROM posts WHERE id = :id');
    $req->execute(array(
    'id'=> $_GET['id'], 
    ));

     }

     else {

         
    // Redirection
    header("Location: 404.php");

     }

 
     // Redirection
     header("Location: partenaires.php?id=$id");




   

    


    
?>
