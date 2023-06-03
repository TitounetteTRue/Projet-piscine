<!DOCTYPE html>
<html>
<head>
<title>Sportify :CONNEXION CLIENT</title>
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
              <a href="recherche.php">Recherche</a>
              <a href="rendezvous.php">Rendez-vous</a>
              <a href="Votrecompte.html">Votre compte</a>
            </nav>
            
            <section class="nav">
            <div id="rightcolumn">

                <h1>Se connecter </h1>

                <form action="ConnexionCoachB.php" method="post"> <!--Il faut écrire le traitementFormulaire.php-->

    <table>
        <tr>
            <td>E-mail : </td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <br>
                <input type="submit" name="button1" value="Se connecter">
            </td>
        </tr>
    </table>
</form>
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
        <p class="text-center">Copyright @2023 | Designed With by <a href="accueil.html">Sportify</a></p>
      </footer>
          </div>
  </body>
  </html>
  