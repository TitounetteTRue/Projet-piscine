<!DOCTYPE html>
<html>
<head>
<title>Sportify: Commande Administrateur</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"></style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="affichage.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="affichage.css"></style>
  <meta charset="utf-8">
  
</head>
<body>
    
    <div id="wrapper">
            <header>
            <h1><b>Sportify: Consultation sportive</b></h1>
            <img src="Images\logo.png" alt="Logo du site">
            </header>   
          
          <nav>
              <a href="Accueil.php">Accueil</a>
              <a href="Tout parcourir.html">Tout parcourir</a>
              <a href="recherche.html">Recherche</a>
              <a href="rendezvous.php">Rendez-vous</a>
              <a href="VotreCompteAdmin.php">Votre compte</a>
            </nav>
         <section class="container">   
                <h1>Créer un compte Coach</h1>
                <form action="CreationCoachB.php" method="post"> 

                    <table>
                        <tr>
                            <td>Nom : </td>
                            <td><input type="text" name="nom"></td>
                        </tr>
                        <tr>
                            <td>Prenom :</td>
                            <td><input type="text" name="prenom"></td>
                        </tr>
                        <tr>
                            <td>Photo : </td>
                            <td><input type="text" name="photo"></td>     
                        </tr>
                        <tr>
                            <td>Spécialité : </td>

                            <td><input type="radio" name="specialite" value="musculation" checked>
                             Musculation<br>
                             <input type="radio" name="specialite" value="fitness" checked>
                             Fitness<br>
                             <input type="radio" name="specialite" value="biking" checked>
                             Biking<br>
                             <input type="radio" name="specialite" value="cardio-training" checked>
                             Cardio-training<br>
                             <input type="radio" name="specialite" value="cours collectifs" checked>
                             Cours Collectifs<br>
                             <input type="radio" name="specialite" value="basketball" checked>
                             Basketball<br>
                             <input type="radio" name="specialite" value="football">
                            Football<br> 
                            <input type="radio" name="specialite" value="rugby">
                            Rugby<br> 
                            <input type="radio" name="specialite" value="tennis">
                            Tennis<br> 
                            <input type="radio" name="specialite" value="natation">
                            Natation<br> 
                            <input type="radio" name="specialite" value="plongeon">
                            Plongeon<br> 
                            </td>  
                        </tr>
                        <tr>
                            <td>Vidéo :</td>
                            <td><input type="text" name="video"></td>
                        </tr>
                        <tr>
                            <td>CV :</td>
                            <td><input type="text" name="CV"></td>
                        </tr>
                        <tr>
                            <td>E-mail :</td>
                            <td><input type="email" name="email"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <br>
                                <input type="submit" name="button1" value="Ajouter">
                                <input type="submit" name="button2" value="Supprimer">
                            </td>
                        </tr>
                    </table>
                </form>
                <br>
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