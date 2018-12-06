<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8mb4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="../traitements/createConv.php" method="post">
        <input type="text" name="title" id="title"><label for="title">Titre</label>
        <br><input type="submit">
    </form>
</body>
</html>