<?php

//identifier BDD
    session_start();
    $database = "sportify";
    //connectez-vous dans BDD
    $db_handle =mysqli_connect("localhost", "root","");
    $db_found = mysqli_select_db($db_handle,$database);

    $id=$_SESSION['Login'];

    $sql="SELECT * FROM calendrier_client WHERE Id_Client LIKE'$id'";
    $result = mysqli_query($db_handle,$sql);
    if (mysqli_num_rows($result) == 0) {
        echo "<p>Aucun rendez vous trouvé.</p>";
        } else {
          while ($data = mysqli_fetch_assoc($result)) {
            if (isset($_POST[$data['Id']])) {
            if ($db_found) {
                $seance=$data['Id'];
                //on supprime cet item par son ID
                $sql1 = "DELETE FROM calendrier_client WHERE Id =' $seance'";
                $res =mysqli_query($db_handle, $sql1);
                
                //echo "<p>Delete successful.</p>";
                header('Location: rendezvous.php');
            }
            
            
            } else {
                //echo "<p>Database not found.</p>";
            }
        }
    }

            //fermer la connexion
            mysqli_close($db_handle);?>