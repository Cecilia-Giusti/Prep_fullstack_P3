<?php
    function actualiser_session()
    {
        if ( isset($_SESSION['time']) ) // Test: Si il existe une session
        {
            $tempsMaxSession = 20;                            
    // le temps maximal que dure la session en seconde

            if( ($_SESSION['time'] + $tempsMaxSession) >= time() ){    
                // Si l'action sur la session date de moins de $tempsMaxSession
                $_SESSION['time'] = time();
                }    
            else {
                // Connexion à la base de données
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                }
                catch (Exception $e)
                {
                    die('Erreur : ' . $e->getMessage());
                }


                // Récupération des données de la base de données
                $req = $bdd->prepare('SELECT * FROM users WHERE id = :id');
                $req->execute(array(
                    'id' => $_SESSION['id'], 
                    ));
                $resultat = $req->fetch();

    
                    if (!$resultat)
                    {
                        // Redirection
                        header('Location: connexion.php');
                    }
                    else
                    {
                            session_start();
                            $_SESSION['name'] = $resultat['name'];
                            $_SESSION['firstname'] = $resultat['firstname'];
                            $_SESSION['username'] = $resultat['username'];
                        }                                       
                }   
                    
                }
    }
?>