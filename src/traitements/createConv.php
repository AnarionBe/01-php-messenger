<?php
    session_start();
    require('../class/Conversation.php');

    try {
        $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

    $conv = new Conversation($_SESSION['prenom']." ".$_SESSION['nom'], $_POST['title']);
    var_dump($conv);