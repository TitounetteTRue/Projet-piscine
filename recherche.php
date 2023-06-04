<!DOCTYPE html>
<html>
<head>
  <title>Sportify: Consultation sportive</title>
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
      <a href="Accueil.php">Accueil</a>
      <a href="Tout parcourir.html">Tout parcourir</a>
      <a href="recherche.html">Recherche</a>
      <a href="rendezvous.php">Rendez-vous</a>
      <a href="Votrecompte.html">Votre compte</a>
    </nav>
    <section class="container">
      <h3>Recherche </h3>
<?php 

$recherche = isset($_POST["recherche"])? $_POST["recherche"] : "";


//identifier BDD
$database = "sportify";
//connectez-vous dans BDD
$db_handle =mysqli_connect("localhost", "root","");
$db_found = mysqli_select_db($db_handle,$database);


if (isset($_POST["barre"])){
        if ($db_found) {
            //commencer le query
            $sql = "SELECT * FROM coach WHERE (Nom_Coach LIKE '%$recherche%') OR (Prenom_Coach LIKE '%$recherche%') OR (Email_Coach LIKE '%$recherche%') OR (Specialite_Coach LIKE '%$recherche%')OR (salle_sport LIKE '%$recherche%')";
            $result = mysqli_query($db_handle, $sql);
            //regarder s'il y a des resultats
            if (mysqli_num_rows($result) == 0) {
                echo "<p> People not found.</p>";
            } else {                
                //afficher le resultat
                while ($data = mysqli_fetch_assoc($result)) {
                  echo"<form action='coachactivB.php' method='post'>";
                  echo" <div class='media'>";
                  $image = $data['Photo_Coach'];
                  echo "<br><img src='$image' class='float-start' height='120' width='100'>";
                  echo "<div class='media-body text-center'>";
                  echo "<p>" . "Nom : " . $data['Nom_Coach'] ."<br>";
                  echo  "Prenom : " . $data['Prenom_Coach'] ."<br>";
                  echo "E-mail : " . $data['Email_Coach'] ."<br>";
                  echo "Spécialité : " .$data['Specialite_Coach']. "<br>";
                  echo "Salle de Sport : " .$data['salle_sport']. "<br>"; 
                  echo"<form>";
                  echo "<input type='submit'name=" . $data['Id_Coach'] ." value='Voir'/>";
                  echo "</div>";
                  echo "</div>";     
                }
            }
        } else {
            echo "<p>Database not found.</p>";
        }
    } //end Rechercher
    ?>
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
    <p class="text-center">Copyright @2023 | Designed With by <a href="Accueil.php">Sportify</a></p>
  </footer>
</div>
</body>
</html>
