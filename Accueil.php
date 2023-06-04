  <!DOCTYPE html>
  <html>
  <header>
  <title>Sportify: Consultation sportive</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"></style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="affichage.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="affichage.css"></style>
  <script src="ajout.js" defer></script>
  <meta charset="utf-8">
  </header>
  
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
            
            <section class="text-center">
              <br> 
          <p><b>Bienvenue sur le le site Sportify spécialisé dans la consultation sportive.</p></h3>
          <p><b>Nous vous offrons un service de consultation personnalisée pour vous aider à atteindre vos objectifs.Que vous soyez un athlète professionnel ou un amateur passionné, <br>notre équipe d'experts est là pour vous guider et vous accompagner.</b></p>
          <p><b>Que vous ayez besoin de conseils en nutrition, d'un programme d'entraînement sur mesure ou d'une évaluation de votre condition physique, <br>nous sommes là pour répondre à vos besoins.</b></p>
          <p><b>Explorez nos services et n'hésitez pas à nous contacter pour prendre rendez-vous. <br>Nous sommes impatients de vous aider à optimiser vos performances sportives et à vous maintenir en bonne santé.</b></p>
          <br>
          <br>
          <img id="1" src="Images\basketball.png" height="170" width="190"/>
          <img id="2" src="Images\football.png" height="170" width="190"/>
          <img id="3" src="Images\musculation.png" height="170" width="190"/>
          <img id="4" src="Images\fitness.png" height="170" width="190"/>
          <img id="5" src="Images\natation.png" height="170" width="190"/>
        <br>
        <br>

          <h2>Événements</h2>
          <div id="eventsContainer"></div> 
          <?
          ///Revoir Affichage
         $database = "sportify";
         //connectez-vous dans BDD
         $db_handle =mysqli_connect("localhost", "root","");
         $db_found = mysqli_select_db($db_handle,$database);

          $sql="SELECT * FROM event";
          $result = mysqli_query($db_handle,$sql);
              
              if (mysqli_num_rows($result) == 0) {
              echo "<p>"."Event not found"."</p>";
                } 
                else {
                    //on trouve les coach
                    //afficher le resultat
                    session_start();
                    echo" <div class='row'>";
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo" <div class='col-lg-4 col-md-4 col-sm-12'>";
                        $image = $data['Image_event'];
                        echo "<br><img src='$image' height='150' width='300'>";
                        echo "<p>" . "Evenement : " . $data['Nom_event'] ."<br>";
                        echo  "Date : " . $data['Date_event'] ."<br>";
                        echo "</div>";
                        
                    }
                    echo "</div>";
                    
                }
          }
          ?>
          <br>
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
        <p class="text-center">Copyright @2023 | Designed With by <a href="Accueil.php">Sportify</a></p>
      </footer>
          </div>
  </body>
  </html>
  