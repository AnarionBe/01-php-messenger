<?php

//Création de la classe conversation qui est définie par un auteur et un sujet de conversation.
class Conversation {
    private $author;
    private $sujet;

    //Le constructeur permet de définir la méthode de création d'objet.
    public function __construct($author, $sujet) {
        $this->sujet = $sujet;
        $this->author = $author;
    }

    //Fonction qui permet de définir le sujet.
    public function setSujet($sujet) {
        $this->sujet = $sujet;
    }

    //Fonction qui permet de retourner le sujet.
    public function getSujet() {
        return $this->sujet;
    }

    //Fonction qui permet de définir l'auteur.
    public function setAuthor($author) {
        $this->author = $author;
    }

    //Fonction qui permet d'ajouter toutes les informations de la conversation dans la base de données.
    public function add($bdd) {
        $tmp= $this->author.$this->sujet;
        $bdd->query("INSERT INTO conversations(id_conversation, author, sujet) VALUES ('$tmp', '$this->author', '$this->sujet')");
    }

} ?>