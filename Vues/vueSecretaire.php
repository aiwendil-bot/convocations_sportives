<?php $titre = "Secretaire" ?>

<?php 

// formulaire d'ajout de rencontre action=ajouterRencontre.php

?>

<?php
    ob_start();
?>

<div class="navBar">
    <!-- <div class="type"><p>Secretaire</p></div> -->
    <span id="sec">Secretaire</span>
    <a href="#effec">Effectif</a>
    <a href="#abs">Absences</a>
    <a href="#renc">Rencontres</a>
    <a href="#conv">Convocations</a>
    <a href="../index.php" id="deco">Deconnexion</a>
</div>

<form action="CSecretaire.php" method="POST" class="formS">
    <fieldset>
        <legend>Ajout d'un nouveau joueur</legend>
        <input type="text" id="nom" name="nom" placeholder="entrez le nom" required>  <br>
        <input type="text" id="prenom" name="prenom" placeholder="entrez le prenom" required>
        <input type="submit" value="Envoyer" name="effec">
    </fieldset>
</form>

<form action="CSecretaire.php" method="POST" class="formS2">
    <fieldset>
        <legend>Ajout d'une nouvelle rencontre</legend>
        <input type="text" id="competition" name="competition" placeholder="entrez la competition" required> <br>
        <input type="date" id="date" name="date" min="2021-08-01" max="2022-07-31" step=7 required><br>
        <input type="test" id="equipe" name="equipe" placeholder="entrez l'equipe (A,B ...)" required> <br> <?//à remplacer par input select (?)?>
        <input type="text" id="equipe_adverse" name="equipe_adverse" placeholder="entrez l'equipe adverse" required>  <br>
        <input type="time" id="heure" name="heure" min="08:00" max="18:00" required><br>
        <input type="text" id="site" name="site" placeholder="entrez le site de la rencontre" required>  <br>
        <input type="text" id="terrain" name="terrain" placeholder="entrez le terrain où se jouera la rencontre" required>  <br>
        <input type="submit" id="subrencontre" name="subrencontre" value="Envoyer">
    </fieldset>
</form>

