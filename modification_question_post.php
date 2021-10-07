
<?php
    // On démarre la session AVANT d'écrire du code HTML
    session_start();

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
    $req = $bdd->prepare('SELECT * FROM users WHERE id = :id');
    $req->execute(array(
        'id' => $_SESSION['id'], 
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
        if ($isPasswordCorrect){

            //Modification de la question et de la réponse à l'aide d'une requête préparée
            $req = $bdd->prepare('UPDATE users SET question = :question , answer = :answer WHERE id =:id');
            $req->execute(array(
                'id'=> $_SESSION['id'],
                'question' => $_POST['question'],
                'answer' => $_POST['answer']
            ));

            // Redirection
            header('Location: index.php');
            }

            else {
                // Redirection
                header('Location: modification_question.php');
            }
    }
?>

