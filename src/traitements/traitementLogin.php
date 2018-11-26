<?php
    session_start();
    require('../class/User.php');

    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

    $user = new User($_POST['email']);

    if(!isset($_POST['signup'])) { //cas de login
        if($user->load($bdd)){
            if($user->checkPassword($_POST['password'])) {
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['nom'] = $user->getLastName();
                $_SESSION['prenom'] = $user->getFirstName();
                header('Location: ../index.php');
                exit();
            } else echo "Le mot de passe n'est pas valide";
        } else echo "L'utilisateur recherché n'existe pas !";
    } else { //cas d'incription
        if($user->load($bdd)) echo "L'addresse mail à déjà été utilisée";
        else {
            $user->setPassWord($_POST['password']);
            $user->setEmail($_POST['email']);
            $user->setLastName($_POST['lastname']);
            $user->setFirstName($_POST['firstname']);
            $user->add($bdd);
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['nom'] = $user->getLastName();
            $_SESSION['prenom'] = $user->getFirstName();
            header('Location: ../index.php');
        }
    }