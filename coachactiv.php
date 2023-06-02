
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
      <h1>Sportify: Consultation sportive</h1>
      <img src="C:\Users\vylka\Documents\projet_piscine\1296285.jpg" alt="Logo du site">
    </header>   
    
    <nav>
        <a href="Accueil.html">Accueil</a>
        <a href="Tout parcourir.html">Tout parcourir</a>
        <a href="#">Recherche</a>
        <a href="#">Rendez-vous</a>
        <a href="#">Votre compte</a>
      </nav>
      
      <section>
      <?php 
        echo $_SERVER['HTTP_REFERER'];
        $database = "sportify";
        //connectez-vous dans BDD
        $db_handle =mysqli_connect("localhost", "root","Mezarnou");
        $db_found = mysqli_select_db($db_handle,$database);

        if ($db_found) {
          //commencer le query
          $sql = "SELECT * FROM coach ";
          
          $result = mysqli_query($db_handle, $sql);
          //regarder s'il y a des resultats
          if (mysqli_num_rows($result) == 0) {
              echo "<p>Coach not found.</p>";
          } else {
              //on trouve les coach
              echo "<table >";
              echo "<tr>";
              
              echo "<th>" . "Nom" . "</th>";
              echo "<th>" . "Prenom" . "</th>";
              echo "<th>" . "E_mail" . "</th>";
              echo "<th>" . "Spécialité" . "</th>";
              echo "<th>" . "Photo" . "</th>";
              //afficher le resultat
              while ($data = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  
                  echo "<td>" . $data['Nom_Coach'] . "</td>";
                  echo "<td>" . $data['Prenom_Coach'] . "</td>";
                  echo "<td>" . $data['Email_Coach'] . "</td>";
                  echo "<td>" . $data['Specialite_Coach'] . "</td>";
                  $image = $data['Photo_Coach'];
                  echo "<td>" . "<img src='$image' height='120' width='100'>" . "</td>";
                  echo "</tr>";
              }
              echo "</table>";
          }
      } else {
          echo "<p>Database not found.</p>";
      }
      ?>
        COACHS activité SPORTIVES
      </section>
      
      <footer class="footer">
        <div class="container bottom_border">
          <div class="row">
            <div class=" col-sm-4 col-md col-sm-4  col-12 col">
              <h5 class="headin5_amrc col_white_amrc pt2">Où nous trouver</h5>
              <p><i class="fa fa-location-arrow"></i> 3 rue Jean Massiet</p>
              <p><i class="fa fa-phone"></i>  +33767327748  </p>
              <p><i class="fa fa fa-envelope"></i> info@example.com  </p>
            </div>
          </div>
        </div>
        <p class="text-center">Copyright @2017 | Designed With by <a href="accueil.html">Sportify</a></p>
      </footer>
    </div>
  </body>
  </html>