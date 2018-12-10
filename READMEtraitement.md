**Les pages de Traitement**

Situées dans le dossier le dossier "traitement" du dossier "src". Les pages php contenues dans ce dossier permettent d'effectuer toutes les requête qui font appellent à la base de donnée MySQL ou aux différentes classes d'objets (cfr. conversations, réactions, messages et users).


*ajoutUser.php*

Traitement qui permet d'ajouter un utilisateur à une discussion dans la page index. L'utilisateur qui veut ajouter une autre personne à la discussion va donc rentrer le nom de cette personne dans un formulaire. Une requête sql est alors initiée afin de vérifier que la personne fait bien partie de la base de donnée et peut être ajoutée.
1) Si le pseudo est mauvais, rien ne se passe.
2) Si le pseudo est bon, la personne est ajoutée à la conversation.  


*avatar.php*

Traitement qui permet de télécharger une image pour son avatar sur la page "modification du profil.
Lors de ce processus, la taille et l'extension du fichier sont vérifiées. Enfin le fichier est validé ou non pour l'utilisateur.


*caching.php*

Traitement non utilisé qui a pour but d'enregistre en cache les infos de l'utilisateur durant 1h.


*createConv.php*

Traitement qui permet de créer de nouvelles conversations pour les utilisateurs. L'utilisateur peut en créer une nouvelle dans la page "index" en tapant simplement le titre de la conversation et en cliquant sur le bouton "créer".


*deconnection.php*

Traitement simple pour déconnecter un utilisateur présent sur la page "index").


*insertReaction.php*

Traitement non utilisé qui doit permettre aux utilisateurs d'ajouter des réactions aux messages d'une discussion.


*logout.php*

Traitement simple pour déconnecter un utilisateur présent sur la page "index").


*traitementLogin.php*

Traitement qui a une double fonctionnalité; soit se connecter, soit s'enregistrer. Pour s'enregistrer il suffit de cocher la case "créer un compte" dans le formulaire. Ce formulaire est la page d'accueil du site internet.
1) Si la case n'est pas cochée: il permet aux utilisateurs de se connecter. Pour se faire il faut vérifier que l'identifiant (adresse mail) et le mot de passe corresponde bien à un compte utilisateur dans la base de donnée.
2) Si la case est cochée: cela permet à la personne de créer un nouveau compte. Il faut alors vérifier que le mail est plausible et ne corresponde pas à un autre compte et que le mot de passe est assez complexe. Le mot de passe est ensuite hashé pour être protégé.


*traitementMessageCreate.php*

Traitement qui permet de créer un nouveau message dans une discussion ou d'en modifier un déjà envoyé par son auteur. Deux cas donc:
1) Un message a déjà été envoyé et son auteur clique sur le bouton "modifier" juste à côté du message qu'il a déjà posté. Il peut alors le changer et un update sera fait dans la base de donnée.
2) Le personne veut envoyer un nouveau message et il clique donc sur le bouton "envoyer" juste à côté du message qu'il vien de rédiger. Le message sera donc enregistrer dans la base de donnée comme une nouvelle ligne.


*traitementMessagesNonLus.php*

Traitement qui permet d'afficher si le message est lu ou non lu dans une conversation.
Pour chaque conversation à laquelle un utilisateur participe, la boucle doit faire le tour, dans la base de données, de tous les messages de cette conversation
et récupérer leur date de publication. 
Pour chaque message, comparer la date de dernière connection de l'utilisateur à cette conversation$et les dates de publication des messages. 
1) Pour chaque message dont la date de publication est antérieure ou égale à la date de connection de l'utilisateur, 
on affiche "non lu". 
2) Pour les autres, on affiche "lus".


*traitementReactions.php*

Traitement qui permet aux utilisateurs d'ajouter des réactions aux messages d'une discussion.
