<?php

class User {
    private $email;
    private $password_hash;
    private $firstName;
    private $lastName;

    public function __construct($email) {
        $this->email = $email;
        $this->password_hash = null;
        $this->firstName = null;
        $this->lastName = null;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setPassword($password) {
        $this->password_hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
    }

    public function load($bdd) {
        $result = $bdd->query("SELECT * FROM users WHERE email = '$this->email'");
        $tmp = $result->fetch();
        if(!$tmp) return false;
        $this->password_hash = $tmp['password_hash'];
        $this->firstName = $tmp['firstname'];
        $this->lastName = $tmp['lastname'];
        return true;
    }

    public function add($bdd) {
        $bdd->query("INSERT INTO users(email, password_hash, firstname, lastname) VALUES('$this->email', '$this->password_hash', '$this->firstName', '$this->lastName');");
    }

    public function checkPassword($password) {
        if(password_verify($password, $this->password_hash)) return true;
        else return false;
    }

    public function participateTo($bdd, $conv) {
        $idConv = $conv->getId();
        $result = $bdd->query("SELECT * FROM conversationParticipation");
        if($result) $tmp = $result->fetch();
        else return false;
        if($tmp['idConversation'] == $idConv && $tmp['user'] = $this->email) return true;
        else return false;
    }
}