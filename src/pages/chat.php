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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../lib/css/emoji.css" rel="stylesheet">
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
    <form method="post" action="../traitements/traitementMessageCreate.php">
        <p class="emoji-picker-container">
            <textarea name="modification" type="text" data-emojiable="true">
                <?php echo ($donnees['message']); ?>
            </textarea>
        </p>
        <input type="submit" value="Modifier">
        <input type="text" name="id" value=1>
    </form>
<?php }

$answer->closeCursor();

?>
 


<body>

    <p>
        <form method="post" action="../traitements/traitementMessageCreate.php">
            <p class="emoji-picker-container">
                <textarea name="message" id="message" data-emojiable="true">
                </textarea>
            </p>
            <input type="submit" value="Envoyer mon message" />
        </form>
    <p>


<!-- SCRIPT pour afficher le choix des emojis -->
  <script src="jQuery.js"></script>
  <script src="../lib/js/config.js"></script>
  <script src="../lib/js/util.js"></script>
  <script src="../lib/js/jquery.emojiarea.js"></script>
  <script src="../lib/js/emoji-picker.js"></script>

<script>
    $(function() {
    // Initializes and creates emoji set from sprite sheet
    window.emojiPicker = new EmojiPicker({
        emojiable_selector: '[data-emojiable=true]',
        assetsPath: '../lib/img/',
        popupButtonClasses: 'fa fa-smile-o'
    });
    // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
    // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
    // It can be called as many times as necessary; previously converted input fields will not be converted again
    window.emojiPicker.discover();
    });
</script>

<!-- FIN DU SCRIPT pour afficher le choix des emojis -->

</body>

</html>
