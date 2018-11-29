<?php
    //Pages pour les discussions.
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <link rel="stylesheet" href="chat-style.css">
</head>

<body>
    <form action="../traitements/createConv.php" method="post">
        <input type="text" name="title" id="title"><label for="title">Titre</label>
        <br><input type="submit">
    </form>

    <form action="../traitements/insertReaction.php" method="post">

<br>
<br>
<br>
<br>
<!-- Code qui permet de faire le Popup-->
    <div class="popup" onclick="popupFunction()">
        <img src="../img/cat_emojis.png" alt="sélectionner un émojis"  title="Ajoutez une réaction"/>
        <span class="popupContent" id="myPopup">
            <img class="emojis" src="../img/smilies/cat_smile.png">
            <img class="emojis" src="../img/smilies/cat_laugh.png">
            <img class="emojis" src="../img/smilies/cat_lol.png">
            <img class="emojis" src="../img/smilies/cat_love.png">
            <img class="emojis" src="../img/smilies/cat_sad.png">
            <img class="emojis" src="../img/smilies/cat_surprised.png">
            <img class="emojis" src="../img/smilies/cat_kiss.png">
            <img class="emojis" src="../img/smilies/cat_angry.png">
            <img class="emojis" src="../img/smilies/cat_determined.png">
        </span>
    </div>

<!-- Fonction pour la Popup (quand l'utilisateur click sur la div, le popup s'ouvre)
classList.toggle permet de connecter la fonction html au css -->
    <script>
        function popupFunction() {
            var popup = document.getElementById("myPopup");
            popup.classList.toggle("show");
        }
    </script>

</body>

</html>
