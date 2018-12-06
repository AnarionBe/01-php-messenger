<?php
    require(dirname(__DIR__) . '/class/User.php');
    session_start();

    // Session de l'utilisateur
    $user = $_SESSION['user'];
    // Si aucune session ouverte
    if (is_null($user)){
        header('Location: /');
    }

    // Accès base de donnée
    try {
        $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Meowser</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styleprofil.css" />
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <script src="main.js"></script>
</head>
<body>
    
</body>
</html>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="profil.css" />
    <title>Page de profil</title>
  </head>
  <body>

    <div class="titleProfile">
        <h1>Profil Meowser</h1>
    </div>



    <div class="profileArea">

        <div class="profile">
            <p>Pseudo :</p>
            <p>Nom :</p> 
            <p>Prénom :</p> 
            <p>Mail :</p> 
        </div>

        <div class="profileData">
            <p><?php echo $_SESSION['user']->getPseudo(); ?></p>
            <p><?php echo $_SESSION['user']->getLastName(); ?></p>
            <p><?php echo $_SESSION['user']->getFirstName(); ?></p>
            <p><?php echo $_SESSION['user']->getEmail(); ?></p>

        </div>

        <div class="photo">
            <img class="emptyCat" src="../img/MeowLogo_BeCode.png" alt="Photo de profil">
        </div>

        <div class="redir">
            <a href="/pages/modif_profil.php">Modifier votre profil</a>
        </div>
    </div>


  </body>
</html>