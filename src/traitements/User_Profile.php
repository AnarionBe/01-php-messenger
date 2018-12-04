<?php

   
    
    if(isset($_POST["send-avatar"])){
        echo("prout");
    }

    /*

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
    }*/