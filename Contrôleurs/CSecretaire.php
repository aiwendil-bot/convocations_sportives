<?php

require '../Modèles/Modele.php';

function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

    $convoc = getConvocations();
    $tabconvoc = $convoc->fetchAll();
    
    try
    {

    if(isset($_POST['effec']))
    {
        if(isset($_POST['nom']) && isset($_POST['prenom']))
        {
            $bdd = connexpdo();
            $requete = $bdd->prepare('SELECT nom_prenom FROM effectif WHERE nom_prenom = :nomprenom');
            $nom = valid_donnees($_POST['nom']);
            $prenom = valid_donnees($_POST['prenom']);
            if (!empty($prenom)
            && strlen($prenom) <= 20
            && preg_match("/^[A-Za-z '-]+$/",$prenom)&&
            !empty($nom)
            && strlen($nom) <= 20
            && preg_match("/^[A-Za-z '-]+/",$nom))
            {
                
                $res = $requete->fetchAll();

                if($requete->execute(array(':nomprenom' => "$nom $prenom")))
                {
                    $res = $requete->fetchAll();
                    if (count($res) != 0 )
                    {
                        echo "<script>alert(\"cette personne est deja inscrite\")</script>";
                    }
                    else
                    {
                        addJoueur($nom,$prenom);
                    }
                }
            }
            else
            {
                echo "<script>alert(\"Merci d'entrer un nom et prénom valides\")</script>";
            }
        }
    }

        // formulaire de rencontre
    try
    {
    if(isset($_POST['subrencontre']))
    {
        if((isset($_POST['competition']) && isset($_POST['date']) && isset($_POST['equipe']) && isset($_POST['equipe_adverse']) && isset($_POST['heure']) 
        && isset($_POST['site']) && isset($_POST['terrain'])))
        {
            $bdd = connexpdo();
            $requete = $bdd->prepare('SELECT competition,date,equipe,equipe_adverse,heure,site,terrain FROM rencontre WHERE competition = :competition 
            AND date = :date AND equipe = :equipe AND equipe_adverse = :equipe_adverse AND heure = :heure AND heure = :heure  AND site = :site AND terrain = :terrain');

            $competition = valid_donnees($_POST['competition']);
            $equipe = $_POST['equipe']; 
            $equipe_adverse = valid_donnees($_POST['equipe_adverse']);
            $site = valid_donnees($_POST['site']);
            $terrain = valid_donnees($_POST['terrain']);
            $heure = valid_donnees($_POST['heure']); //$_POST['heure'] est une chaîne au format hh:mm
            $date = valid_donnees(date("d/m",strtotime($_POST['date'])));

            if ((!empty($competition)
            && strlen($competition) <= 20
            && preg_match("/^[0-9A-Za-z '-]+$/",$competition)) &&
            (!empty($equipe)
            && (strlen($equipe) == 1) && preg_match("/^[A-Z]{1}$/",$equipe)) &&
            (!empty($equipe_adverse)
            && strlen($equipe_adverse) <= 20
            && preg_match("/^[A-Za-z '-]+/",$equipe_adverse))
            &&(!empty($site)
            && strlen($site) <= 20
            && preg_match("/^[A-Za-z '-]+/",$site))
            &&(!empty($terrain)
            && strlen($terrain) <= 20
            && preg_match("/^[A-Za-z '-]+/",$terrain))
            &&(!empty($date)
            && preg_match("/^(0[1-9]|1\d|2\d|3[01])\/(0[1-9]|1\d|2\d|3[01])$/",$date))
            &&(!empty($heure)
            && preg_match("/^((((0[8-9])|(1[0-7])):[0-5][0-9]))|(18:00)$/",$heure)))
            {
                if($requete->execute(array(':competition' => "$competition", ':equipe' => "$equipe", ':equipe_adverse' => "$equipe_adverse",  ':site' => "$site",':terrain' => "$terrain", ':heure' => "$heure", ':date' => "$date")))
                {
                    $res = $requete->fetchAll();
                    if (count($res) != 0 )
                    {
                        echo "<script>alert(\"Cette rencontre existe deja!\")</script>";
                    }

                    else
                    {
                        addRencontre($competition,$date,$equipe,$equipe_adverse,$heure,$site,$terrain); //définition déjà présente dans Modele.php
                        echo "<script>alert(\"La convocation a bien été ajoutée !\")</script>";
                    }
                }
            }
            else
        {
                echo "<script>alert(\"Merci de vérifier les données entrées !\")</script>";
        }
    }
    }
}
    catch (Exception $e) 
    {
        $msgErreur = $e->getMessage();
        require '../Vues/vueErreur.php';
    }

    if(isset($_POST["param1"]) && isset($_POST["param2"]) && isset($_POST["param3"]) && isset($_POST["param4"]) && isset($_POST["param5"]) && isset($_POST["param6"]) && isset($_POST["param7"])){
        $param1 = $_POST["param1"];
        $param2 = $_POST["param2"];
        $param3 = $_POST["param3"];
        $param4 = $_POST["param4"];
        $param5 = $_POST["param5"];
        $param6 = $_POST["param6"];
        $param7 = $_POST["param7"];
        $id = intval($_POST["id"]);


    }
        //instanciation 
        $rencontre = getRencontres();
        $tabRencontre = $rencontre->fetchAll();

        $absence = getAbsences();
        $tababsence = $absence->fetchAll();

        $effectif = getEffectif();
        $tabeffectif = $effectif->fetchAll();


        /*PDO::FETCH_ASSOC
        PDO::FETCH_BOTH
        PDO::FETCH_LAZY
        PDO::FETCH_OBJ*/

        //correspond aux options de recuperations d'information

        

        require '../Vues/vueSecretaire.php';
}
    catch (Exception $e) 
    {
        $msgErreur = $e->getMessage();
        require'vueErreur.php';
    }




?>
