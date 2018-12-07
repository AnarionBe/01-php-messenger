<?php
    //Création de la classe conversation qui est définie par un auteur et un sujet de conversation.
    class Conversation {
        private $author;
        private $subject;

        //Le constructeur permet de définir la méthode de création d'objet.
        public function __construct($author, $subject) {
            $this->subject = $subject;
            $this->author = $author;
        }

        //Fonction qui permet de définir le sujet.
        public function setSubject($subject) {
            $this->subject = $subject;
        }

        //Fonction qui permet de retourner le sujet.
        public function getSubject() {
            return $this->subject;
        }

        //Fonction qui permet de définir l'auteur.
        public function setAuthor($author) {
            $this->author = $author;
        }

        //Fonction qui permet d'ajouter toutes les informations de la conversation dans la base de données.
        public function add($bdd, $user) {
            $date = date("Y-m-d H:i:s");
            $bdd->query("INSERT INTO conversations VALUES('$this->subject', '$this->author')");
            $bdd->query("INSERT INTO conversationParticipation VALUES('$this->subject', '$user', '$date')");
        }

        public function addParticipant($bdd, $user) {
            $date = date("Y-m-d H:i:s");
            var_dump($bdd->query("INSERT INTO conversationParticipation VALUES('$this->subject', '$user', '$date')"));
        }
    }
