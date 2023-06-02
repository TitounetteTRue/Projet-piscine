<!DOCTYPE html>
<html>
<head>
  <title>Sportify: Rendez-Vous</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"></style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="affichage.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="affichage.css"></style>
<meta charset="utf-8">
</head>
<body>
  <div class="wrapper">
    <header>
      <h1><b>Sportify: Consultation sportive</b></h1>
      <img src="Images\logo.png" alt="Logo du site">
    </header>   
    
    <nav>
      <a href="Accueil.html">Accueil</a>
      <a href="Tout parcourir.html">Tout parcourir</a>
      <a href="recherche.html">Recherche</a>
      <a href="#" id="pageencours">Rendez-vous</a>
      <a href="#">Votre compte</a>
    </nav>
    
    <section>
      <!-- Contenu de la grande section -->
      <form action="" method="">
        <div class="rendezvous">
            <!--Les rdv surement afficher via traitement php-->
            <h2 >Mes rendez-vous :</h2>
            
          </div>
      </form>

    </section>
    <?php 
    
    $heures= array(1=>"9:00",2=>"9:20",3=>"9:40",4=>"10:00",5=>"10:20",6=>"10:40",7=>"11:00",8=>"11:20",9=>"11:40",10=>"12:00",11=>"14:00",12=>"14:20",13=>"14:40",14=>"15:00",15=>"15:20",16=>"15:40",17=>"16:00",18=>"16:20",19=>"16:40",20=>"17:00",21=>"17:20",22=>"17:40",23=>"18:00");
    $jours = array(1=>"Lundi",2=>"Mardi",3=>"Mercredi",4=>"Jeudi",5=>"Vendredi",6=>"Samedi",7=>"Dimanche");
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
        $sql="SELECT * FROM calendrier_Client WHERE Id_Client LIKE'$id'";
        $result = mysqli_query($db_handle,$sql);
        
        if (mysqli_num_rows($result) == 0) {
          echo "<p class='text-center'>Aucun rendez-vous trouvé.</p>";
          } else {
            echo" <div class='row text-center'>";
            while ($data = mysqli_fetch_assoc($result)) {
                echo"<form action='AnnulerRDV.php' method='post'>";
                echo "<input type='submit'name=" . $data['Id'] ." value='Annuler le RDV'/>";
                echo "<div class='text-center'>";
                echo "Le : " .$jours[$data['Jour']]  ."<br>";
                echo "A : " .$heures[$data['Heur']]. "<br>";
                $coach=$data['Id_Coach'];
                $sql="SELECT * FROM coach WHERE Id_Coach LIKE '$coach'";
                $req= mysqli_query($db_handle,$sql);
                if (mysqli_num_rows($req) == 0) {
                  echo "<p>Aucun rendez-vous trouvé.</p>";
                  } else {
                    while ($data = mysqli_fetch_assoc($req)) {
                      echo "Nom du Coach : " . $data['Nom_Coach'] ."<br>";
                      echo "Activité : " . $data['Specialite_Coach'] ."<br>";
                      
                     }
                  }

                echo "<br>" ;
                echo"<form>";
                echo "</div>";
        }
        echo "</div>";     
        
      }
    }


    ?>
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
