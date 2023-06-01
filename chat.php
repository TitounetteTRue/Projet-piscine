<?php
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
  $email = isset($_POST["email"])? $_POST["email"] : "";
  $errorMessage = '';

    // On ouvre la session
    session_start();

    if (isset($_SESSION['ID_client'])) {
        // La session 'Id_Client' est active
        echo"Session active";
    } else {
        // La session 'Id_Client' n'est pas active
        echo "Session NON active";
    }
    


  $message = isset($_POST["Chat"])? $_POST["Chat"] : "";

  $chat="<!DOCTYPE html>
  <html>
  
      <head>
          <meta charset='UTF-8'>
  
      </head>
      <body>  
          <div class='chat'>
          <!-- Ici on peut mettre des faux messages-->
         </div>
          <form action='chat.php' method='post' >
              <input type='text' name='Chat' placeholder='Ecrivez un message'>
          </form>
  
      </body>
  
  </html>
  ";
 
  
    //identifier BDD
    $database = "sportify";
    //connectez-vous dans BDD
    $db_handle =mysqli_connect("localhost", "root","aaaa");
    $db_found = mysqli_select_db($db_handle,$database);
    if (isset($_POST["button1"]) or isset($_POST["Chat"])){
        if ($db_found) {
            //commencer le query
            
            
            $sql = "SELECT * from client WHERE Email_Client LIKE '$email'
                AND Mdp_Client LIKE '$mdp'";
                $result = mysqli_query($db_handle, $sql);
                
                if (mysqli_num_rows($result) == 0) {
                    echo "<p>Compte non trouvé</p>";
                }
                else{
                    while ($data = mysqli_fetch_assoc($result)){
                    
                    // On enregistre le login en session
                    $_SESSION['ID_client'] = $data['Id_Client'];
                    $_SESSION['Nom_client'] = $data['Nom_Client'];

                }
                    

                }
                //ON met ici le chat en code 
                //SELECTIONNER DANS LA Base de donnée nom de l'utilisateur correspondent a l'emaiil de l'utilisateur
                $ID = $_SESSION['ID_client'];
                $nom = $_SESSION['Nom_client'];
                //echo "ici le nom : ".$_SESSION['ID_client'];  
                date_default_timezone_set('Europe/Paris');
                $date = date('d/m/Y'); // donne la date au format '01/06/2023'
                $heure = date('H:i'); // donne l'heure au format '13:15'    
                
                if($message != ' ' and $message != '' and $message != '  ')
                {
                    $sql = "INSERT INTO message (Message, Date, Heure, ID, Nom) VALUES ('$message','$date','$heure','$ID', '$nom')";
                    $result = mysqli_query($db_handle, $sql);
                    if ($result === FALSE) {
                        echo "ERREUR de requête". mysqli_error($db_handle);
                
                    } else {
                        echo "Requête effectuer";
                    }
                }
                
                $sql = "SELECT * FROM message";
                $result = mysqli_query($db_handle, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Date']." - ".$row['Heure']." - ".$row['Nom']. " : " . $row['Message']."<br>";
                    }
                } else {
                    echo "Erreur lors de l'exécution de la requête : " . mysqli_error($db_handle);
                }
                echo $chat;

                mysqli_close($db_handle);
        } else {
            echo "<p>Database not found.</p>";
        }
    }else{
        echo "test";
    }
     //end Rechercher

   
?>