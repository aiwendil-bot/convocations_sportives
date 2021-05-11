<?php
    require '../Modèles/Modele.php';
    $pdo = connexpdo();

    //var_dump($_POST);

    /*$data = json_decode(file_get_contents("php://input"),true); // filegetcontent donne input par php , json_decode + true = array

    $valeur = $data["valeur"];
    $ligne = $data["vLigne"];
    $colonne = $data["vColonne"];*/

    $valeur = $_POST["valeur"];
    $ligne = $_POST["vLigne"];
    $colonne = $_POST["vColonne"];
    

    
    $requete = $pdo->prepare("UPDATE absences SET `$colonne` = :param1 where joueur = :param2");
    $requete->bindParam(':param1',$valeur);
    $requete->bindParam(':param2',$ligne);
    /*$requete->bindParam(':param3',$colonne);*/
    $requete->execute();

    // $r = $requete->execute();
    /*if($r === 1){
        echo "Success";
    } else if($r == 0){
        echo "Error";
    } else {
        echo "Unknown error";
    }*/
    
?>