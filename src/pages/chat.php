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



<?php

try
{
	$add_message = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// Récupération des 10 derniers messages
$answer = $add_message->query('SELECT message FROM messages ORDER BY id DESC LIMIT 0, 10');

// Affichage de chaque message
while ($donnees = $answer->fetch())
{ ?>
    <form method="post" action="./traitements/traitementMessageCreate.php">
        <textarea name="modification" type="text"><?php echo ($donnees['message']); ?></textarea>
        <input type="submit" value="Modifier">
        <input type="text" name="id" value=1>
    </form>
<?php }

$answer->closeCursor();

?>
 


<body>

    <p>
        <form method="post" action="./traitements/traitementMessageCreate.php">
            <textarea name = "message" id="message">
            Votre message ici
            </textarea>
            <input type="submit" value="Envoyer mon message" />
        </form>
    <p>

    <!--<form action="../traitements/insertReaction.php" method="post"> -->

<!-- Code qui permet de faire le Popup-->
    <div class="popup" onclick="popupFunction()">
        <img src="../img/cat_emojis.png" alt="sélectionner un émojis"  title="Ajoutez une réaction"/>
        <span class="popupContent" id="myPopup">
            <img class="emojis" src="../img/smilies/cat_smile.png" onclick="emojiFunction()" id="emoji1" />
            <img class="emojis" src="../img/smilies/cat_laugh.png" onclick="emojiFunction()" />
            <img class="emojis" src="../img/smilies/cat_lol.png" onclick="emojiFunction()" />
            <img class="emojis" src="../img/smilies/cat_love.png" onclick="emojiFunction()" />
            <img class="emojis" src="../img/smilies/cat_sad.png" onclick="emojiFunction()" />
            <img class="emojis" src="../img/smilies/cat_surprised.png" onclick="emojiFunction()" />
            <img class="emojis" src="../img/smilies/cat_kiss.png" onclick="emojiFunction()" />
            <img class="emojis" src="../img/smilies/cat_angry.png" onclick="emojiFunction()" />
            <img class="emojis" src="../img/smilies/cat_determined.png" onclick="emojiFunction()" />
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

<!-- Fonction qui permet d'afficher les emojis dans le texte lorsqu'ils sont sélectionnés -->
    <script>
        function emojiFunction() {
            var emoji = document.getElementsByClassName("emojis");
            var emojiInMessage = document.getElementById("message").innerHTML;
            var image = document.images.emoji1;

            
            document.getElementById("message").innerHTML = image;
            
            
        }
    </script>

</body>

</html>
