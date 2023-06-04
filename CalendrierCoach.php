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
	
	//pour vous connecter, entrez votresite.tld/calendrier.php?connexion=votremotdepasse
	if(isset($_GET['deconnexion'])) {
		unset($_SESSION['Lgin']);
		echo "Déconnecté avec succès!";
        header('Location:ConnexionCoachF.php');
	}
	if(isset($_SESSION['Id_Coach'])) {
		echo '<p><a style="letter-spacing:0.5px;" href="?deconnexion">Déconnexion</a></p>';
        
	}
	$coach=$_SESSION['Lgin'];
	echo $coach;
/*
* Fin du module de connexion/déconnexion
*/

//$heures= array(1=>"9:00",2=>"9:20",3=>"9:40",4=>"10:00",5=>"10:20",6=>"10:40",7=>"11:00",8=>"11:20",9=>"11:40",10=>"12:00",11=>"14:00",12=>"14:20",13=>"14:40",14=>"15:00",15=>"15:20",16=>"15:40",17=>"16:00",18=>"16:20",19=>"16:40",20=>"17:00",21=>"17:20",22=>"17:40",23=>"18:00");
//$jours = array(1=>"Lu",2=>"Ma",3=>"Me",4=>"Je",5=>"Ve",6=>"Sa",0=>"Di");
$periodes = array(1=>"AM",2=>"PM");


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
if(isset($_SESSION['Id_Coach'])){
	if(
	//isset($_GET['periode'] AND preg_match("#^(1|2)$#",$_GET['periode'])) AND
	//isset($_GET['jour'] AND preg_match("#^[1-7]{1}$#",$_GET['jour'])) AND
	isset($_GET['choix']) AND preg_match("#^(0|1)$#",$_GET['choix'])) {
		$periode=$_GET['periode'];
		$jour=$_GET['jour'];
		if($_GET['choix']==1){
			
			$sql="INSERT INTO calendrier(Id_Coach, Periode, Jour)
			VALUES('$coach','$periode','$jour')";
			
			if(mysqli_query($db_handle,$sql)) {
				
				echo "Jour mise en \"réservé\" avec succès !";
			} else {
				echo $_GET['periode'];
				echo $_GET['jour'];
				echo "Une erreur s'est produite1:<br />".mysqli_error($db_handle);
			}
		} else {
			if(mysqli_query($db_handle,"DELETE FROM calendrier WHERE Id_Coach='$coach' AND Periode='$periode' AND Jour='$jour'")) {
				echo "Journée mise en \"disponible\" avec succès !";
			} else {
				echo "Une erreur s'est produite2:<br />".mysqli_error($db_handle);
			}
		}
	}
}
$StyleTh="text-shadow: 1px 1px 1px #000;color:white;width:75px;border-right:1px solid black;border-bottom:1px solid black;";
?>
<table style="border:1px solid black;border-collapse:collapse;box-shadow: 10px 10px 5px #888888;">

	<tr style="border-right:1px solid black;">
					<th style="<?php echo $StyleTh; ?>background:#FF3333">Lundi</th>
					<th style="<?php echo $StyleTh; ?>background:#FF9933">Mardi</th>
					<th style="<?php echo $StyleTh; ?>background:#FFF833">Mercredi</th>
					<th style="<?php echo $StyleTh; ?>background:#A7FF33">Jeudi</th>
					<th style="<?php echo $StyleTh; ?>background:#3EFF30">Vendredi</th>
					<th style="<?php echo $StyleTh; ?>background:#30FF83">Samedi</th>
					<th style="<?php echo $StyleTh; ?>background:#33FFEB">Dimanche</th>
					
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
				<?php 
				if(isset($_SESSION['Id_Coach'])) { ?>
				<td style="<?php echo $JourReserve==1?"background:#FF8888;":"background:#88FF88;"; ?>border-bottom:1px solid #eee;">
				<a href="?jour=<?php echo $jour; ?>&amp;periode=<?php echo $periode; ?>&amp; choix=<?php echo $JourReserve==1?0:1; ?>#recap">
				<img src="Images/images/<?php echo $JourReserve; ?>.png" alt="Action" style="width:13px;" title="<?php echo $JourReserve==1?"Mettre ce jour en Disponible":"Mettre ce jour en Réservé"; ?>" />
			</a></td>
				<?php } ?>
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