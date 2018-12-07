<?php
    class User {
        private $email;
        private $password_hash;
        private $firstName;
        private $lastName;
        private $pseudo;

        public function __construct($email) {
            $this->email = $email;
            $this->password_hash = null;
            $this->firstName = null;
            $this->lastName = null;
            $this->pseudo = null;
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
    
    public function getPseudo() {
        return $this->pseudo;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
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
    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    public function load($bdd) {
        $result = $bdd->query("SELECT * FROM users WHERE email='$this->email'");
        $tmp = $result->fetch();
        if(!$tmp) return false;
        $this->pseudo = $tmp['pseudo'];
        $this->password_hash = $tmp['password_hash'];
        $this->firstName = $tmp['firstname'];
        $this->lastName = $tmp['lastname'];
        return true;
    }

    public function add($bdd) {
        $bdd->query("INSERT INTO users VALUES('$this->email', '$this->pseudo', '$this->password_hash', '$this->firstName', '$this->lastName');");
    }

    public function checkPassword($password) {
        if(password_verify($password, $this->password_hash)) return true;
        else return false;
    }

    public function participateTo($bdd, $conv) {
        $idConv = $conv->getSubject();
        $user = $this->pseudo;
        $result = $bdd->query("SELECT * FROM conversationParticipation WHERE subject='$idConv' AND user='$user'");
        return $result->fetch();
    }

    public function deleteHash() {
        $this->password_hash = "";
    }

    public function checkPseudo($bdd) {
        $result = $bdd->query("SELECT * FROM users WHERE pseudo='$this->pseudo'");
        $tmp = $result->fetch();
        if($tmp) return false;
        return true;
    }
}