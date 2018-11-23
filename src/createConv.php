<?php
    session_start();

    try {
        $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

    $user = $_SESSION['email'];
    $subject = $_POST['title'];
    $result = $bdd->query("INSERT INTO conversations(author, conv_subject) VALUES('$user', '$subject');");
    var_dump($result);