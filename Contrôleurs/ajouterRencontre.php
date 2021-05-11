<?php

/* récupère les données d un formulaire de vueSecretaire.php
pour ajouter une rencontre dans la table rencontre */

require '../Modèles/Modele.php';

if (!empty($_POST)){
    // une seule catégorie (seniors) pas besoin d input ?
    $competition = htmlspecialchars($_POST['competition']);
    $date = htmlspecialchars($_POST['date']); // input date
    $equipe = htmlspecialchars($_POST['equipe']); //input select (?)
    $equipe_adverse = htmlspecialchars($_POST['equipe_adverse']);
    $heure = htmlspecialchars($_POST['heure']); // input text qui précise le format (hh:mm ?) => varchar dans la bdd
    $site = htmlspecialchars($_POST['site']);
    $terrain = htmlspecialchars($_POST['terrain']);

    addRencontre($competition,$date,$equipe,$equipe_adverse,$heure,$site,$terrain);
    // message de confirmation ?
    
}
header('Location: ../Vues/vueSecretaire.php');