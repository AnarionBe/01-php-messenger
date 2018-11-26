<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr-BE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meow</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet"> 
</head>


<body>
    <div class="container">

        <!-- Carte de connexion -->
        <div class="carte" >
            <div class="carteImage">
                <a href= "index.php"><img src=/img/MeowLogo_BeCode.png alt="Logo Meow" class="logoMeow"/></a>
            </div>
            
            <div class="carteTexte">
                <h4>Bienvenue sur le chat Meow!</h4>
                <p>Parce que le(s) chat(s) c'est la vie.</p>
                <?php if(sizeof($_SESSION) == 0) { ?>
                <a href="./pages/login.php" class="bouton">Se Meower</a>
                <?php } else echo "connecté !"; ?>
            </div>
                
        </div>

   

    </div>

</body>
</html>