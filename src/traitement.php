<?php
    session_start();

    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = $bdd->query("SELECT * FROM users WHERE email = '$email'");
    $user = $result->fetch();
    
    if(!isset($_POST['signup'])) { //cas de login
        if(!$user) echo "Email ou password incorrect !";
        else {
            if(password_verify($password, $user['password_hash'])) {
                $_SESSION['email'] = $user['email'];
                $_SESSION['nom'] = $user['lastname'];
                $_SESSION['prenom'] = $user['firstname'];
                header('Location: ./index.php');
                exit();
            } else echo "Mot de passe non-valide";
        }
    } else { //cas d'incription
        if($user) echo "L'utilisateur existe déjà";
        else {
            $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $tmp = $bdd->query("INSERT INTO users(email, password_hash, firstname, lastname) VALUES('$email', '$hashedPassword', '$firstName', '$lastName');");
            $_SESSION['email'] = $user['email'];
            $_SESSION['nom'] = $user['lastname'];
            $_SESSION['prenom'] = $user['firstname'];
            header('Location: ./index.php');
            exit();
        }       
    }