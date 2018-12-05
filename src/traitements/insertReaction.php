<?php
    session_start();
    require('../class/Reaction.php');

    try {
        $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    };

    $reponse = $bdd->query('SELECT id from messages');
    $donnees = $reponse ->fetch();

    $reaction = new Reaction($donnees['id'] ,$_SESSION['email'],$_POST['emoji']);

    
    $reaction->setEmoji($_POST['react']);
    $reaction->setMessage($donnees['id']);
    $reaction->setAuthor($_SESSION['mail']);
    $reaction->add($bdd);

    header('Location: /pages/chat.php');
    exit();



?>