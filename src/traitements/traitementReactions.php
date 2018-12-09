<?php
    require('../class/User.php');
    session_start();

    try {
        $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

    $id = $_POST['id'];
    $user = $_SESSION['user']->getPseudo();
    $response = $bdd->query("SELECT message FROM reactions WHERE user='$user' AND message='$id'");
    if($tmp = $response->fetch()) {
        $bdd->query("DELETE FROM reactions WHERE user='$user' AND message='$id'");
    } else {
        $bdd->query("INSERT INTO reactions VALUES(null, '$id', '$user')");
    }
    
    header('Location: ../index.php?conv='.$_POST['conv']);
    exit();