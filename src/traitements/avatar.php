<?php

    // Envoi du fichier

    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0){

        // Taille fichier

        if ($_FILES['file']['size'] <= 8000000){

            // Vérification d'extension

            $infofile = pathinfo($_FILES['file']['name']);
            $extUpload = $infofile['extension'];
            $extAuthorized = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extUpload, $extAuthorized)){

                // Validation du fichier
                move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . basename($_FILES['file']['name']));
                echo("L'avatar à bien été envoyé !");
            }
        }
    }