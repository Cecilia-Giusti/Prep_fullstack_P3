
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
    $req = $bdd->prepare('SELECT * FROM users WHERE username = :username AND question = :question AND answer = :answer');
    $req->execute(array(
        'username' => $_POST['username'], 
        'question' => $_POST['question'], 
        'answer' => $_POST['answer'] 
        ));
    $resultat = $req->fetch();

    if (!$resultat)
    {
        // Redirection
        header('Location: motDePasse.php');
    }
    else
    {
        if ($_POST['password'] == $_POST['okpassword']){
        
            // Hachage du mot de passe
            $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

            //Modification du mot de passe à l'aide d'une requête préparée
            $req = $bdd->prepare('UPDATE users SET password = :password WHERE id =:id');
            $req->execute(array(
                'id'=> $resultat['id'],
                'password' => $pass_hache
                
            ));

            // Redirection
            header('Location: connexion.php');
            }

            else {
                // Redirection
                header('Location: motDePasse.php');
            }
    }
?>

