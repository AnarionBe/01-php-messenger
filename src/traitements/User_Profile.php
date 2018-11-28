<?php
session_start();

    require '../class/user.php';
    require '../pages/profil.php';

    // Confirmation des modifications

    // Changement de MDP

    if(!empty($_POST['password']) || $_POST['password'] != $_POST['confirmPassword']){
        $_SESSION['email'] = "Les mots de passes ne correspondent pas";
    }else{

    }



/*    // CHANGEMENT DE MOT DE PASSE
    logged_only();
    if (!empty($_POST)){
        if (empty($_POST['password']) || $_POST['password'] != $_POST['confirmPassword']){ // Si le mdp est vide, ou si les mdp ne correspondent pas
            $_SESSION[''] = "Les mots de passes ne correspondent pas"; // Alors ce message s'affichera sur la session de l'utilisateur
        }else{
            $email = $_SESSION['']-> id;
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash du mdp
            $pdo->prepare('UPDATE users SET password = ? WHERE id = ?')->execute([$password, $email]); // Procède à la mise à jour du mdp de l'utilisateur
            $_SESSION[''] = "Votre mot de passe à bien été mis à jour"; // Ce message s'affiche si l'opération est réussie lors de la session de l'utilisateur
        }
    }

    // CHANGEMENT DU PRENOM
    logged_only();
    if (!empty($_POST)){
        if (empty($_POST['fname']){
            $_SESSION[''] = "";
        }else{
            $email = $_SESSION['']-> id; // A REMPLIR ?
            $firstname = ""; // A REMPLIR
            $pdo->prepare('UPDATE users SET firstname = ? WHERE id = ?')->execute([$firstname, $email]);
            $_SESSION[''] = "Vos données ont bien été mises à jour."; // A REMPLIR
        }
    }

    // CHANGEMENT DU NOM
    logged_only();
    if (!empty($_POST)){
        if (empty($_POST['lastname']){ // A MODIFIER
           // $_SESSION[''] = ""; // A REMPLIR
        }else{
            $email = $_SESSION['']-> id; // A REMPLIR ?
            $lastname = ""; // A REMPLIR
            $pdo->prepare('UPDATE users SET lastname = ? WHERE id = ?')->execute([$lastname, $user_id]);
            $_SESSION[''] = "Vos données ont bien été mises à jour."; // A REMPLIR
        }
    }

    // CHANGEMENT DU MAIL
    logged_only();
    if (!empty($_POST)){
        if ($_POST['email'] != $_POST['email2']){
            $_SESSION['email'] = "Vos emails ne correspondent pas.";
        }else{
            $email = $_SESSION['email']-> id; // A REMPLIR
            $email = ""; // A REMPLIR
            $pdo->prepare('UPDATE users SET email = ? WHERE id = ?')->execute([$email, $user_id]);
            $_SESSION[''] = "Vos données ont bien été mises à jour."; // A REMPLIR
        }
    }
?>

*/