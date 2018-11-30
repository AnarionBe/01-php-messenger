<?php
    session_start();
    require('../class/User.php');
    $_SESSION['login_error'] = "";
    $_SESSION['signup_error'] = "";

    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

    $user = new User($_POST['email']);

    if(!isset($_POST['signup'])) { //cas de login
        if($user->load($bdd)) {
            if($user->checkPassword($_POST['password'])) {
                /*$_SESSION['email'] = $user->getEmail();
                $_SESSION['nom'] = $user->getLastName();
                $_SESSION['prenom'] = $user->getFirstName();*/
                $_SESSION['user'] = $user;
                header('Location: ../index.php');
                exit();
            } else {
                $_SESSION['login_error'] = "⚠️ Le mot de passe ou l'adresse mail est invalide !";
                header('Location: ../pages/login.php');
                exit();
            }
        } else {
            $_SESSION['login_error'] = "⚠️ Le mot de passe ou l'adresse mail est invalide !";
            header('Location: ../pages/login.php');
            exit();
        }
    } else { //cas d'incription
        if($user->load($bdd)) {
            $_SESSION['signup_error'] = "⚠️ L'adresse mail à déjà été utilisée !";
            header('Location: ../pages/login.php');
            exit();
        } else {
            $user->setPassword($_POST['password']);
            $user->setEmail($_POST['email']);
            $user->setLastName($_POST['lastname']);
            $user->setFirstName($_POST['firstname']);
            $user->add($bdd);
            /*$_SESSION['email'] = $user->getEmail();
            $_SESSION['nom'] = $user->getLastName();
            $_SESSION['prenom'] = $user->getFirstName();*/
            $_SESSION['user'] = $user;
            header('Location: ../index.php');
            exit();
        }
    }