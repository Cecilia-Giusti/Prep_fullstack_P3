<!-- Header  -->
<header>
  <nav>
    <!-- Logo-->
    <div id="logo_GBAF">
      <img src="images_web/logo_fonbblanc.png" alt="Logo GBAF" />
    </div>

    <?php 
      if (isset($_SESSION['name']) AND isset($_SESSION['firstname'])){
    ?>

      <!-- Nom & prénom s'il y a connexion-->
      <div id="barreDidentite">
        <ul>     
          <li><img src="images_web/icone_identite.png" alt="Image identite"/></li>
          <li><a class="nomPrenom" href="parametres.php"> <?php echo (ucwords($_SESSION['firstname']). ' ' .(ucwords($_SESSION['name']))); ?> <a></li>
        </ul>
      </div>

      <!--Deconnexion s'il y a connexion -->
      <div id="deconnexion">
        <a class="deconnexion" href="deconnexion.php">Déconnexion</a>
      </div>
    <?php          
    }
    ?>
  </nav>
</header>