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
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $pseudo = htmlspecialchars ($_POST['pseudo']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $firstname = htmlspecialchars($_POST['firstname']);

    $user = new User ($email);

    if(!isset($_POST['signup'])) { //cas de login
        if($user->load($bdd)) {
            if($user->checkPassword($password)) {
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
        $user->setPseudo($pseudo);
        if($user->load($bdd)) {
            $_SESSION['signup_error'] = "⚠️ L'adresse mail à déjà été utilisée !";
            header('Location: ../pages/login.php');
            exit();
        } else {
            $user->setPassword($password);
            $user->setEmail($email);
            $user->setLastName($lastname);
            $user->setFirstName($firstname);
            $user->add($bdd);
            /*$_SESSION['email'] = $user->getEmail();
            $_SESSION['nom'] = $user->getLastName();
            $_SESSION['prenom'] = $user->getFirstName();*/
            $_SESSION['user'] = $user;
            header('Location: ../index.php');
            exit();
        }
    }