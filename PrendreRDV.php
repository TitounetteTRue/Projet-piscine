<!DOCTYPE html>
<html>
<header>
<title>Prendre rendez-vous</title>
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
          <h1><b>Sportify : Consultation sportive</b></h1>
          <img src="Images\logo.png" alt="Logo du site">
        </header>   
        
        <nav>
            <a href="Accueil.html">Accueil</a>
            <a href="Tout parcourir.html">Tout parcourir</a>
            <a href="rercherche.html">Recherche</a>
            <a href="rendezvous.php">Rendez-vous</a>
            <a href="Votrecompte.html">Votre compte</a>
          </nav>
          
          <section>
            <h2 class="h2"></h2>
<?php
//page: calendrier.php
session_start();//pour maintenir la session active
//connexion à la base de données:
$database = "sportify";
$db_handle = mysqli_connect('localhost','root','');
$db_found = mysqli_select_db($db_handle, $database);

/*
* Module de connexion/déconnexion simplifié.
* Vous pouvez adapter une variable de session de votre site afin de supprimer ce module
*/
	
	//pour vous connecter, entrez votresite.tld/calendrier.php?connexion=votremotdepasse
	
	if(isset($_SESSION['Login'])==0) {
		header('Location:ConnexionClientF.php');
	}
	if(isset($_GET['deconnexion'])) {
		unset($_SESSION['Login']);
		echo "Déconnecté avec succès!";
        header('Location:Accueil.php');
	}
	if(isset($_SESSION['Login'])) {
		echo '<p><a style="letter-spacing:0.5px;" href="?deconnexion">Déconnexion</a></p>';
        
	}
	$id=$_SESSION['Login'];
	$id_coach=$_SESSION['coach'];
	echo "coach ".$id_coach;
/*
* Fin du module de connexion/déconnexion
*/

$heures= array(1=>"9:00",2=>"9:20",3=>"9:40",4=>"10:00",5=>"10:20",6=>"10:40",7=>"11:00",8=>"11:20",9=>"11:40",10=>"12:00",11=>"14:00",12=>"14:20",13=>"14:40",14=>"15:00",15=>"15:20",16=>"15:40",17=>"16:00",18=>"16:20",19=>"16:40",20=>"17:00",21=>"17:20",22=>"17:40",23=>"18:00");
//$jours = array(1=>"Lu",2=>"Ma",3=>"Me",4=>"Je",5=>"Ve",6=>"Sa",0=>"Di");
$periodes = array(1=>"AM",2=>"PM");
$AM= array(1=>"9:00",2=>"9:20",3=>"9:40",4=>"10:00",5=>"10:20",6=>"10:40",7=>"11:00",8=>"11:20",10=>"12:00");
$PM=array(11=>"14:00",12=>"14:20",13=>"14:40",14=>"15:00",15=>"15:20",16=>"15:40",17=>"16:00",18=>"16:20",19=>"16:40",20=>"17:00",21=>"17:20",22=>"17:40",23=>"18:00");


//initialisation du mois

?>
<table id="recap">
	<tr>
		<td style="background:#FF8888;width:15px;height:15px;"></td><td>Réservé</td>
	</tr>
	<tr>
		<td style="background:#88FF88;width:15px;height:15px;"></td><td>Disponible</td>
	</tr>
</table>
<?php
if(isset($_SESSION['Login'])){
	if(
	//isset($_GET['periode'] AND preg_match("#^(1|2)$#",$_GET['periode'])) AND
	//isset($_GET['jour'] AND preg_match("#^[1-7]{1}$#",$_GET['jour'])) AND
	isset($_GET['choix']) AND preg_match("#^(0|1)$#",$_GET['choix'])) {
		$heur=$_GET['heur'];
		$jour=$_GET['jour'];
		if($_GET['choix']==1){
			
			$sql="INSERT INTO calendrier_client(Id_Coach, Id_Client, Jour, Heur)
			VALUES('$id_coach','$id','$jour','$heur')";
			
			if(mysqli_query($db_handle,$sql)) {
				
				echo "Jour mise en \"réservé\" avec succès !";
			} else {
				
				echo "Une erreur s'est produite1:<br />".mysqli_error($db_handle);
			}
		} if($_GET['choix']==0) {
			if(mysqli_query($db_handle,"DELETE FROM calendrier_client WHERE Id_Coach='$id_coach' AND Id_Client='$id' AND heur='$heur' AND Jour='$jour'")) {
				echo "Journée mise en \"disponible\" avec succès !";
			} else {
				echo "Une erreur s'est produite2:<br />".mysqli_error($db_handle);
			}
		}
	}
}
$StyleTh="text-shadow: 1px 1px 1px #000;color:black;width:75px;border-right:1px solid black;border-bottom:1px solid black;";
?>
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
			for($heur=1;$heur<=23;$heur++){
				if($heur==1){
					echo '<td style="vertical-align:top;border-right:1px solid black;">
							<center><table style="width:100%;border-collapse:collapse;">';
							$heures[$heur];
				}
			$JourReserve=0;
			$req = mysqli_query($db_handle,"SELECT * FROM calendrier_client WHERE heur ='$heur' AND Jour='$jour' AND Id_Coach='$id_coach'");
			if(mysqli_num_rows($req)>0)$JourReserve=1;
			
			
			$result = mysqli_query($db_handle,"SELECT periode FROM calendrier WHERE Jour='$jour' AND Id_Coach='$id_coach'");
			//echo $result->num_rows;
			//if(mysqli_num_rows($result)>0)$JourReserve=2;
			?>
			<tr>
				<td style="<?php echo $JourReserve==1?"background:#FF8888;":"background:#88FF88;"; ?>border-bottom:1px solid #eee;"><?php echo $heures[$heur]; ?></td>
				<?php 
				if(isset($_SESSION['Login'])) { ?>
				<td style="<?php echo $JourReserve==1?"background:#FF8888;":"background:#88FF88;"; ?>border-bottom:1px solid #eee;">
				<a href="?jour=<?php echo $jour; ?>&amp;heur=<?php echo $heur; ?>&amp; choix=<?php echo $JourReserve==1?0:1; ?>#recap">
				<img src="Images/images/<?php echo $JourReserve; ?>.png" alt="Action" style="width:13px;" title="<?php echo $JourReserve==1?"Mettre ce jour en Disponible":"Mettre ce jour en Réservé"; ?>" />
			</a></td>
				<?php } ?>
			</tr>
			<?php
				if($heur=='23'){
					echo '</table></center>
						</td>';
				}
			}
		}
		?>
	</tr>
	
</table>
<br>
            
            <a class="link-offset-2 link-underline link-underline-opacity-0 link-opacity-50-hover" href="Tout parcourir.html"> RETOUR A LA PAGE PRECEDENTE</a>

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
      <p class="text-center">Copyright @2023 | Designed With by <a href="Accueil.php">Sportify</a></p>
    </footer>
        </div>
</body>
</html>
