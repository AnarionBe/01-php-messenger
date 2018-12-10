# 01-php-messenger

L'utilisateur arrive sur la page d'accueil du chat [http://localhost:8000/index.php] et doit cliquer sur "Se Meower" pour accèder à la page suivante.

Sur cette deuxième page, [http://localhost:8000/pages/login.php], l'utilisateur a deux possibilités quant au formulaire:
    Soit il possède déjà un compte sur le chat et doit alors se connecter. Dans les champs libre, il doit entrer son adresse mail et son mot de passe*.
    Ou alors, il ne possède pas encore de compte et désire s'inscrire. Il doit donc cocher l'option "créer un compte". De nouveaux champs libres apparaissent. En plus de son adresse mail et d'un mot de passe, on lui demande d'entrer un pseudo, son nom et son prénom. Ces nouvelles informations seront stockées dans la BDD. Le bouton "s'inscrire" lui permet d'accèder au chat. 
*un mot de passe valide contient obligatoirement une majuscule et une minuscle, un chiffre et doit contenir au moins 8 caractères. 
Important: une fonction htmlspecialchars empêche l'utilisateur d'injecter du HTML ou du JS dans les chaines de la page.

L'utilisateur est redirigé vers la page de chat [http://localhost:8000/index.php].
    Sur la gauche: 
        - Les données d'identification de l'utilisateur courant apparaissent: son identifiant et son adresse mail. En cliquant sur son identifiant, l'utilisateur est redirigé vers l'espace membre.
        - Avec le bouton juste en dessous, il a la possibilité de se déconnecter. 
        - Un champ libre et un bouton "submit" permet à l'utilisateur de créer une conversation en lui donnant un intitulé. 
        - Une fois cette conversation créée, elle apparait aussi dans la partie gauche de l'écran. En cliquant sur son titre, l'utilisateur peut envoyer ses messages.
        - Il ajoute d'autres utilisateurs à sa conversation en entrant le pseudo de l'utilisateur et en cliquant sur le bouton "ajouter".
    La partie inférieure:
        -  Une zone de texte lui permet d'écrire son message et de l'envoyer grâce au bouton "Meow" situé sur la droite. 
        -  A l'intérieur de la zone de texte, l'utilisateur a la possibilité d'ajouter un emoji à son texte; les emojis sont à choisir dans une liste déroulante. 
    La partie centrale:
        - Les messages de tous les utilisateurs qui participent à la conversation apparaissent dans la zone centrale. 
        - Une fois un message envoyé, l'utilisateur a la possibilté de l'éditer en cliquant sur le bouton "modifier" qui se trouve à côté de chacun de ses messages. Au clic sur ce bouton, le message s'ouvre dans un formulaire dans lequel l'utilisateur peut lui apporter des modifications. Il a alors le choix de confirmer ses changements en cliquant sur le bouton "confirmer" à droite du formulaire ou de les annuler en cliquant sur le bouton "annuler" situé à la droite du formulaire. 
        - Pour chaque message ajouté dans la conversation, tous les utilisateurs peuvent ajouter une réaction. Pour cela, ils cliquent sur l'émoticône thumb_up situé à droite du monde. Un compteur enregistre les nombres de "likes" pour chaque message. 

L'utilisateur peut accèder à l'espace membre en cliquant sur son pseudo, à gauche de l'écran. Il est d'abord redirigé vers la page de profil [http://localhost:8000/pages/profil.php] puis, s'il le désire, vers la page de modification de profil [http://localhost:8000/pages/modif_profil.php]s'il souhaite éditer ses informations.

   - La page de profil [src/pages/profil.php] est une page simple qui sert à afficher les informations de l'utilisateur.
    Au chargement, la session de l'utilisateur est démarrée grâce à un session_start(); On récupère les données dans la BDD afin de les afficher sur l'interface  grâce à un echo des fonctions "getPseudo, getLastname, getFirstname, getEmail" qui ont été mises en place dans le fichier [src/class/User.php].
    La partie ronde avec le logo du messenger Meow est l'endroit supposé afin d'afficher l'avatar de l'utilisateur, mais n'a pas encore été mis en place.
    Un début de code prévu à cet effet se trouve dans le fichier [src/traitements/avatar.php].
    Un bouton de redirection à été mis en place afin de proposer à l'utilisateur de modifier les données de son profil, ce qui l'amènera sur la page [src/pages/modif_profil.php]

    - La page de modification de profil [src/pages/modif_profil.php] à été réalisée de manière à ce que l'utilisateur rentre ses données dans des inputs, qui sont directement envoyées à la base de données "users".
    Plusieurs conditions (se trouvant dans le même fichier) vérifient que les champs ont bien été remplis et qu'il n'y a pas d'erreur (champs requis, et mots de passes correspondant).
    Les inputs sont auto-complétées avec les données de l'utilisateur, excepté le mot de passes, afin qu'il n'aie pas a réintroduire à chaque fois ses données s'il désire modifier quelque chose dans son profil.
    Un bouton "annuler" est disponible si celui-ci désire effacer ce qui à été introduit dans les champs.
    Si l'utilisateur clique sur le bouton "Confirmer", les données seront envoyées à la BDD afin que celles-ci soient remplacées par les nouvelles entrées.
    Un lien pour rediriger vers la page précédente est également disponible pour plus de facilité.



