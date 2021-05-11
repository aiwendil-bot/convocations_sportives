<?php
    require '../Modèles/Modele.php';

    $convocationPubliable = getConvocationsP();
    $tabConvocationPubliable = $convocationPubliable->fetchAll();

    require '../Vues/vueVisiteur.php';

?>