<?php

    echo "<h1 id=\"effec\">EFFECTIF</h1>";
    echo "<table class=effectif>";
    echo "<tr><th>Licence</th><th>Nom Prenom</th></tr>";
    foreach($tabeffectif as $e){
        echo "<tr><td>libre</td><td>$e[nom_prenom]</td></tr>";
    }
    echo "</table>";

    echo "<h1 id=\"abs\">ABSENCES</h1>";
    echo "<table class=absence>";
    echo "<tr><th>Joueur</th><th>01/08</th><th>08/08</th><th>15/08</th><th>22/08</th><th>29/08</th><th>05/09</th><th>12/09</th><th>19/09</th><th>26/09</th><th>03/10</th><th>10/10</th><th>17/10</th><th>24/10</th><th>31/10</th><th>07/11</th><th>14/11</th><th>21/11</th><th>28/11</th><th>05/12</th><th>12/12</th><th>19/12</th><th>26/12</th><th>02/01</th><th>09/01</th><th>16/01</th><th>23/01</th><th>30/01</th><th>06/02</th><th>13/02</th><th>20/02</th><th>27/02</th><th>06/03</th><th>13/03</th><th>20/03</th><th>27/03</th><th>03/04</th><th>10/04</th><th>17/04</th><th>24/04</th><th>01/05</th><th>08/05</th><th>15/05</th><th>22/05</th><th>29/05</th><th>05/06</th><th>12/06</th><th>19/06</th><th>26/06</th><th>03/07</th><th>10/07</th><th>17/07</th><th>24/07</th><th>31/07</th></tr>";
    foreach($tababsence as $a){
        echo "<tr><td>$a[joueur]</td><td><select class='select 01_08'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 08_08'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 15_08'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 22_08'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 29_08'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 05_09'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 12_09'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 19_09'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 26_09'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 03_10'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 10_10'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 17_10'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 24_10'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 31_10'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 07_11'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 14_11'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 21_11'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 28_11'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 05_12'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 12_12'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 19_12'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 26_12'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 02_01'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 09_01'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 16_01'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 23_01'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 30_01'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 06_02'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 13_02'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 20_02'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 27_02'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 06_03'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 13_03'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 20_03'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 27_03'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 03_04'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 10_04'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 17_04'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 24_04'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 01_05'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 08_05'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 15_05'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 22_05'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 29_05'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 05_06'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 12_06'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 19_06'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 26_06'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 03_07'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 10_07'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 17_07'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 24_07'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td><select class='select 31_07'>
        <option>...</option><option>D</option><option>A</option><option>B</option><option>E</option><option>N</option><option>S</option></select></td><td>
        </tr>";
        
    } 
    echo "</table>"; 

    
    
    
    echo "<table class=etat>";
    echo "<tr><th>Joueur</th><th>01/08</th><th>08/08</th><th>15/08</th><th>22/08</th><th>29/08</th><th>05/09</th><th>12/09</th><th>19/09</th><th>26/09</th><th>03/10</th><th>10/10</th><th>17/10</th><th>24/10</th><th>31/10</th><th>07/11</th><th>14/11</th><th>21/11</th><th>28/11</th><th>05/12</th><th>12/12</th><th>19/12</th><th>26/12</th><th>02/01</th><th>09/01</th><th>16/01</th><th>23/01</th><th>30/01</th><th>06/02</th><th>13/02</th><th>20/02</th><th>27/02</th><th>06/03</th><th>13/03</th><th>20/03</th><th>27/03</th><th>03/04</th><th>10/04</th><th>17/04</th><th>24/04</th><th>01/05</th><th>08/05</th><th>15/05</th><th>22/05</th><th>29/05</th><th>05/06</th><th>12/06</th><th>19/06</th><th>26/06</th><th>03/07</th><th>10/07</th><th>17/07</th><th>24/07</th><th>31/07</th></tr>";
    foreach($tababsence as $a){
        echo "<tr><td>$a[joueur]</td>";
        $tabdates = ["01_08","08_08","15_08","22_08","29_08","05_09",	"12_09",	"19_09",	"26_09",	"03_10",	"10_10",	"17_10",	
        "24_10",	"31_10",	"07_11",	"14_11",	"21_11",	"28_11",	"05_12",	"12_12",	"19_12",	"26_12"	,"02_01",	"09_01"	,"16_01",	"23_01"	,
        "30_01"	,"06_02",	"13_02"	,"20_02",	"27_02"	,"06_03",	"13_03"	,"20_03",	"27_03",	"03_04"	,"10_04",	"17_04"	,"24_04",	"01_05"	,
        "08_05",	"15_05",	"22_05",	"29_05"	,"05_06",	"12_06"	,"19_06",	"26_06"	,"03_07",	"10_07"	,"17_07",	"24_07"	,"31_07"];
        foreach($tabdates as $cle)
            switch($a[$cle]){
                case 'D' : echo "<td><b>Disponible</b></td>";break;
                case 'B' : echo "<td>Blesse</td>";break;
                case 'A' : echo "<td>Absent</td>";break;
                case 'S' : echo "<td>Suspendu</td>";break;
                case 'N' : echo "<td>Non licencie</td>";break;
                case 'E' : echo "<td>Exempt</td>";break;
                case 'C' : echo "<td class=\"c\">Convoque</td>";break;

            }
        }
    
    echo "</table>";

    echo "<h1 id=\"renc\">RENCONTRE</h1>";
    echo "<table class=etat>";
    echo "<tr><th>Categorie</th><th>Competition</th><th>Equipe</th><th>Equipe adverse</th><th>Date</th><th>Heure</th><th>Terrain</th><th>Site</th><th>Modification</th><th>Suppression</th></tr>";
        foreach($tabRencontre as $a){
            echo "<tr id=\"$a[id]\"><td>SENIORS</td><td>$a[competition]</td><td>$a[equipe]</td><td>$a[equipe_adverse]</td><td>$a[date]</td><td>$a[heure]</td><td>$a[terrain]</td><td>$a[site]</td><td><input type='button' value='Modifier' class='modif'><input type='button' value='Sauvgarder' class='save'></td><td><input type='button' value='Supprimer' class='supp'></td></tr>";
        }
    echo "</table>";

    echo "<h1 id=\"conv\">CONVOCATION</h1>";
    echo "<table class=etat>";
    echo "<tr><th>Date</th><th>Competition</th><th>Equipe Adv</th><th>Site</th><th>terrain</th><th>Heure</th><th>Rdv</th><th>Equipe</th><th>Joueur1</th><th>Joueur2</th><th>Joueur3</th><th>Joueur4</th><th>Joueur5</th><th>Joueur6</th><th>Joueur7</th><th>Joueur8</th><th>Joueur9</th><th>Joueur10</th><th>Joueur11</th><th>Joueur12</th><th>Joueur13</th><th>Joueur14</th></tr>";
        foreach($tabconvoc as $a){
            echo "<tr><td>$a[date]</td><td>$a[competition]</td><td>$a[equipe_adverse]</td><td>$a[site]</td><td>$a[terrain]</td><td>$a[heure]</td><td>$a[rdv]</td><td>$a[equipe]</td><td>$a[joueur1]</td><td>$a[joueur2]</td><td>$a[joueur3]</td><td>$a[joueur4]</td><td>$a[joueur5]</td><td>$a[joueur6]</td><td>$a[joueur7]</td><td>$a[joueur8]</td><td>$a[joueur9]</td><td>$a[joueur10]</td><td>$a[joueur11]</td><td>$a[joueur12]</td><td>$a[joueur13]</td><td>$a[joueur14]</td></tr>";
        }
    echo "</table>";
?>


<?php
    $contenu = ob_get_clean();
?>

<?php
    require '../Vues/gabarit.php';
?>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>