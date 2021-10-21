<?php
  // On démarre la session AVANT d'écrire du code HTML
  session_start();
  $_SESSION['id'] ;
  $_SESSION['name'];
  $_SESSION['firstname'] ;
  $_SESSION['username'] ;
  include("fonctions.php"); 
  actualiser_session();



  ?>