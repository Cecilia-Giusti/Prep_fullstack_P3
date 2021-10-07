<?php
  // On démarre la session AVANT d'écrire du code HTML
  session_start();

  // Connexion à la base de données
 
  try
  {
    
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
?>


<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paramètre extranet GBAF</title>
    <meta name="description" content="L'extranet pour les salariés de GBAF">
    <link rel="stylesheet" href="styles.css"/>
  </head>

<body>     
  <div id="container">  
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

      <section> <!--Code Php à inserer pour aller chercher les différents acteurs-->
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
        <article>
            <img src="images_web/CDE.png" alt="Logo CDE" />
            <div class="paragraphe"><h3>CDE (chambre des entrepreneurs)</h3>
              <p>La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. </p></div>
            <div class="lirePlus">
              <input onclick="window.location.href='partenaires.html'" class="inscription" type="button" value="Lire la suite"/>
            </div>
        </article>

        <article>
          <img src="images_web/Dsa_france.png" alt="Logo Dsa" />
          <div class="paragraphe"><h3>DSA France</h3>
            <p>Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales. </p></div>
          <div class="lirePlus">
            <input onclick="window.location.href='partenaires.html'" class="inscription" type="button" value="Lire la suite"/>
          </div>
        </article>

        <article>
          <img src="images_web/formation_co.png" alt="Logo formation and co" />
          <div class="paragraphe"><h3>Formation & co</h3>
            <p>Formation&co est une association française présente sur tout le territoire. </p></div>
          <div class="lirePlus">
            <input onclick="window.location.href='partenaires.html'" class="inscription" type="button" value="Lire la suite"/>
          </div>
        </article>

        <article>
          <img src="images_web/protectpeople.png" alt="Logo CDE" />
          <div class="paragraphe"><h3>Protectpeople</h3>
            <p>Protectpeople finance la solidarité nationale. </p></div>
          <div class="lirePlus">
            <input onclick="window.location.href='partenaires.html'" class="inscription" type="button" value="Lire la suite"/>
          </div>
        </article>
      </section>

    <?php include("footer.php"); ?>
  </div>


   
</body>
</html>


