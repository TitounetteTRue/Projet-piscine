<?php
    //saisir les données du formulaire
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $photo= isset($_POST["photo"])? $_POST["photo"] : "";
    $specialite = isset($_POST["specialite"])? $_POST["specialite"] : "";
    $video = isset($_POST["video"])? $_POST["video"] : "";
    $CV = isset($_POST["CV"])? $_POST["CV"] : "";
    $email = isset($_POST["email"])? $_POST["email"] : "";
    //identifier BDD
    $database = "sportify";
    //connectez-vous dans BDD
    $db_handle =mysqli_connect("localhost", "root","Mezarnou");
    $db_found = mysqli_select_db($db_handle,$database);

    //si le bouton1 (Ajouter) est cliqué
    if (isset($_POST["button1"])) {
        if ($db_found) {
            //on cherche le coach
            $sql = "SELECT * FROM coach";
            //avec son nom et prenom
            if ($nom != "") {
                $sql .= " WHERE Nom_Coach LIKE '%$nom%'";
                if ($prenom != "") {
                    $sql .= " AND Prenom_Coach LIKE '%$prenom%'";
            }
        }
        $result = mysqli_query($db_handle, $sql);
        //regarder s'il y a de resultat
        if (mysqli_num_rows($result) != 0) {
            echo "<p>Ce coach exsiste déjà dans la base de donné</p>";
            //header('Location: CommandeAdminF.php');
           // exit();
        } else {
            //on ajoute ce coach
            $sql = "INSERT INTO coach(Nom_Coach, Prenom_Coach, Photo_Coach, Specialite_Coach, Video_Coach, CV_Coach, Email_Coach)
            VALUES('$nom', '$prenom', '$photo', '$specialite', '$video','$CV','$email')";
            $result =mysqli_query($db_handle, $sql);
            echo "<p>Add successful.</p>";
            //on affiche le nouveau coach ajouté
            $sql = "SELECT * FROM coach";
            if ($nom != "") {
                //on recherche le coach par son nom
                $sql .= " WHERE Nom_Coach LIKE '%$nom%'";
                //on cherche ce coach par son prenom aussi
                if ($prenom != "") {
                    $sql .= " AND Prenom_Coach LIKE '%$prenom%'";
                }
            }
            $result = mysqli_query($db_handle, $sql);
            echo "<h2>" . "Informations sur le nouveau coach ajouté:" . "</h2>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>" . "ID" . "</th>";
            echo "<th>" . "Nom" . "</th>";
            echo "<th>" . "Prenom" . "</th>";
            echo "<th>" . "Photo" . "</th>";
            echo "<th>" . "Specialite" . "</th>";
            echo "<th>" . "Video" . "</th>";
            echo "<th>" . "CV" . "</th>";
            echo "<th>" . "E-mail" . "</th>";
            //afficher le resultat
            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $data['Id_Coach'] . "</td>";
                echo "<td>" . $data['Nom_Coach'] . "</td>";
                echo "<td>" . $data['Prenom_Coach'] . "</td>";
                $image = $data['Photo_Coach'];
                echo "<td>" . "<img src='$image' height='120' width='100'>" . "</td>";
                echo "<td>" . $data['Spécialité_Coach'] . "</td>";
                $image2 = $data['Video_Coach'];
                echo "<td>" . "<img src='$image2' height='120' width='100'>" . "</td>";
                echo "<td>" . $data['CV_Coach'] . "</td>";
                echo "<td>" . $data['Email_Coach'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            }
           // header('Location: CommandeAdminF.php');
        } else {
            echo "<p>Database not found.</p>";
        }
    }
            //*************************************
    //si le bouton2 (Supprimer) est cliqué
    if (isset($_POST["button2"])) {
    if ($db_found) {
        //on cherche le livre
        $sql = "SELECT * FROM coach";
        //avec son titre et auteur
        if ($nom != "") {
            $sql .= " WHERE Nom_Coach LIKE '%$nom%'";
            if ($prenom != "") {
                $sql .= " AND Prenom_Coach LIKE '%$prenom%'";
        }
    }
    $result = mysqli_query($db_handle, $sql);
    //regarder s'il y a de resultat
    if (mysqli_num_rows($result) == 0) {
        //ce Coach n'existe pas
        echo "<p>Cannot delete. Coach not found.</p>";
        //header('Location: CommandeAdminF.php');
    } else {
        //on supprime cet item
        while ($data = mysqli_fetch_assoc($result)) {
            $id = $data['Id_Coach'];
        }
        //on supprime cet item par son ID
        $sql = "DELETE FROM coach WHERE Id_Coach = $id";
        $result =mysqli_query($db_handle, $sql);
        echo "<p>Delete successful.</p>";
    }
    //header('Location: CommandeAdminF.php');
    } else {
        echo "<p>Database not found.</p>";
    }
}
    //fermer la connexion
    mysqli_close($db_handle);?>