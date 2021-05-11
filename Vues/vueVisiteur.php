<?php $titre="Visiteur"?>
<?php ob_start(); ?>

<div class="Nav">
    <!-- <div class="type"><p>Secretaire</p></div> -->
    <span id="role">Visiteur</span>
    <a href="../index.php" id="deco">Deconnexion</a>
</div>

<?php

    
    echo "<h1 id=\"convocVisiteur\">CONVOCATIONS</h1>";
    echo "<table class=\"visi\">";
        echo "<tr id=\"row\"><th>Date</th><th>Competition</th><th>Equipe Adv</th><th>Site</th><th>terrain</th><th>Heure</th><th>Rdv</th><th>Equipe</th><th>Joueur1</th><th>Joueur2</th><th>Joueur3</th><th>Joueur4</th><th>Joueur5</th><th>Joueur6</th><th>Joueur7</th><th>Joueur8</th><th>Joueur9</th><th>Joueur10</th><th>Joueur11</th><th>Joueur12</th><th>Joueur13</th><th>Joueur14</th></tr>";
        foreach($tabConvocationPubliable as $a){
            echo "<tr><td>$a[date]</td><td>$a[competition]</td><td>$a[equipe_adverse]</td><td>$a[site]</td><td>$a[terrain]</td><td>$a[heure]</td><td>$a[rdv]</td><td>$a[equipe]</td><td>$a[joueur1]</td><td>$a[joueur2]</td><td>$a[joueur3]</td><td>$a[joueur4]</td><td>$a[joueur5]</td><td>$a[joueur6]</td><td>$a[joueur7]</td><td>$a[joueur8]</td><td>$a[joueur9]</td><td>$a[joueur10]</td><td>$a[joueur11]</td><td>$a[joueur12]</td><td>$a[joueur13]</td><td>$a[joueur14]</td></tr>";
        }
    echo "</table>";
?>

<?php $contenu = ob_get_clean();?>
<?php require '../Vues/gabarit.php';?>


