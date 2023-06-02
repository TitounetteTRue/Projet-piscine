<!DOCTYPE html>
<html>
<header>
<title>Coach Disponibilite</title>
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
            <a href="#">Recherche</a>
            <a href="#">Rendez-vous</a>
            <a href="#">Votre compte</a>
          </nav>
          
          <section>
            <h2 class="h2">Coach</h2>
            <?php
            /// inspirer par ce calendrier https://www.c2script.com/scripts/calendrier-de-reservation-simple-en-php-s24.html
            //page: calendrier.php
            session_start();//pour maintenir la session active
            //connexion à la base de données:
            $database = "sportify";
            $db_handle = mysqli_connect('localhost','root','Mezarnou');
            $db_found = mysqli_select_db($db_handle, $database);

            /*
            * Module de connexion/déconnexion simplifié.
            * Vous pouvez adapter une variable de session de votre site afin de supprimer ce module
            */
                
                $coach=$_SESSION['coach'];
                
            /*
            * Fin du module de connexion/déconnexion
            */

            //$heures= array(1=>"9:00",2=>"9:20",3=>"9:40",4=>"10:00",5=>"10:20",6=>"10:40",7=>"11:00",8=>"11:20",9=>"11:40",10=>"12:00",11=>"14:00",12=>"14:20",13=>"14:40",14=>"15:00",15=>"15:20",16=>"15:40",17=>"16:00",18=>"16:20",19=>"16:40",20=>"17:00",21=>"17:20",22=>"17:40",23=>"18:00");
            //$jours = array(1=>"Lu",2=>"Ma",3=>"Me",4=>"Je",5=>"Ve",6=>"Sa",0=>"Di");
            $periodes = array(1=>"AM",2=>"PM");


            //initialisation du mois
           
            $StyleTh="text-shadow: 1px 1px 1px #000;color:black;width:75px;border-right:1px solid black;border-bottom:1px solid black;";
            ?>
            <p class="p4"> 
              <a>

              <?php
              $result = mysqli_query($db_handle,"SELECT * FROM coach WHERE Id_Coach LIKE'$coach'");
              
              if (mysqli_num_rows($result) == 0) {
              echo "<p>Coach not found.</p>";
                } else {
                    //on trouve les coach
                    //afficher le resultat
                    while ($data = mysqli_fetch_assoc($result)) {
                        
                        $image = $data['Photo_Coach'];
                        echo "<table >";
                        echo "<tr>";
                        echo "<img src='$image' height='120' width='100'>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>" . "Nom : " . $data['Nom_Coach'] ."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>" . "Prenom : " . $data['Prenom_Coach'] ."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>" . "E-mail : " . $data['Email_Coach'] ."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>" . "Spécialité : " .$data['Specialite_Coach']. "</td>";
                        echo "</tr>";
                        
                    }
                    echo "</table>";
                    unset($_SESSION['Id_Coach']);
                }?>
                
              </a>
            </p>

            <div class="text-center">
              <a href="#"><button class="btn btn-success">Disponible</button></a>
              <br>
            </div>
            <div class="text-center">
              <a href="#"><button class="btn btn-success">Contacter</button></a>
              <br>
            </div>
            <div class="text-center">
              <a href="#"><button class="btn btn-success">Prendre RDV</button></a>
              <br>
            </div>
            
            <table style="border:1px solid black;border-collapse:collapse;box-shadow: 10px 10px 5px #888888;">

                <tr style="border-right:1px solid black;">
                                <th style="<?php echo $StyleTh; ?>">Lundi</th>
                                <th style="<?php echo $StyleTh; ?>">Mardi</th>
                                <th style="<?php echo $StyleTh; ?>">Mercredi</th>
                                <th style="<?php echo $StyleTh; ?>">Jeudi</th>
                                <th style="<?php echo $StyleTh; ?>">Vendredi</th>
                                <th style="<?php echo $StyleTh; ?>">Samedi</th>
                                <th style="<?php echo $StyleTh; ?>">Dimanche</th>
                                
                </tr>
                <tr>
                    <?php
                    for($jour=1;$jour<=7;$jour++) {
                        for($periode=1;$periode<=2;$periode++){
                            if($periode==1){
                                echo '<td style="vertical-align:top;border-right:1px solid black;">
                                        <center><table style="width:100%;border-collapse:collapse;">';
                                        $periodes[$periode];
                            }
                        $JourReserve=0;
                        $req = mysqli_query($db_handle,"SELECT * FROM calendrier WHERE Periode ='$periode' AND Jour='$jour' AND Id_Coach='$coach'");
                        if(mysqli_num_rows($req)>0)$JourReserve=1;
                        ?>
                        <tr>
                            <td style="<?php echo $JourReserve==1?"background:#FF8888;":"background:#88FF88;"; ?>border-bottom:1px solid #eee;"><?php echo $periodes[$periode]; ?></td>
                            
                            <td style="<?php echo $JourReserve==1?"background:#FF8888;":"background:#88FF88;"; ?>border-bottom:1px solid #eee;">
                            </td>    
                        </tr>
                        <?php
                            if($periode=='2'){
                                echo '</table></center>
                                    </td>';
                            }
                        }
                    }
                    ?>
                </tr>
                
            </table>
             <br>
            
            <a class="link-offset-2 link-underline link-underline-opacity-0 link-opacity-50-hover" href="activite_sportives.html"> RETOUR A LA PAGE D'AVANT</a>

          </section>
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
