<?php
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

            //Créer le sujet de la conversation
            $conversation-> setSujet($_POST['title']);
            //Permet d'enregistrer le sujet de la nouvelle conversation dans les variables de session.
            $_SESSION['subject'] = $conversation->getSujet();
            //Définir l'auteur de la nouvelle conversation.
            $conversation-> setAuthor($_SESSION['email']);
            //Ajouter une nouvelle entrée à la base de données.
            $conversation->add($bdd);
            header('Location: /index.php');
            exit();
        } else echo 'Veuillez remplir le titre de la discussion!';
   

?>

