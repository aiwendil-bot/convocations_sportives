<?php

function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}
$user = valid_donnees($_POST["user"]);
$pwd = valid_donnees($_POST["pwd"]);
    

//redirection vers les bonnes vues selon le role de l'utilisateur
if(isset($user) && isset($pwd))
{
        if($user == "secretaire" && $pwd == "secretaire"){
            header("location:CSecretaire.php");
        }
        else if($user == "entraineur" && $pwd == "entraineur"){
            header("location:CEntraineur.php");
        }
        else if($user == "visiteur" && $pwd == "visiteur"){
            header("location:CVisiteur.php");
        }
        else {
            /*$connexionError = true ;*/
            
            header("location:../indexError.php");
            
    }
}
else 
{
    echo "<script>alert(\"veuillez remplir les champs\")</script>";
    header("location:../index.php");
}



?>