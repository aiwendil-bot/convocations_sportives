<?php
    //fonction de connexion a la base de données
    
    //fonction connexpdo côté Tom

    function connexpdo()
    {
        $pdo = new PDO('mysql:host=localhost;port=3308;charset=UTF8;dbname=projetdevweb;',
        'root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $pdo ;
    }
    

    // fonction connexpdo côté Adrien
   
/*    function connexpdo()
{
    $sgbd = "mysql"; 
    $host = "localhost";
    $charset = "UTF8";
    $user = "root"; 
    $pass = "15422451"; 
    try {
        $pdo = new PDO("$sgbd:host=$host;dbname=projet;port=3306;charset=$charset", $user, $pass, array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));
        return $pdo;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}*/


// ACCES TABLES
    function getRencontres(){

        $bdd = connexpdo();
        $rencontres = $bdd->query('select * from rencontre order by id');
        return $rencontres;
    }
        
    function getEffectif(){
    
        $bdd = connexpdo();
        $effectif = $bdd->query('select * from effectif order by nom_prenom');
        return $effectif;
    }
    
    function getAbsences(){
    
        $bdd = connexpdo();
        $absences = $bdd->query('select * from absences order by joueur');
        return $absences;
    }

    function getConvocations(){
        $bdd= connexpdo();
        $convocation = $bdd->query('select * from convocation order by equipe');
        return $convocation;
    }

    function getConvocationsP(){
        $bdd= connexpdo();
        $convocation = $bdd->query('select * from convocation where publie = 1');
        return $convocation;
    }
    

// FONCTIONS SECRETAIRE

function addJoueur($nom,$prenom){
    $bdd = connexpdo();
    $sql = "INSERT INTO effectif VALUES ('libre','$nom $prenom')";
    $sql2 = "INSERT INTO absences(joueur) VALUES ('$nom $prenom')";
    $bdd->query($sql);
    $bdd->query($sql2);

}

function addRencontre($competition,$date,$equipe,$equipe_adverse,$heure,$site,$terrain){
    $bdd = connexpdo();
    $sql = "INSERT INTO rencontre(competition,equipe,equipe_adverse,date,heure,terrain,site) VALUES ('$competition','$equipe','$equipe_adverse','$date','$heure','$terrain','$site')";
    $bdd->query($sql);
}


/*function updateRencontre($competition,$date,$equipe,$equipe_adverse,$heure,$site,$terrain){
    $bdd = connexpdo();
    $sql = "UPDATE rencontre SET competition='$competition',equipe='$equipe',equipe_adverse='$equipe_adverse',date='$date',heure='$heure',terrain='$terrain',site= '$site'
            WHERE (competition='$competition' and terrain='$terrain' and equipe='$equipe')";
    $bdd->query($sql);
}*/

function updateRencontre($date,$equipe,$equipe_adverse,$heure,$site,$terrain){
    $bdd = connexpdo();
    $sql = "UPDATE rencontre SET equipe='$equipe',equipe_adverse='$equipe_adverse',date='$date',heure='$heure',terrain='$terrain',site= '$site'
            WHERE /* id = $id*/"; //$id à récupérer depuis le tableau 
    $bdd->query($sql);
}

//FONCTION ENTRAINEUR
function addConvocation($competition,$equipe,$equipe_adverse,$date,$heure,$terrain,$site,$rdv,$joueur1,$joueur2,$joueur3,$joueur4,$joueur5,$joueur6,$joueur7,$joueur8,$joueur9,$joueur10,$joueur11,$joueur12,$joueur13,$joueur14){
    $bdd = connexpdo();
    $sql = "INSERT INTO convocation(competition,equipe,equipe_adverse,date,heure,terrain,site,rdv,joueur1,joueur2,joueur3,joueur4,joueur5,joueur6,joueur7,joueur8,joueur9,joueur10,joueur11,joueur12,joueur13,joueur14) VALUES ('$competition','$equipe','$equipe_adverse','$date','$heure','$terrain','$site','$rdv','$joueur1','$joueur2','$joueur3','$joueur4','$joueur5','$joueur6','$joueur7','$joueur8','$joueur9','$joueur10','$joueur11','$joueur12','$joueur13','$joueur14')";
    $bdd->query($sql);
}

function joueursDisponibles($date){
    $bdd = connexpdo();
    $dispo = $bdd->query("select joueur from absences where $date = 'D' order by joueur ");
    return $dispo;
}
