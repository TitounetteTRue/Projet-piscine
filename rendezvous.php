<!DOCTYPE html>
<html>
<head>
  <title>Sportify: Consultation sportive</title>
  <link rel="stylesheet" type="text/css" href="affichage.css">
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
      <a href="#">Recherche</a>
      <a href="#" id="pageencours">Rendez-vous</a>
      <a href="#">Votre compte</a>
    </nav>
    
    <section>
      <!-- Contenu de la grande section -->
      <form action="" method="">
        <div class="rendezvous">
            <!--Les rdv surement afficher via traitement php-->
            <h2 >Mes rendez vous :</h2>
            
          </div>
      </form>

    </section>
    <?php 
    
    $heures= array(1=>"9:00",2=>"9:20",3=>"9:40",4=>"10:00",5=>"10:20",6=>"10:40",7=>"11:00",8=>"11:20",9=>"11:40",10=>"12:00",11=>"14:00",12=>"14:20",13=>"14:40",14=>"15:00",15=>"15:20",16=>"15:40",17=>"16:00",18=>"16:20",19=>"16:40",20=>"17:00",21=>"17:20",22=>"17:40",23=>"18:00");
    $jours = array(1=>"Lundi",2=>"Mardi",3=>"Mercredi",4=>"Jeudi",5=>"Vendredi",6=>"Samedi",7=>"Dimanche");
    session_start();//pour maintenir la session active
    //connexion à la base de données:
    $database = "sportify";
    $db_handle = mysqli_connect('localhost','root','Mezarnou');
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
          echo "<p>Aucun rendez vous trouvé.</p>";
          } else {
            while ($data = mysqli_fetch_assoc($result)) {
              echo"<form action='AnnulerRDV.php' method='post'>";
              echo "<input type='submit'name=" . $data['Id'] ." value='Annuler le RDV'/>";
              echo "<table border ='1'>";
              echo "<tr>";
              echo "<td>" . "Le : " .$jours[$data['Jour']]  ."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>". "A : " .$heures[$data['Heur']]. "</td>";
              echo "</tr>";
              $coach=$data['Id_Coach'];
              $sql="SELECT * FROM coach WHERE Id_Coach LIKE '$coach'";
              $req= mysqli_query($db_handle,$sql);
              if (mysqli_num_rows($req) == 0) {
                echo "<p>Aucun rendez vous trouvé.</p>";
                } else {
                  while ($data = mysqli_fetch_assoc($req)) {
                    echo "<tr>";
                    echo "<td>". "Nom du Coach : " . $data['Nom_Coach'] ."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>". "Activité : " . $data['Specialite_Coach'] ."</td>";
                    echo "</tr>";
                    
                    
                    echo "</table>" ; 
                    
                   }
                }
                echo "</br>" ;
                echo"<form>";
        }
        
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
            <p><i class="fa fa fa-envelope"></i> info@omnessports.com  </p>
          </div>
        </div>
      </div>
      <p class="text-center">Copyright @2023 | Designed With by <a href="accueil.html">Sportify</a></p>
    </footer>
  </div>
</body>
</html>
