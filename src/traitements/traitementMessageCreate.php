<?php
        require("../class/User.php");
        session_start();
        try
        {
                $add_message = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }

                // Modifying msgs
        if ($_POST['modification']){
                $newMessage = $_POST['modification'];
                $ID = $_POST['id'];
                $req = $add_message -> prepare("UPDATE messages SET message = '$newMessage' WHERE id = $ID");
                $req->execute();
                $_POST['modification'] = ""; // Reboot variable 'modification'
        }
        elseif ($_POST['message']) {
                // Insert messages with 'prepare' and variables
                $date = date("Y-m-d H:i:s");
                $conversation = $_POST['conv'];
                $author = $_SESSION['user']->getEmail();
                $message = $_POST['message'];
                $req = $add_message->query("INSERT INTO messages VALUES(null, '$author', '$conversation', '$message', '$date');");
                $_POST['message'] = ""; // Reboot variable 'message'
        }

        header("Location: ../index.php?conv=".$_POST['conv']);
        exit();
?>




