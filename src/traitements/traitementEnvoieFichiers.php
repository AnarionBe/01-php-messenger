<?php

$bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');

// Check if the message has been sent
if (isset($_FILES['file']) AND $_FILES['file']['error'] == 0)
{
    // Accept the file
move_uploaded_file($_FILES['file']['tmp_name'], '../filesreceived//'.basename($_FILES['file']['name']));
    echo "Fichier envoyé";
}
?>