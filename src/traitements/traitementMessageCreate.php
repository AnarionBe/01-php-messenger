<?php

try
{
	$add_message = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

        // Modifying msgs
if ($_POST['modification']){
        $newMessage = $_POST['modification'];
        $ID = $_POST['id'];
        $req = $add_message -> prepare("UPDATE messages SET message = '$newMessage' WHERE id = $ID");
        $req->execute();
        $_POST['modification'] = ""; // Reboot variable 'modification'
}
elseif ($_POST['message']) {
        // Insert messages with 'prepare' and variables
        $date = date("Y-m-d H:i:s");
        $message = $_POST['message'];
        $req = $add_message->prepare("INSERT INTO messages VALUES(null, 'babar', 'babar', '$message', '$date');");
        $req->execute();
        $_POST['message'] = ""; // Reboot variable 'message'
}

// Redirect users to 'simulationMessage' webpage
header('Location: ../simulationMessage.php');
exit();
?>





