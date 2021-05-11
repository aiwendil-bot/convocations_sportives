<?php

require '../Modèles/Modele.php';

function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

    //instanciation 
    $pdo = connexpdo();
    $rencontre = getRencontres();
    $tabRencontre = $rencontre->fetchAll();

    $absence = getAbsences();
    $tababsence = $absence->fetchAll();

    $effectif = getEffectif();
    $tabeffectif = $effectif->fetchAll();

    $convoc = getConvocations();
    $tabconvoc = $convoc->fetchAll();

    function joueursDisponiblesdate($date){
        $date = str_replace('/','_',$date);
        $res = "";
        foreach(joueursDisponibles($date) as $j){
             $res .="<option>$j[joueur]</option>";
        }
        return $res;
    }

    //var_dump($_POST['ary']);
    //var_dump($_POST);
    try{
        if(isset($_POST['ary']))
        {
            /*echo "on a bien set le formulaire";
            echo "test :";
            echo is_countable($_POST['ary']);*/
            $values = $_POST['ary'];
            if(sizeof($_POST['ary']) < 15 && sizeof($_POST["ary"]) >= 11){
               $id =  intval($_POST["id"]);
               $j1 = $_POST['ary'][0];
               $j2 = $_POST['ary'][1];
               $j3 = $_POST['ary'][2];
               $j4 = $_POST['ary'][3];
               $j5 = $_POST['ary'][4];
               $j6 = $_POST['ary'][5];
               $j7 = $_POST['ary'][6];
               $j8 = $_POST['ary'][7];
               $j9 = $_POST['ary'][8];
               $j10 = $_POST['ary'][9];
               $j11 = $_POST['ary'][10];
               /*$j12 = $_POST['ary'][11];
               $j13 = $_POST['ary'][9];*/

               if(isset($_POST['ary'][11])){
                $j12 = $_POST['ary'][11];
               }else $joueur11 = "null";

               if(isset($_POST['ary'][12])){
                $j13 = $_POST['ary'][12];
               }else $joueur12 = "null";

               if(isset($_POST['ary'][13])){
                $j14 = $_POST['ary'][13];
               }else $joueur13 = "null";

               if(isset($_POST["texta"])){
                $rdv = valid_donnees($_POST["texta"]);
                }
                else $rdv ="null";

               $date = $_POST["date"];
               $date = str_replace('/','_',$date);
               $requete = $pdo->prepare("UPDATE convocation SET rdv = :rdv, joueur1= :joueur1, joueur2= :joueur2, joueur3= :joueur3, joueur4= :joueur4
                , joueur5= :joueur5, joueur6= :joueur6, joueur7= :joueur7, joueur8= :joueur8, joueur9= :joueur9, joueur10= :joueur10
                , joueur11= :joueur11, joueur12= :joueur12, joueur13= :joueur13, joueur14= :joueur14
                WHERE id = :id");

                //$requete->bindParam(':rdv',$rdv);
                $requete->bindParam(':id',$id);
                $requete->bindParam(':rdv',$rdv);
                $requete->bindParam(':joueur1',$j1);
                $requete->bindParam(':joueur2',$j2);
                $requete->bindParam(':joueur3',$j3);
                $requete->bindParam(':joueur4',$j4);
                $requete->bindParam(':joueur5',$j5);
                $requete->bindParam(':joueur6',$j6);
                $requete->bindParam(':joueur7',$j7);
                $requete->bindParam(':joueur8',$j8);
                $requete->bindParam(':joueur9',$j9);
                $requete->bindParam(':joueur10',$j10);
                $requete->bindParam(':joueur11',$j11);
                $requete->bindParam(':joueur12',$j12);
                $requete->bindParam(':joueur13',$j13);
                $requete->bindParam(':joueur14',$j14);

                $requete->execute();


                $requete2 = $pdo->prepare("UPDATE absences SET $date = 'C' where 
                joueur = :joueur1 OR
                joueur = :joueur2 OR
                joueur = :joueur3 OR
                joueur = :joueur4 OR
                joueur = :joueur5 OR
                joueur = :joueur6 OR
                joueur = :joueur7 OR
                joueur = :joueur8 OR
                joueur = :joueur9 OR
                joueur = :joueur10 OR
                joueur = :joueur11 OR
                joueur = :joueur12 OR  
                joueur = :joueur13 OR
                joueur = :joueur14");
               
                $requete2->bindParam(':joueur1',$j1);
                $requete2->bindParam(':joueur2',$j2);
                $requete2->bindParam(':joueur3',$j3);
                $requete2->bindParam(':joueur4',$j4);
                $requete2->bindParam(':joueur5',$j5);
                $requete2->bindParam(':joueur6',$j6);
                $requete2->bindParam(':joueur7',$j7);
                $requete2->bindParam(':joueur8',$j8);
                $requete2->bindParam(':joueur9',$j9);
                $requete2->bindParam(':joueur10',$j10);
                $requete2->bindParam(':joueur11',$j11);
                $requete2->bindParam(':joueur12',$j12);
                $requete2->bindParam(':joueur13',$j13);
                $requete2->bindParam(':joueur14',$j14);
                $requete2->execute();
                var_dump($requete2->rowCount());

            

                header("location:CEntraineur.php");
            }
            else
            {
                echo "<script>alert(\"selectionner seulement 11 a 14 joueurs\")</script>";
            }

            
        }

        if(isset($_POST["pub"])){
            $id =  intval($_POST["id"]);

            $requete = $pdo->prepare("UPDATE convocation SET publie = 1 where id = :id");
            $requete->bindParam(':id',$id);
            $requete->execute();
        }
        

    }catch(exception $e){
        $msg = $e->getMessage();
        require '../Vues/vueErreur.php';
    }
    


    require '../Vues/vueEntraineur.php';


?>

