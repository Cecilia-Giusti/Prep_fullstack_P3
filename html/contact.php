<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacter la GBAF</title>
    <meta name="description" content="L'extranet pour les salariés de GBAF">
    <link rel="stylesheet" href="styles.css"/>
  </head>

<body>     
  <div id="container">  
    <!-- Header  -->
<?php include("header.php"); ?>
   
    <!--  Contact  -->
      <section id="contact">
        
        <form action="connexion_post.php" method="post">
          
          <h1> Contact</h1>
            <div id="contactNous">
              <div class="label">
                <label for="name">Nom :</label>
              </div>

              <div class="emplacement">
                <input type="text" id="name" name="Nom" required />
              </div>

              <div class="label">
                <label for="text">Email :</label>
              </div>

              <div class="emplacement">
                <input type="text" id="email" name="email" required/>
              </div>

              <div class="label">
                <label for="text">Objet :</label>
              </div>

              <div class="emplacement">
                <input type="text" id="objet" name="objet" required/>
              </div>

              <div class="label">
                <label for="text">Message :</label>
              </div>

              <div class="emplacement">
                <textarea id="message" name="message" required rows="8" cols="35">
                </textarea>
              </div>

             
              <div class="submit">
                <input type="submit" id='submit' value='Envoyer' />
              </div>  

            

            </div>
        </form>
        
      </section> 


   
      <?php include("footer.php"); ?>
  </div>
</body>

</html>
