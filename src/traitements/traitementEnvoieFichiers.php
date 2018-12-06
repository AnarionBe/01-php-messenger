<?php

$bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');

// Check if the message has been sent
if (isset($_FILES['file']) AND $_FILES['file']['error'] == 0)
{
    // Accept the file
    $path = '../filesreceived//'.basename($_FILES['file']['name']);
move_uploaded_file($_FILES['file']['tmp_name'], $path);
    echo "Fichier envoyé";
}
// fucking database doesn't work! 
// edit: fucking database finally works!
$date = date("Y-m-d H:i:s");
$req = $bdd->prepare("INSERT INTO messages VALUES(null, 'test', 'test', 'test', '$date', '$path');");
$req->execute();
?>