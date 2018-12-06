<?php
    require('../class/User.php');
    session_start();
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
                $user->deleteHash();
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
        $user->setPseudo($_POST['pseudo']);
        if($user->load($bdd)) {
            $_SESSION['signup_error'] = "⚠️ L'adresse mail à déjà été utilisée !";
            header('Location: ../pages/login.php');
            exit();
        } else {
            if($user->checkPseudo($bdd)) {
                $user->setPassword($_POST['password']);
                $user->setEmail($_POST['email']);
                $user->setLastName($_POST['lastname']);
                $user->setFirstName($_POST['firstname']);
                $user->add($bdd);
                $_SESSION['user'] = $user;
                header('Location: ../index.php');
                exit();
            } else {
                $_SESSION['signup_error'] = "⚠️ Le pseudo à déjà été utilisée !";
                header('Location: ../pages/login.php');
                exit();
            }
        }
    }