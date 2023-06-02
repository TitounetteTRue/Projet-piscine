<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commande Administrateur</title>
  
</head>
<body>
    
    <div id="wrapper">
        <div id="nav">
        <br>
                <a href="Accueil.php">Accueil</a>
                <a href="ToutParcourir.html">Tout Parcourir</a>
                <a href="Recherche.html">Recherche</a>
                <a href="Rendez-vous.html">Rendez-vous</a>
                <a href="VotreCompte.html">Votre Compte</a>
        </div>
        <div id="container">
            <div id="rightcolumn">

                <h1>Créer un compte Coach</h1>
                <form action="CreationCoachB.php" method="post"> 

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
                            <td>Photo </td>
                            <td><input type="text" name="photo"></td>     
                        </tr>
                        <tr>
                            <td>Spécialité</td>
                            <td><input type="radio" name="specialite" value="basketball" checked>
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
                            <td>Vidéo</td>
                            <td><input type="text" name="video"></td>
                        </tr>
                        <tr>
                            <td>CV</td>
                            <td><input type="text" name="CV"></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td><input type="email" name="email"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" name="button1" value="Ajouter">
                                <input type="submit" name="button2" value="Supprimer">
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