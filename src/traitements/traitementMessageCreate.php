<?php

try
{
	$add_message = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

        // Modification des messages
if ($_POST['modification']){
        $newMessage = $_POST['modification'];
        $ID = $_POST['id'];
        $req = $add_message -> prepare("UPDATE messages SET message = '$newMessage' WHERE id = $ID");
        $req->execute();
        $_POST['modification'] = ""; // Remet la variable modif à rien
}
elseif ($_POST['message']) {
        
        // Transformation des unicodes en emojis
        $textcode = array(':)', ':\'D', ':D', '<3', ':\'(', ':o', ':*', '>:(', '--');
        $images = array('😺','😹','😸','😻','😿','🙀','😽','😾','😼');
        echo str_replace($textcode, $images, $_POST['message']);
        
        // Insertion du message à l'aide d'une requête préparée OK
        $date = date("Y-m-d H:i:s");
        $message = $_POST['message'];
        $req = $add_message->prepare("INSERT INTO messages VALUES(null, 'babar', 'babar', '$message', '$date');");
        $req->execute();

        $_POST['message'] = ""; // Remet la variable message à rien
}

// Redirection du visiteur vers la page du minichat
header('Location: ../pages/chat.php');
exit();
?>





