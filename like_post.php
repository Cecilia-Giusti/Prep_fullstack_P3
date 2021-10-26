
<?php
    // On démarre la session AVANT d'écrire du code HTML
session_start();
$_SESSION['id'] ;
$_SESSION['name'];
$_SESSION['firstname'] ;
$_SESSION['username'] ;
include("fonctions.php"); 
actualiser_session();

include("dataBaseConnection.php");

// Verification des données avec la base de données
$req = $bdd->prepare('SELECT * FROM users WHERE id = :id');
$req->execute(array(
    'id' => $_SESSION['id'] 
    ));
$resultat = $req->fetch();

// Base de données des acteurs - partenaires
$req = $bdd->prepare('SELECT * FROM actors WHERE id = :id');
$req->execute(array(
    'id' => htmlspecialchars($_GET['id']) 
    ));
$donnees = $req->fetch();

$id = $donnees['id'];

// Base de données des votes
$req = $bdd->prepare('SELECT * FROM likes WHERE id_user = :id_user AND id_actor =:id_actor');
$req->execute(array(
    'id_user' => $resultat['id'],
    'id_actor' => htmlspecialchars($_GET['id']) 
    ));
$vote = $req->fetch();


// S'il y a un vote positif

if ( $_GET['vote']==1) {

    // Et aucun vote dans la base de données
    if (!isset($vote['vote'])){

        // Insertion du vote à l'aide d'une requête préparée
        $req = $bdd->prepare('INSERT INTO likes (id_user,id_actor,vote) VALUES(?,?,?)');
        $req->execute(array(
        $resultat['id'], 
        $donnees['id'],
        htmlspecialchars($_GET['vote'])
        ));

    }

    else {
        if ($vote['vote']==1) {
            // Suppression du vote à l'aide d'une requête préparée
            $req = $bdd->prepare('DELETE FROM likes WHERE id_user = :id_user AND id_actor =:id_actor AND vote = :vote');
            $req->execute(array(
            'id_user'=> $vote['id_user'],
            'id_actor' => $id,
            'vote' => $vote['vote'] 
            ));
        }

        else {
            // Suppression du vote à l'aide d'une requête préparée
            $req = $bdd->prepare('DELETE FROM likes WHERE id_user = :id_user AND id_actor =:id_actor AND vote = :vote');
            $req->execute(array(
            'id_user'=> $vote['id_user'],
            'id_actor' => $id,
            'vote' => $vote['vote'] 
            ));

            // Insertion du vote à l'aide d'une requête préparée
            $req = $bdd->prepare('INSERT INTO likes (id_user,id_actor,vote) VALUES(?,?,?)');
            $req->execute(array(
                htmlspecialchars($resultat['id']), 
                htmlspecialchars($donnees['id']),
                htmlspecialchars($_GET['vote'])
            ));
        }
    }
}

// Sinon  le vote = 0
if ( $_GET['vote']==0) {

        // Et aucun vote dans la base de données
        if (!isset($vote['vote'])){

            // Insertion du vote à l'aide d'une requête préparée
            $req = $bdd->prepare('INSERT INTO likes (id_user,id_actor,vote) VALUES(?,?,?)');
            $req->execute(array(
                htmlspecialchars($resultat['id']), 
                htmlspecialchars($donnees['id']),
                htmlspecialchars($_GET['vote'])
            ));
        }

        else {
            if ($vote['vote']==0) {
            // Suppression du vote à l'aide d'une requête préparée
            $req = $bdd->prepare('DELETE FROM likes WHERE id_user = :id_user AND id_actor =:id_actor AND vote = :vote');
            $req->execute(array(
            'id_user'=> $vote['id_user'],
            'id_actor' => $id,
            'vote' => $vote['vote'] 
            ));
            }

            else {
                // Suppression du vote à l'aide d'une requête préparée
            $req = $bdd->prepare('DELETE FROM likes WHERE id_user = :id_user AND id_actor =:id_actor AND vote = :vote');
            $req->execute(array(
            'id_user'=> $vote['id_user'],
            'id_actor' => $id,
            'vote' => $vote['vote'] 
            ));

                // Insertion du vote à l'aide d'une requête préparée
                $req = $bdd->prepare('INSERT INTO likes (id_user,id_actor,vote) VALUES(?,?,?)');
                $req->execute(array(
                $resultat['id'], 
                $donnees['id'],
                htmlspecialchars($_GET['vote'])
                ));
            }
        }   
}





// Redirection
header("Location: partenaires.php?id=$id");
    
    
?>
