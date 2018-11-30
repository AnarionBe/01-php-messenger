<?php

$idUser = //his email/alias
$lastLoginDate = //date of the last login of each user
$idconversation = //id of each conversation that has been created
$lastMessageDate = //date and hour of the last message posted
$messages = //number of messages in out table


// loop: 
for ($number = 0; $number < $messages; $number++){
    if ($lastLoginDate >= $lastMessageDate){
        echo "non lus"
    }
    
    elseif ($lastLoginDate < $lastMessageDate){
        echo "lus"
    }
}





?>