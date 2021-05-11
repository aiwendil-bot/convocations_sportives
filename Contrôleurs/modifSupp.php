<?php

require '../Modèles/Modele.php';
    $pdo = connexpdo();

    $id = intval($_POST["id"]);
    $requete = $pdo->prepare("DELETE FROM rencontre where id = :id");
    $requete2 = $pdo->prepare("DELETE FROM convocation where idr = :id");
    $requete->bindParam(':id',$id);
    $requete2->bindParam(':id',$id);
    $requete->execute();
    $requete2->execute();


?>