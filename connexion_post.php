<?php
    // Connexion à la base de données
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }


    // Données de la base de données
    $req = $bdd->prepare('SELECT * FROM users WHERE username = :username');
    $req->execute(array(
        'username' => $_POST['username'], 
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
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['name'] = $resultat['name'];
            $_SESSION['firstname'] = $resultat['firstname'];
            $_SESSION['username'] = $_POST['username'];

            // Redirection
            header('Location: index.php');
        }
        else {
            // Redirection
            header('Location: connexion.php');
        }
    }
?>
</body>
</html>
