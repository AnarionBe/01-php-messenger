<?php
/*
Pour chaque conversation à laquelle un utilisateur participe, 
la boucle doit faire le tour, dans la base de données, de tous les messages de cette conversation
et récupérer leur date de publication. 
Pour chaque message, comparer la date de dernière connection de l'utilisateur à cette conversation$et les dates de 
publication des messages. 
Pour chaque message dont la date de publication est antérieure ou égale à la date de connection de l'utilisateur, 
on affiche "non lu". 
Pour les autres, on affiche "lus".
*/

$bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');

$lastLoginDate = "2018-02-16 7:45:23";
$idconversation = "l.delduca@hotmail.comconversation";
$lastMessageDate = "2018-02-16 7:46:34";

$result = $bdd -> query("SELECT * FROM conversations WHERE id_conversation='$idconversation'");
$conversation = $bdd -> fetch();

$user = $_SESSION['user'];
// loop: 
    // Checks if current user participates in a conversation
    if($user -> participateTo ($bdd, $conversation)){
        //yes: retrieves the list of messages from a conversation stocked in the database
        $listmessages = $bdd -> query("SELECT * FROM messages WHERE conversation='$idconversation'");
        // as long as there are messages left in the conversation...
        for ($number = 0; $number < $listmessages; $number++){
            if ($lastLoginDate >= $lastMessageDate){
                echo "non lus";
            }
            elseif ($lastLoginDate < $lastMessageDate){
                echo "lus";
            }
        }
    }   





?>