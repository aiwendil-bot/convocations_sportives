<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php if(!isset($cssPath)){echo "../";}?>Public/main.css">
    <script src="<?php if(!isset($cssPath)){echo "../";}?>Public/main.js"></script>
    <title><?= $titre ?></title>
</head>
<body>
<div class="mainContent">
        <?= $contenu ?>
</div>
</body>
</html>