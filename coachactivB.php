<?php

//identifier BDD
    session_start();
    $database = "sportify";
    //connectez-vous dans BDD
    $db_handle =mysqli_connect("localhost", "root","Mezarnou");
    $db_found = mysqli_select_db($db_handle,$database);


    $sql="SELECT * FROM coach ";
    $result = mysqli_query($db_handle,$sql);
    if (mysqli_num_rows($result) == 0) {
        echo "<p>Aucun rendez vous trouvé.</p>";
        } else {
          while ($data = mysqli_fetch_assoc($result)) {
            if (isset($_POST[$data['Id_Coach']])) {
            if ($db_found) {
            
                $_SESSION['coach']=$data['Id_Coach'];
               
                header('Location: CoachDispoF.php');
            }
            
            
            } else {
                //echo "<p>Database not found.</p>";
            }
        }
    }

            //fermer la connexion
            mysqli_close($db_handle);?>