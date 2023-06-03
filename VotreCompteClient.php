<!DOCTYPE html>
  <html>
  <header>
  <title>Sportify: Login CHAT</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"></style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="affichage.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="affichage.css"></style>
  <meta charset="utf-8">
  </header>
  
  <body>
      <div class="wrapper">
          <header>
            <h1><b>Sportify: Consultation sportive</b></h1>
            <img src="Images\logo.png" alt="Logo du site">
          </header>   
          
          <nav>
              <a href="Accueil.html">Accueil</a>
              <a href="Tout parcourir.html">Tout parcourir</a>
              <a href="recherche.php">Recherche</a>
              <a href="rendezvous.php">Rendez-vous</a>
              <a href="VotreCompteClient.php">Votre compte</a>
            </nav>
            
            <section class="text-center">
                <form action="" method="">
                    <div class="mon compte">
            <!--Le compte client via traitement php-->
            <h2 >Mon compte</h2>
            <?php 
    session_start();//pour maintenir la session active
    //connexion à la base de données:
    $database = "sportify";
    $db_handle = mysqli_connect('localhost','root','');
    $db_found = mysqli_select_db($db_handle, $database);
    
    
    /*
    * Module de connexion/déconnexion simplifié.
    * Vous pouvez adapter une variable de session de votre site afin de supprimer ce module
    */
      
      //pour vous connecter, entrez votresite.tld/calendrier.php?connexion=votremotdepasse
      if(isset($_SESSION['Login'])==0) {
        header('Location:ConnexionClientF.php');
      }
      if(isset($_GET['deconnexion'])) {
        unset($_SESSION['Login']);
        echo "Déconnecté avec succès!";
            header('Location:Accueil.html');
      }
      if(isset($_SESSION['Login'])) {
        echo '<p><a style="letter-spacing:0.5px;" href="?deconnexion">Déconnexion</a></p>';
            
      }
      
      $id=$_SESSION['Login'];
      
      if(isset($_SESSION['Login'])){
        $result = mysqli_query($db_handle,"SELECT * FROM client WHERE Id_Client LIKE'$id'");
        if (mysqli_num_rows($result) == 0) {
          echo "<p class='text-center'>Aucun compte cliente trouvé.</p>";
          } else {
            echo" <div class='row text-center'>";
            while ($data = mysqli_fetch_assoc($result)) {
                echo "<div class='text-center'>";
                echo "Nom : ".$data['Nom_Client']."<br>";
                echo "Prenom : " .$data['Prenom_Client']. "<br>";
                echo "Email : ".$data['Email_Client']."<br>";
                     }
                  }
                echo "<br>" ;
                echo "</div>";
        }  
    ?>
          </div>
      </form>
                    
                </div>
            </section>

   
            
             <footer class="footer">
        <div class="container bottom_border">
          <div class="row">
            <div class=" col-sm-4 col-md col-sm-4  col-12 col">
              <h5 class="headin5_amrc col_white_amrc pt2">Où nous trouver</h5>
              <p><i class="fa fa-location-arrow"></i> 3 rue Jean Massiet</p>
              <p><i class="fa fa-phone"></i>  +33 16 27 38 49 50  </p>
              <p><a HREF="mailto:info@omnessports.com"><i class="fa fa fa-envelope"></i> info@omnessports.com </a> </p>
            </div>
          </div>
        </div>
        <p class="text-center">Copyright @2023 | Designed With by <a href="accueil.html">Sportify</a></p>
      </footer>
          </div>
  </body>
  </html>