
<?php 
include ("middleware.php");

if (isset($resultat['id'])){
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page d'accueil de l'extranet de GBAF</title>
    <meta name="description" content="L'extranet pour les salariés de GBAF">
    <link rel="stylesheet" href="styles.css"/>
  </head>

  <body>       
    <div id="container">  
      <!-- Header  -->
      <?php include("header.php"); ?>
     
        <!-- Section   -->
        <section id="entete">
          <img src="images_web/building.jpg" alt="Image d'immeubles"/>
          <div id="GBAF">
            <p>Le Groupement Banque Assurance Français (GBAF) est une fédération
              représentant les 6 grands groupes français. Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
              les axes de la réglementation financière française. Sa mission est de promouvoir
              l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
              pouvoirs publics.
            </p>
          </div>
        </section> 

        <section> 
          <div id="texteActeurs">
            <h2> Les acteurs et les partenaires</h2>
            <p>Les produits et services bancaires sont nombreux et très variés. Afin de
              renseigner au mieux les clients, les salariés des 340 agences des banques et
              assurances en France (agents, chargés de clientèle, conseillers financiers, etc.)
              recherchent sur Internet des informations portant sur des produits bancaires et
              des financeurs, entre autres.
              Aujourd’hui, il n’existe pas de base de données pour chercher ces informations de
              manière fiable et rapide ou pour donner son avis sur les partenaires et acteurs du
              secteur bancaire, tels que les associations ou les financeurs solidaires.
              Pour remédier à cela, le GBAF souhaite proposer aux salariés des grands groupes
              français un point d’entrée unique, répertoriant un grand nombre d’informations
              sur les partenaires et acteurs du groupe ainsi que sur les produits et services
              bancaires et financiers.
              Chaque salarié pourra ainsi poster un commentaire et donner son avis
            </p>
          </div>
        </section>

        <section> 
        <?php
          // Récupération des acteurs - partenaires
          $reponse = $bdd->query('SELECT * FROM actors');

          // Affichage de chaque acteurs - partenaires 
          while ($donnees = $reponse->fetch()){ 
            if (isset($donnees['id'])) { 
        ?>
        
              <article>
                <img src="<?php echo(htmlspecialchars($donnees['logo']));?>" alt="Logo" />
                <div class="paragraphe"><h3><?php echo(htmlspecialchars($donnees['actor']));?></h3>
                  <p>
                    <?php 
                    $keywords = preg_split('/(?<=[.?!;:])\s+/', htmlspecialchars($donnees['description']), -1, PREG_SPLIT_NO_EMPTY);
                    echo ($keywords[0]);
                    ?> 
                  </p>
                </div>
                <div class="lirePlus">
                  <input onclick="window.location.href='partenaires.php?id=<?php echo($donnees['id']);?>'" class="inscription" type="submit" value="Lire la suite"/>
                </div>
              </article>
            <?php
            }
            else {
              // Redirection
              header('Location: 404.php');
            }
            ?>
      </section>
    </div>
  </body>
</html>

<?php
  }
 $reponse->closeCursor();

include("footer.php"); 

    }

    else{
       // Redirection
 header('Location: deconnexion.php');
    }

?>