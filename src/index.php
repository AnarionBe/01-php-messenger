<?php
    session_start();
    require('./class/Conversation.php');
    //require("./traitements/caching.php");
    //setCache();
    try {
        $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
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
    <?php if($_SESSION == 0) {?>
        <!-- Carte de connexion -->
        <div class="carte" >
            <div class="carteImage">
                <a href= "index.php"><img src=/img/MeowLogo_BeCode.png alt="Logo Meow" class="logoMeow"/></a>
            </div>
            
            <div class="carteTexte">
                <h4>Bienvenue sur le chat Meow!</h4>
                <p>Parce que le(s) chat(s) c'est la vie.</p>
                <div class="bouton">
                    <a href="./pages/login.php" class="boutonSeConnecter">Se Meower</a>
                </div>
            </div>
        </div>
    <?php } else {?>
        <div id="connected">
            <aside id="listConv">
            <?php 
                $result = $bdd->query("SELECT * FROM conversations");
                while($tmp = $result->fetch()) {
                    $conv = new Conversation($tmp['author'], $tmp['sujet']);
            ?>
                <div class="conv_tile">
                    <span><?php echo $conv->getSujet();?></span>
                </div>
            <?php    
                }
            ?>
            </aside>

            <div id="chatView">

            </div>
        </div>
        
    <?php }?>
        <footer class = "footer">
            <?php include("footer.php");?>
        </footer>
    </div>
</body>
</html>
