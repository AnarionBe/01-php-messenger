<?php
    require('../class/User.php');
    session_start();
    require('../class/Conversation.php');

    // Connexion à la base de données

    try {
        $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    };

    //Création d'une nouvelle conversation définie par l'input de 'title' et la clé de l'utilisateur.
    $conversation = new Conversation($_SESSION['email'],$_POST['title']);

    
        //Test pour voir si le champs 'title' a été bien rempli.
        if (!empty($_POST['title'])) {
            $conversation->setSubject($_POST['title']);
            $_SESSION['subject'] = $conversation->getSubject();
            $conversation->setAuthor($_SESSION['user']->getPseudo());
            $conversation->add($bdd, $_SESSION['user']->getPseudo());
            header('Location: ../index.php');
            exit();
        } else echo 'Veuillez remplir le titre de la discussion!';
   

?>

