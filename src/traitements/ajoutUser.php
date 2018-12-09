<?php
    require("../class/User.php");
    require("../class/Conversation.php");
    try {
            $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8mb4', 'messenger', 'messenger');
    }
    catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
    }

    $pseudo = $_POST['pseudo'];
    $result = $bdd->query("SELECT pseudo FROM users WHERE pseudo='$pseudo'");
    if(!($tmp = $result->fetch())) {
        header("Location: ../index.php?conv=".$_POST['conv']);
        exit();
    } else {
        $conv = new Conversation("null", $_POST['conv']);
        $conv->addParticipant($bdd, $pseudo);
        header("Location: ../index.php?conv=".$_POST['conv']);
        exit();
    }