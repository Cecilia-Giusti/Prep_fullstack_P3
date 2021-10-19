
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


    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO contact_forms (name,email,object,message) VALUES(?,?,?,?)');
    $req->execute(array(
        $_POST['name'], 
        $_POST['email'],
        $_POST['object'],
        $_POST['message']
    ));


       // Redirection
       header("Location: contact.php");
    
    
   

    
?>
