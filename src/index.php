<?php
    session_start();
    var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr-BE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php if(sizeof($_SESSION) == 0) { ?>
    <a href="./pages/login.php">Se connecter</a>
    <?php } else echo "connecté !"; ?>
</body>
</html>