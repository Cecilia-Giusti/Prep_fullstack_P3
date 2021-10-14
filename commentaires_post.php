
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
    $req = $bdd->prepare('SELECT * FROM users WHERE id = :id');
    $req->execute(array(
        'id' => $_POST['id'] 
        ));
    $resultat = $req->fetch();

    // Base de données des acteurs - partenaires
    $req = $bdd->prepare('SELECT * FROM actors WHERE id = :id');
    $req->execute(array(
        'id' => $_GET['id'] 
        ));
    $donnees = $req->fetch();

    $id = $donnees['id'];


    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO posts (id_user,id_actor,post) VALUES(?,?,?)');
    $req->execute(array(
        $resultat['id'], 
        $donnees['id'],
        $_POST['post']
    ));

    
    // Redirection
    header("Location: partenaires.php?id=$id");


    
?>
