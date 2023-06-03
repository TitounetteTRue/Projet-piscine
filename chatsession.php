<?php
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";
$errorMessage = '';
//identifier BDD
$database = "sportify";
//connectez-vous dans BDD
$db_handle =mysqli_connect("localhost", "root","aaaa");
$db_found = mysqli_select_db($db_handle,$database);


    // On ouvre la session
    session_start();

    if (isset($_SESSION['ID_client'])) {
        // La session 'Id_Client' est active
        echo"Session active<br>".$_SESSION['Nom_client']."<br>";
    } else {
        // La session 'Id_Client' n'est pas active
        echo "Session NON active";
    }



  $message = isset($_POST["Chat"])? $_POST["Chat"] : "";
  $destinataire = isset($_POST["Destinataire"])? $_POST["Destinataire"] : "";

  $sql = "SELECT * FROM user WHERE Nom_user LIKE '$destinataire'";//on cherche si le destinataire existe dans la base de donnée des clients
  $result = mysqli_query($db_handle, $sql);
                
  $flag=0;
  if (mysqli_num_rows($result) == 0) {
      echo "<p>Destinataire non trouvé</p>";
      $flag=1;
  }




  $chat="<!DOCTYPE html>
  <html>
  
      <head>
          <meta charset='UTF-8'>
  
      </head>
      <body>  
          <div class='chat'>
          <!-- Ici on peut mettre des faux messages-->
         </div>
          <form action='chatsession.php' method='post' >
              <input type='text' name='Chat' placeholder='Ecrivez un message'>
              <input type='text' name='Destinataire' placeholder='Choisissez le destinataire'>
              <input type='submit' name='envoyer' value='Envoyer'>
              <br><br><br><input type='submit' name='Deconnexion' value='Deconnexion'>
          </form>
  
      </body>
  
  </html>
  ";


    if(isset($_POST["envoyer"])){

        //ON met ici le chat en code 
        //SELECTIONNER DANS LA Base de donnée nom de l'utilisateur correspondent a l'emaiil de l'utilisateur
        $ID = $_SESSION['ID_client'];
        $nom = $_SESSION['Nom_client'];
        //echo "ici le nom : ".$_SESSION['ID_client'];  
        date_default_timezone_set('Europe/Paris');
        $date = date('d/m/Y'); // donne la date au format '01/06/2023'
        $heure = date('H:i'); // donne l'heure au format '13:15'    

        if($message != ' ' and $message != '' and $message != '  ' and $flag !=1)
        {
            $sql = "INSERT INTO message (Message, Date, Heure, ID, Nom, Destinataire) VALUES ('$message','$date','$heure','$ID', '$nom', '$destinataire')";
            $result = mysqli_query($db_handle, $sql);
            if ($result === FALSE) {
                echo "ERREUR de requête". mysqli_error($db_handle);

            } else {
                //echo "Requête effectuer";
            }
        }
        //$sql = "SELECT * FROM message";
        $temp = $_SESSION['Nom_client'];
        $sql = "SELECT * FROM message WHERE '$temp' LIKE Destinataire";//on cherche dans tous les messages de la base de donnée si l'utilisateur est destinataire de certains si oui on lui affiche ses messages
        $result = mysqli_query($db_handle, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row['Date']." - ".$row['Heure']." - ".$row['Nom']. " : " . $row['Message']." --> ".$row['Destinataire']. "<br>";
            }
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($db_handle);
        }
        echo $chat;

        mysqli_close($db_handle);
    }
 
    if (isset($_POST["button1"]) ){
        if ($db_found) {
            //commencer le query


            $sql = "SELECT * from user WHERE Email_user LIKE '$email'
                AND Mdp_user LIKE '$mdp'";
                $result = mysqli_query($db_handle, $sql);
                
                if (mysqli_num_rows($result) == 0) {
                    echo "<p>Compte non trouvé</p>";
                }
                else{
                    while ($data = mysqli_fetch_assoc($result)){
                    
                    // On enregistre le login en session
                    $_SESSION['ID_client'] = $data['ID_user'];
                    $_SESSION['Nom_client'] = $data['Nom_user'];//on recupere le nom de l'utilisateur dans la session PHP
                    //$sql = "SELECT * FROM message";
                    $temp = $_SESSION['Nom_client'];
                    $sql = "SELECT * FROM message WHERE '$temp' LIKE Destinataire";//on cherche dans tous les messages de la base de donnée si l'utilisateur est destinataire de certains si oui on lui affiche ses messages
                    $result = mysqli_query($db_handle, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo $row['Date']." - ".$row['Heure']." - ".$row['Nom']. " : " . $row['Message']." --> ".$row['Destinataire']. "<br>";
                        }
                    } else {
                        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($db_handle);
                    }
                    echo $chat;

                    mysqli_close($db_handle);

                }
                    

                }
                
                
        } else {
            echo "<p>Database not found.</p>";
        }
    }else{
        
    }
     //end Rechercher

   if(isset($_POST["Deconnexion"]))
   {
    session_destroy();
   }
?>