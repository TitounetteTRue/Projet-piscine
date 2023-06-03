<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion Client</title>
  
</head>
<body>
    
    <div id="wrapper">
        <div id="nav">
        <br>
                <a href="Accueil.html">Accueil</a>
                <a href="Tout Parcourir.html">Tout Parcourir</a>
                <a href="Recherche.html">Recherche</a>
                <a href="Rendez-vous.php">Rendez-vous</a>
                <a href="VotreCompte.html">Votre Compte</a>
        </div>
        <div id="container">
            <div id="rightcolumn">

                <h1>Se connecter </h1>
                
                <p>Vous n'avez pas de compte? <a href="CreationClientF.php">Créer un compte</a> <p> <!--Il faut créer un lien vers la création d'un autre compte -->
                <form action="ConnexionClientB.php" method="post"> <!--Il faut écrire le traitementFormulaire.php-->

                    <table >
                        <tr>
                            <td>E-mail </td>
                            <td><input type="email" name="email"></td>
                        </tr>
                        <tr>
                            <td>Mot de passe</td>
                            <td><input type="text" name="mdp"></td>
                        </tr>
                       
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" name="button1" value="Se connecter">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            
        </div>
        <div id="footer">
        Copyright &copy; 2023, EuxCEux<br />
                     <a href="mailto:EuxCEux@gmail.com">EuxCEux@gmail.com </a>
                </div>
        </div> 
    </div>
</body>
</html>