<?php

class Reaction {
    public $id_message;
    public $author;
    public $emoji;

    public function __construct($id_message, $author, $emoji) {
        $this->id_message = $id_message;
        $this->author = $author;
        $this->emoji = $emoji;
    }

    public function setEmoji($emoji) {
        $this->emoji = $emoji;
    }

    public function setMessage($id_message) {
        $this->id_message = $id_message;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function add($bdd) {
        $tmp = $this->author.$this->id_message.$this->emoji;
        $bdd->query("INSERT INTO reaction(id_reaction, author, emoji, id_message) VALUES ('$tmp', '$this->author', '$this->emoji', '$this->message')");
    }
};