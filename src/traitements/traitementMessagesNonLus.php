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

$lastLoginDate = "2018-02-16 7:45:23" //date and hour of the last login of each user
$idconversation = "l.delduca@hotmail.comconversation" //id of each conversation that has been created
$lastMessageDate = "2018-02-16 7:46:34" //date and hour of the last message posted

$result = $bdd -> query("SELECT * FROM conversations WHERE id_conversation='$idconversation'");
$conversation = $result -> fetch();

// loop: 
    if($_SESSION['user'] -> participateTo ($bdd, $conversation)){
        $listmessages = $bdd -> query("SELECT * FROM messages WHERE conversation='$idconversation'");
        while ()
        if ($lastLoginDate >= $lastMessageDate){
            echo "non lus"
        }
        elseif ($lastLoginDate < $lastMessageDate){
            echo "lus"
        }
    }   





?>