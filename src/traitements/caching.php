<?php
    require(__DIR__.'/../class/User.php');
    function setCache() {
        $cacheFile = __DIR__."../cache/users.json";
        $validity = time() - 3600; //1 heure

        if(file_exists($cacheFile) && filemtime($cacheFile) > $validity) {
            echo "ok"; //lire le fichier
        } else {
            try {
                $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
            } catch(Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
            
            $result = $bdd->query("SELECT * FROM users");
        
            $tab = array();
            while($data = $result->fetch()) {
                $user = new User($data['email']);
                $user->setFirstName($data['firstname']);
                $user->setLastName($data['lastname']);
                array_push($tab, $user->toJson());
            }
            fopen($cacheFile, "W");
        }
    }