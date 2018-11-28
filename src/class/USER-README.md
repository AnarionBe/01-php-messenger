# USER-README

## Constructor

```php
$user = new User($email);
```

$email -> contient l'adresse email du User;

---

## Getters

`getEmail()` -> Return user's email.

`getLastName()` -> Return user's lastname.

`getFirstName()` -> return user's firstname.

---

## Setters

`setEmail($value)` -> Set user's email with `$value` content.

`setLastName($value)` -> Set user's lastname with `$value` content.

`setFirstName($alue)` -> Set user's firstname with `$value` content.

`setPassword($value)` -> Apply a BCRYPT hash on `$value` and use it to set user's password.

---

## Methods

`load($pdo)` -> Search for the user in the given PDO object. Return true if the user has been found. Else return false. This method generate the sql query by itself.

`add($pdo)` -> Add the user into the given PDO object. This method generate the sql query by itself.

`checkPassword($password)` -> Apply `password_verify` on `$password` and the user hashed password. Return true if there is a match or false if not.