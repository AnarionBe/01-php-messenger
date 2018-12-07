# 01-php-messenger

**Partie profil**

*Page de profil*

    La page de profil [src/pages/profil.php] est une page simple qui sert à afficher les informations de l'utilisateur.

    Au chargement, la session de l'utilisateur est démarrée grâce à un session_start();

    On récupère les données dans la BDD afin de les afficher sur l'interface  grâce à un echo des fonctions "getPseudo, getLastname, getFirstname, getEmail" qui ont été mises en place dans le fichier [src/class/User.php].

    La partie ronde avec le logo du messenger Meow est l'endroit supposé afin d'afficher l'avatar de l'utilisateur, mais n'a pas encore été mis en place.
    Un début de code prévu à cet effet se trouve dans le fichier [src/traitements/avatar.php].

    Un bouton de redirection à été mis en place afin de proposer à l'utilisateur de modifier les données de son profil, ce qui l'amènera sur la page [src/pages/modif_profil.php]

*Page de modification de profil*

    La page de modification de profil [src/pages/modif_profil.php] à été réalisée de manière à ce que l'utilisateur rentre ses données dans des inputs, qui sont directement envoyées à la base de données.

    Plusieurs conditions (se trouvant dans le même fichier) vérifient que les champs ont bien été remplis et qu'il n'y a pas d'erreur (champs requis, et mots de passes correspondant).

    Les inputs sont auto-complétées avec les données de l'utilisateur, excepté le mot de passes, afin qu'il n'aie pas a réintroduire à chaque fois ses données s'il désire modifier quelque chose dans son profil.

    Un bouton "annuler" est disponible si celui-ci désire effacer ce qui à été introduit dans les champs.

    Si l'utilisateur clique sur le bouton "Confirmer", les données seront envoyées à la BDD afin que celles-ci soient remplacées par les nouvelles entrées.

    Un lien pour rediriger vers la page précédente est également disponible pour plus de facilité.