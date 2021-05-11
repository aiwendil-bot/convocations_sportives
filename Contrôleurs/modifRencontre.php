<?php

require '../Modèles/Modele.php';

    $pdo = connexpdo();
       
        if(isset($_POST["param1"]) && isset($_POST["param2"]) && isset($_POST["param3"]) && isset($_POST["param4"]) && isset($_POST["param5"]) && isset($_POST["param6"]) && isset($_POST["param7"]))
        {
            $param1 = $_POST["param1"];
            $param2 = $_POST["param2"];
            $param3 = $_POST["param3"];
            $param4 = $_POST["param4"];
            $param5 = $_POST["param5"];
            $param6 = $_POST["param6"];
            $param7 = $_POST["param7"];
            $id = intval($_POST["id"]);

    if ((!empty($param1)
            && strlen($param1) <= 20
            && preg_match("/^[A-Za-z '-]+$/",$param1)) &&
            (!empty($param2)
            && (strlen($param2) == 1) && preg_match("/^[A-Z]{1}$/",$param2)) &&
            (!empty($param3)
            && strlen($param3) <= 20
            && preg_match("/^[A-Za-z '-]+/",$param3))
            &&(!empty($param7)
            && strlen($param7) <= 20
            && preg_match("/^[A-Za-z '-]+/",$param7))
            &&(!empty($param6)
            && strlen($param6) <= 20
            && preg_match("/^[A-Za-z '-]+/",$param6))
            &&(!empty($param4)
            && preg_match("/^(0[1-9]|1\d|2\d|3[01])\/(0[1-9]|1\d|2\d|3[01])$/",$param4))
            &&(!empty($param5)
            && preg_match("/^((((0[8-9])|(1[0-7])):[0-5][0-9]))|(18:00)$/",$param5))){

                $requete = $pdo->prepare("UPDATE rencontre SET equipe=:p1 , equipe_adverse=:p2,date=:p3,heure=:p4,terrain=:p5,site=:p6 , competition = :p7
                WHERE id = :id");

                $requete->bindParam(':id',$id);
                $requete->bindParam(':p1',$param2);
                $requete->bindParam(':p2',$param3);
                $requete->bindParam(':p3',$param4);
                $requete->bindParam(':p4',$param5);
                $requete->bindParam(':p5',$param6);
                $requete->bindParam(':p6',$param7);
                $requete->bindParam(':p7',$param1);
                $requete->execute();
            }
        }

        /*echo "<h1 id=\"renc\">RENCONTRE</h1>";
        echo "<table class=etat>";
        echo "<tr><th>Categorie</th><th>Competition</th><th>Equipe</th><th>Equipe adverse</th><th>Date</th><th>Heure</th><th>Terrain</th><th>Site</th><th>Modification</th><th>Suppression</th></tr>";
            foreach($tabRencontre as $a){
                echo "<tr id=\"$a[id]\"><td>SENIORS</td><td>$a[competition]</td><td>$a[equipe]</td><td>$a[equipe_adverse]</td><td>$a[date]</td><td>$a[heure]</td><td>$a[terrain]</td><td>$a[site]</td><td><input type='button' value='Modifier' class='modif'><input type='button' value='Sauvgarder' class='save'></td><td><input type='button' value='Supprimer' class='supp'></td></tr>";
            }
        echo "</table>";

        require '../Vues/vueSecretaire.php';*/
?>