<?php
    session_start();

    require(dirname(__DIR__) . '/class/User.php');

    try {
        $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

    if(isset($_POST["send-profile"])){
        // Changement de MDP
        if (!empty($_POST)){
            if(!empty($_POST['password']) || $_POST['password'] != $_POST['confirmPassword']){
                echo("Les mots de passes ne correspondent pas.");
            }else{
                $email = $_SESSION['email']->id;
                $password->setPassword($value);
                $pdo->prepare('UPDATE users SET password = ? WHERE email = ?')->execute([$password, $email]);
                echo("Votre mot de passe à bien été mis à jour.");
            }
        }
    }
    
    if(isset($_POST["send-avatar"])){
        echo("prout");
    }

    //MDP

    if (!empty($_POST)){
        if(!empty($_POST['password']) || $_POST['password'] != $_POST['confirmPassword']){
            echo("Les mots de passes ne correspondent pas");
        }else{
            $email = $_SESSION['email']->id;
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $pdo->prepare('UPDATE users SET password = ? WHERE email = ?')->execute([$password, $email]);
            echo("Votre mot de passe à bien été mis à jour.");
        }
    }

    // Changement du prenom

    if (!empty($_POST)){
            $email = $_SESSION['email']->id;
            $prenom = "";
            $pdo->prepare('UPDATE users SET firstname = ? WHERE email = ?')->execute([$firstname, $email]);
            echo("Votre mot de passe à bien été mis à jour.");
    }

    // Changement du nom

    if (!empty($_POST)){
        $email = $_SESSION['email']->id;
        $nom = "";
        $pdo->prepare('UPDATE users SET lastname = ? WHERE email = ?')->execute([$lastname, $email]);
        echo("Vos données ont bien été mises à jour.");
    }

    // Changement du mail

    if (!empty($_POST)){
        if ($_POST['email'] != $_Post['confirmEmail']){
            echo("Vos emails ne correspondent pas");
        }else{
            $email = $_SESSION['email']->id;
            $email = "";
            $pdo->prepare('UPDATE users SET email = ? WHERE email = ?')->execute([$email, $email]);
            echo("Votre email à bien été mis à jour.");
        }
    }