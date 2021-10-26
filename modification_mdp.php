<?php 
    
  include("middleware.php");
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification du mot de passe</title>
    <meta name="description" content="L'extranet pour les salariés de GBAF">
    <link rel="stylesheet" href="styles.css"/>
  </head>

  <body>       
  <div id="container">  
    <!-- Header  -->
    <?php include("header.php"); ?>
   
        <!-- Modification du mot de passe  -->
        <section id="modificationMotDePasse">
            <form action="modification_mdp_post.php" method="post">
            
                <h1> Modification du mot de passe</h1>
                <div id="margeMotDePasse">
                    <div class="label">
                        <label for="passwordOld">Ancien mot de passe :</label>
                    </div>
                    <div class="emplacement">
                        <input type="password" id="password" name="passwordOld" required  />
                    </div>          

                    <div class="label">
                        <label for="password"> Nouveau mot de passe :</label>
                    </div>
                    <div class="emplacement">
                        <input type="password" id="password" name="password" required/>
                    </div>

                    <div class="label">
                        <label for="passwordok">Confirmer le mot de passe : </label>
                    </div>
                    <div class="emplacement">
                        <input type="password" id="password" name="passwordok" required/>
                    </div>                

                    <div id="modification">
                        <input class="modification" type="submit" value="Modifier"/>
                    </div>

                    <div class="Retour">
                        <i><a href="parametres.php">Retour </a> </i>
                    </div>
                </div>
            </form>
        </section> 
       <?php include("footer.php"); ?>
  </div>
</body>
</html>


