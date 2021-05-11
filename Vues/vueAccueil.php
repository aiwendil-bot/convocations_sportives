<?php
    $titre = 'Convocations Sportives';
    /*$path = '../Public/main.css';*/
?>
<?php
    ob_start();
?>
    
    <?php if(isset($connexionError)){
        echo "<script>alert(\"cette personne est deja inscrite\")</script>";
    } ?>

    <h2>Bienvenue sur cette application de gestion des convocations sportives , veuillez vous connecter.</h2>
    <div class="inscription">

    <form action="Contrôleurs/identification.php" class="box" method="POST">
        <h1>Login</h1>
        <input type="text" name="user" placeholder="username" required>
        <input type="password" name="pwd" placeholder="password" required>
        <input type="submit" name="" value="Login" >
    </form>
    </div>

    
<?php
    $contenu = ob_get_clean();
?>

<?php
    require 'gabarit.php';
?>