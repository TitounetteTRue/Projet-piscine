<!DOCTYPE html>
<html>
<head>
  <title>Sportify: Creation d'un compte</title>
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
      <a href="recherche.php">Recherche</a>
      <a href="rendezvous.php">Rendez-vous</a>
      <a href="Votrecompte.html">Votre compte</a>
    </nav>
    
    <section>
    <h1>Créer un compte</h1>
                <form action="CreationClientB.php" method="post"> 

                    <table >
                        <tr>
                            <td>Nom </td>
                            <td><input type="text" name="nom"></td>
                        </tr>
                        <tr>
                            <td>Prenom</td>
                            <td><input type="text" name="prenom"></td>
                        </tr>
                        <tr>
                            <td>Sexe </td>
                            <td><input type="radio" name="sexe" value="masculin" checked>
                             Masculin<br>
                             <input type="radio" name="sexe" value="feminin">
                            Féminin<br> 
                            </td>             
                        </tr>
                        <tr>
                            <td>Date de naissance</td>
                            <td><input type="date" name="naissance"></td>
                        </tr>
                        <tr>
                            <td>Numero de téléphone </td>
                            <td><input type="number" name="telephone"></td>
                        </tr>
                        <tr>
                            <td>E_mail</td>
                            <td><input type="email" name="email"></td>
                        </tr>
                        <tr>
                            <td>Votre mot de passe</td>
                            <td><input type="text" name="mdp"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" name="button1" value="Créer">
                            </td>
                        </tr>
                    </table>
                </form>
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
