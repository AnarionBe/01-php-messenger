<?php
class Conversation {
    private $author;
    private $subject;

    public function __construct($author, $subject) {
        $this->subject = $subject;
        $this->author = $author;
    }
}