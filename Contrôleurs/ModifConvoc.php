<?php
    require '../Modèles/Modele.php';
    $pdo = connexpdo();

    var_dump($_POST);

    $id = intval($_POST["id"]);
    $date = $_POST["date"];
    $competition = $_POST["competition"];
    $equipeAdv = $_POST["equipeAdv"];
    $site = $_POST["site"];
    $terrain = $_POST["terrain"];
    $heure = $_POST["heure"];
    $equipe = $_POST["equipe"];

    $requete2 = $pdo->prepare('SELECT date,competition,equipe_adverse,site,terrain,heure,equipe FROM convocation WHERE date = :date and competition = :competition 
    and equipe_adverse = :equipe_adverse and site = :site and terrain = :terrain and heure = :heure and equipe = :equipe');

    /*$res = $requete2->fetchAll();*/

                if($requete2->execute(array(':date' => "$date",':competition' => "$competition",':equipe_adverse' => "$equipeAdv",
                ':site' => "$site",':terrain' => "$terrain",':heure' => "$heure",':equipe' => "$equipe",)))
                {
                    $res = $requete2->fetchAll();
                    if (count($res) != 0 )
                    {
                        echo "<script>alert(\"une convocation identique existe deja !\")</script>";
                    }
                    else
                    {
                        $requete = $pdo->prepare("INSERT INTO convocation(idr,competition,equipe,equipe_adverse,date,heure,terrain,site,joueur1,joueur2,joueur3,joueur4,joueur5,joueur6,joueur7,joueur8,joueur9,joueur10,joueur11,joueur12,joueur13,joueur14)VALUES
                                                    (:idr,:competition,:equipe,:equipeAdv,:date,:heure,:terrain,:site,'','','','','','','','','','','','','','')");
                        $requete->bindParam(':competition',$competition);
                        $requete->bindParam(':equipe',$equipe);
                        $requete->bindParam(':equipeAdv',$equipeAdv);
                        $requete->bindParam(':site',$site);
                        $requete->bindParam(':terrain',$terrain);
                        $requete->bindParam(':heure',$heure);
                        $requete->bindParam(':date',$date);
                        $requete->bindParam(':idr',$id);
                        $requete->execute();
                    }
                }



    
?>