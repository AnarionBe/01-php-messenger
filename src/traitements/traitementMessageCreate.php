<?php
        require("../class/User.php");
        session_start();
        try
        {
                $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8mb4', 'messenger', 'messenger');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }

                // Modifying msgs
        if ($_POST['modification']){
                $modification = htmlspecialchars($_POST['modification']);
                $ID = $_POST['id'];
                $req = $bdd->query("UPDATE messages SET message = '$modification' WHERE id = $ID");
        } elseif ($_POST['message']) {
                //Insert messages with 'prepare' and variables
                $message = htmlspecialchars($_POST['message']);
                $date = date("Y-m-d H:i:s");
                $conversation = $_POST['conv'];
                $author = $_SESSION['user']->getPseudo();
                $req = $bdd->query("INSERT INTO messages VALUES(null, '$author', '$conversation', '$message', '$date');");

        }

        header("Location: ../index.php?conv=".$_POST['conv']);
        exit();

