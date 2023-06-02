<!DOCTYPE html>
<html>
<head>
  <title>Sportify: Consultation sportive</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"></style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="affichage.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="affichage.css"></style>
  <link rel="stylesheet" type="text/css" href="cv.css"></style>
  <meta charset="utf-8">
</head>
<body>
  <div class="wrapper">
    <header>
      <h1><b>Sportify: Consultation sportive<b></h1>
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
      <div>
            <h2 class="h2">CV coach</h2>
            <br>
                
            <?php
   
            $fichier = 'cv.xml';
            $contenu = simplexml_load_file($fichier);
            //Zone de prise du fichier XML avec info base de données
            ?>

        </div>
      </section>
      
      <!--footer-->
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
