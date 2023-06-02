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
      <a href="#" id="pageencours">Recherche</a>
      <a href="rendezvous.php">Rendez-vous</a>
      <a href="#">Votre compte</a>
    </nav>
<?php 

$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";
$specialite = isset($_POST["specialite"])? $_POST["specialite"] : "";

//identifier BDD
$database = "sportify";
//connectez-vous dans BDD
$db_handle =mysqli_connect("localhost", "root","Mezarnou");
$db_found = mysqli_select_db($db_handle,$database);


if (isset($_POST["barre"])){
        if ($db_found) {
            //commencer le query
            $sql = "SELECT * FROM user";
            if ($nom != "") {
                //on recherche le livre par son titre
                $sql .= " WHERE Nom_user LIKE '%$nom%'";
                //on cherche ce livre par son auteur aussi
                if ($prenom != "") {
                    $sql .= " AND Prenom_user LIKE '%$prenom%'";
                 }
                 if ($email != "") {
                    $sql .= " AND Email_user LIKE '%$email%'";
                 }
             }
            $result = mysqli_query($db_handle, $sql);
            //regarder s'il y a des resultats
            if (mysqli_num_rows($result) == 0) {
                echo "<p> People not found.</p>";
            } else {
                //on trouve la personne
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>" . "ID" . "</th>";
                echo "<th>" . "Nom" . "</th>";
                echo "<th>" . "Prenom" . "</th>";
                echo "<th>" . "E-mail" . "</th>";
                
                //afficher le resultat
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $data['Id_user'] . "</td>";
                    echo "<td>" . $data['Nom_user'] . "</td>";
                    echo "<td>" . $data['Prenom_user'] . "</td>";
                    echo "<td>" . $data['Email_user'] . "</td>";
                    
                    echo "</tr>";
                }
                echo "</table>";
            }
        } else {
            echo "<p>Database not found.</p>";
        }
    } //end Rechercher
    //fermer la connexion
    mysqli_close($db_handle);
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
