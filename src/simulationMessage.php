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
{
	echo '<p>'. htmlspecialchars($donnees['message']) . '</p>';
}

$answer->closeCursor();

?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add messages</title>
</head>
<body>

    <p>
        <form method="post" action="./traitements/traitementMessageCreate.php">
            <textarea name = "message">
            Votre message ici
            </textarea>
            <input type="submit" value="Envoyer mon message" />
        </form>
    <p>
</body>
</html>


