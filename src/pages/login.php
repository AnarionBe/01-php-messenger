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
        <form action="../traitements/traitementLogin.php" method="post">
            <div id="connection">
                <input type="email" name="email" placeholder="Email" id="email">
                <br><input type="password" name="password" placeholder="Mot de passe" id="password">
                <label for="password" id="helpLabel">
                    <img src="../img/help.png" alt="icone infos">
                    <span class="tooltiptext">Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule et un chiffre</span>
                </label>
                <?php if($_SESSION['login_error'] != "") echo "<br><span class='error_msg'>".$_SESSION['login_error']."</span>";?>
                <br><input type="checkbox" name="signup" id="signup" <?php if($_SESSION['signup_error'] != "") echo "checked";?>><label for="signup">Créer un compte</label>
            </div>
            <div id="inscription">
                <br><input type="text" name="pseudo" placeholder="Pseudo">
                <br><input type="text" name="lastname" placeholder="Nom">
                <br><input type="text" name="firstname" placeholder="Prénom">
                <?php if($_SESSION['signup_error'] != "") echo "<br><span class='error_msg'>".$_SESSION['signup_error']."</span>";?>
                <br>
            </div>
            <br><input type="submit" value="Se connecter" id="button">
        </form>
        
        <footer class = "footer">
            <?php include("../footer.php");?>
            <script src="./js/login.js"></script>
        </footer>
    </div>
</body>
</html>