<?php

try
{
	$add_message = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


// Insertion du message à l'aide d'une requête préparée
$date = date("Y-m-d H:i:s");
$message = $_POST['message'];
$req = $add_message->prepare("INSERT INTO messages VALUES(null, 'babar', 'babar', '$message', '$date');");
$req->execute();

// Redirection du visiteur vers la page du minichat
header('Location: ../simulationMessage.php');
exit();
?>


