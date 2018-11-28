<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr-BE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="login-style.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet"> 
</head>

<body>

    <div class="container">
        <form action="/traitements/traitementLogin.php" method="post">
            <input type="text" name="email">
            <input type="password" name="password">
            <input type="checkbox" name="signup" id="signup"><label for="signup">Créer un compte</label>
            <input type="text" name="firstname">
            <input type="text" name="lastname">
            <br><input type="submit">
        </form>
        
        <footer class = "footer">
            <?php include("../footer.php");?>
        </footer>
    </div>

</body>
</html>