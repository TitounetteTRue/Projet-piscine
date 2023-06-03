<?php
//saisir les données du formulaire
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $sexe = isset($_POST["sexe"])? $_POST["sexe"] : "";
    $naissance = isset($_POST["naissance"])? $_POST["naissance"] : "";
    $telephone = isset($_POST["telephone"])? $_POST["telephone"] : "";
    $email = isset($_POST["email"])? $_POST["email"] : "";
    $mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
    //identifier BDD
    $database = "sportify";
    //connectez-vous dans BDD
    $db_handle =mysqli_connect("localhost", "root","Mezarnou");
    $db_found = mysqli_select_db($db_handle,$database);

//si le bouton (Ajouter) est cliqué
    if (isset($_POST["button1"])) {
        if ($db_found) {
            //on cherche le client
            $sql = "SELECT * FROM client";
            //avec son nom et prenom
            if ($nom != "") {
                $sql .= " WHERE Nom_Client LIKE '%$nom%'";
                if ($prenom != "") {
                    $sql .= " AND Prenom_Client LIKE '%$prenom%'";
            }
        }
        $result = mysqli_query($db_handle, $sql);
        //regarder s'il y a de resultat
        if (mysqli_num_rows($result) != 0) {
            echo "<p>Vous avez déjà un compte. Duplicates not allowed.</p>";
        } else {
            session_start();
            //on ajoute ce client
            $sql = "INSERT INTO client(Nom_Client, Prenom_Client, Sexe_Client, Date_Naissance, Mdp_Client, Email_Client, Num_telephone)
            VALUES('$nom', '$prenom', '$sexe', '$naissance', '$mdp','$email','$telephone')";
            
            $result =mysqli_query($db_handle, $sql);
            
            echo "<p>Add successful.</p>";
            //on affiche le nouveau client ajouté
            $sql = "SELECT * FROM client";
            if ($nom != "") {
                //on recherche le client par son nom
                $sql .= " WHERE Nom_Client LIKE '%$nom%'";
                //on cherche ce client par son prenom aussi
                if ($prenom != "") {
                    $sql .= " AND Prenom_Client LIKE '%$prenom%'";
                }
            }
            $result = mysqli_query($db_handle, $sql);
            
            while ($data = mysqli_fetch_assoc($result)) {
                $id=$data['Id_Client'];
                $sql1 = "INSERT INTO user(Nom_user, Prenom_user, Mdp_user, Email_user, Id_user)
                VALUES('$nom', '$prenom', '$mdp', '$email','$id')";
                $result1 =mysqli_query($db_handle, $sql1);
                $_SESSION['Id']=$id;
               
            }
            
            }header('Location: VotreCompteClient.php');
        } else {
            echo "<p>Database not found.</p>";
        }
      } //end Creation de compte Client
    mysqli_close($db_handle);
    ?>