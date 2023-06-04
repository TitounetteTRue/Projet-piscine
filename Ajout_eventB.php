<?php
//saisir les données du formulaire
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $image= isset($_POST["image"])? $_POST["image"] : "";
    $date = isset($_POST["date"])? $_POST["date"] : "";
    //identifier BDD
    $database = "sportify";
    //connectez-vous dans BDD
    $db_handle =mysqli_connect("localhost", "root","");
    $db_found = mysqli_select_db($db_handle,$database);

//si le bouton (Ajouter) est cliqué
    if (isset($_POST["button1"])) {
        if ($db_found) {
            //on cherche le event
            $sql = "SELECT * FROM event";
            //avec son nom 
            if ($nom != "") {
                $sql .= " WHERE Nom_event LIKE '%$nom%'";

            }
        }
        $result = mysqli_query($db_handle, $sql);
        //regarder s'il y a de resultat
        if (mysqli_num_rows($result) != 0) {
            echo "<p>Cet event existe deja .</p>";
        } else {
            $sql = "INSERT INTO event(Nom_event,Image_event,Date_event)
            VALUES('$nom','$image','$date')";
            
            $result =mysqli_query($db_handle, $sql);
            
            echo "<p>Add successful.</p>";
            //on affiche le nouveau event ajouté
            $sql = "SELECT * FROM event";
            if ($nom != "") {
                //on recherche l'event par son nom
                $sql .= " WHERE Nom_event LIKE '%$nom%'";
            }
            $result = mysqli_query($db_handle, $sql);
            echo "<h2>" . "Informations sur le nouveau event ajouté:" . "</h2>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>" . "ID" . "</th>";
            echo "<th>" . "Nom" . "</th>";
            echo "<th>" . "Image" . "</th>";
            echo "<th>" . "Date" . "</th>";
            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $data['Id_event'] . "</td>";
                echo "<td>" . $data['Nom_event'] . "</td>";
                $image = $data['Image_event'];
                echo "<td>" . "<img src='$image' height='120' width='100'>" . "</td>";
                echo "<td>" . $data['Date_event'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            }
            }  
            else {
                echo "<p>Database not found.</p>";
            } //end Creation events
    mysqli_close($db_handle);
    header('Location: VotreCompteAdmin.php');
    ?>