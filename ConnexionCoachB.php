<?php
  // Definition des constantes et variables

  $email = isset($_POST["email"])? $_POST["email"] : "";
  $errorMessage = '';
 
  
    //identifier BDD
    $database = "sportify";
    //connectez-vous dans BDD
    $db_handle =mysqli_connect("localhost", "root","");
    $db_found = mysqli_select_db($db_handle,$database);
    if (isset($_POST["button1"])){
        if ($db_found) {
            //commencer le query
            
            $sql = "SELECT * from coach WHERE Email_Coach LIKE '$email'";
                $result = mysqli_query($db_handle, $sql);
                
                if (mysqli_num_rows($result) == 0) {
                    echo "<p>Compte non trouvé</p>";
                    header( 'Location: ConnexionCoachF.php');
                }
                else{
                    while ($data = mysqli_fetch_assoc($result)){
                    
                    // On ouvre la session
                    session_start();
                    // On enregistre le login en session
                    $_SESSION['Lgin'] = $data['Id_Coach'];
                    // On redirige vers le fichier admin.php
                    ///redirection vers une nouvelle page
                    header( 'Location: VotreCompteCoach.php'); /*CompteCoach.php*/
                    
                    exit();
                }
                }
        } else {
            echo "<p>Database not found.</p>";
        }
    } //end Rechercher
    mysqli_close($db_handle);
    
?>
