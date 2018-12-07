<?php

  require(dirname(__DIR__) . '/class/User.php');
  require(dirname(__DIR__) . '/traitements/avatar.php');
  session_start();

  // Session de l'utilisateur
  $user = $_SESSION['user'];

  if (is_null($user)){
    header('Location: /');
  }

  // Accès à la base de donnée 

  try {
    $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

$errors = [];

function getField($user, $datas, $field) {
  if (array_key_exists($field, $datas)) {
    return $datas[$field];
  } else {
    $getter = 'get' . ucfirst($field);
    return $user->$getter();
  }
}


// Changement et vérification du mot de passe
  // Changement de MDP
  if (!empty($_POST)){ // Dans le cas où l'utilisateur n'entre pas les même mots de passe.
      if(!empty($_POST['password']) && $_POST['password'] != $_POST['confirmPassword']){
        $errors['profil_error_password'] = "Les mots de passe ne correspondent pas.";
      }

      if(empty($_POST['pseudo'])){
        $errors['profil_error_pseudo'] = "Ce champ est requis";
      }

      if(empty($_POST['firstName'])){ 
        $errors['profil_error_firstName'] = "Ce champ est requis";
      }

      if(empty($_POST['lastName'])){
        $errors['profil_error_lastName'] = "Ce champ est requis";
      }

      if(empty($_POST['email'])){
        $errors['profil_error_email'] = "Ce champ est requis";
      }

      if (empty($errors)){ // Changement de pseudo
        $pseudo = $_POST['pseudo'];
        $temp = $bdd->prepare('UPDATE users SET pseudo = ? WHERE email = ?')->execute([$pseudo, $user->getEmail()]);
      }
    
      if (empty($errors)) { // Changement de nom
        $lastName = $_POST['lastName'];
        $bdd->prepare('UPDATE users SET lastname = ? WHERE email = ?')->execute([$lastName, $user->getEmail()]);
      }

      if (empty($errors)){ // Changement de prénom
        $firstName = $_POST['firstName'];
        $bdd->prepare('UPDATE users SET firstname = ? WHERE email = ?')->execute([$firstName, $user->getEmail()]);
      }

      if (empty($errors)){ // Changement d'email
        $email = $_POST['email'];
        $bdd->prepare('UPDATE users SET email = ? WHERE email = ?')->execute([$email, $user->getEmail()]);
      }

      if (empty($errors)){ // Changement de password
        $password = $_POST['password'] && $_POST['confirmPassword'];
        $bdd->prepare('UPDATE users SET password = ? WHERE email = ?')->execute([$password, $user->getEmail()]);
      }
  }


?> 

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="modifProfil.css" />
    <title>Meowser - Modifier le profil</title>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  </head>
  <body>

    <div>
      <h1 class="titleProfile">Modifier votre profil </h1>
    </div>


     <p>
       <div class="configProfile">
          <form action="../pages/modif_profil.php" method="post" class="profileModif">

          <div class="fields">
              <div class="pseudo">

                <div class="lab">
                  <label for="Pseudo">Pseudo :</label>
                </div>

                <div class="input">
                  <input type="text" name="pseudo" value="<?php echo getField($user, $_POST, 'pseudo'); ?>">

                  <?php 
                    if(array_key_exists('profil_error_pseudo', $errors)){
                      echo '<p class="error">' . $errors['profil_error_pseudo'] . '</p>';
                    }
                  ?>

                </div>
              </div>

              <div class="nom">

                <div class="lab">
                  <label for="nom">Nom :</label>
                </div>

                <div class="input">
                  <input type="text" name="lastName" value="<?php echo getField($user, $_POST, 'lastName'); ?>">

                  <?php 
                    if(array_key_exists('profil_error_lastName', $errors)){
                      echo '<p class="error">' . $errors['profil_error_lastName'] . '</p>';
                    }
                  ?>
                </div>

              </div>

              <div class="prenom">

                <div class="lab">
                  <label for="prenom">Prénom :</label>
                </div>

                <div class="input">
                  <input type="text" name="firstName" value="<?php echo getField($user, $_POST, 'firstName'); ?>">

                  <?php 
                    if(array_key_exists('profil_error_firstName', $errors)){
                      echo '<p class="error">' . $errors['profil_error_firstName'] . '</p>';
                    }
                  ?>
                </div>

              </div>

              <div class="email">

                <div class="lab">
                  <label for="email">Email :</label>
                </div>

                <div class="input">
                  <input type="text" name="email" value="<?php echo getField($user, $_POST, 'email'); ?>">

                  <?php 
                    if(array_key_exists('profil_error_email', $errors)){
                      echo '<p class="error">' . $errors['profil_error_email'] . '</p>';
                    }
                  ?>
                </div>

              </div>

              <div class="password">

                <div class="lab">
                  <label for="password">Nouveau mot de passe :</label>
                </div>

                <div class="input">
                  <input type="password" name="password" value="">
                </div>

              </div>

              <div class="confirmPassword">

                <div class="lab">
                  <label for="confirmpassword">Confirmation du mot de passe :</label>
                </div>

                <div class="input">
                  <input type="password" name="confirmPassword" value="">

                  <?php 
                    if(array_key_exists('profil_error_password', $errors)){
                      echo '<p class="error">' . $errors['profil_error_password'] . '</p>';
                    }
                  ?>
                </div>
              </div>
            </div>

           <!--< <div class="avatar">
              <form action="avatar.php" method="post" enctype="multipart/formdata">
                <input type="file" name="profilpic">
                <input type="submit" name="send-avatar" value="Uploader votre avatar">
              </form>
            </div>-->

            <div class="buttons">
              <div class="submit">
                <button type="submit" value="Confirmer">Confirmer</button>
              </div>

              <div class="cancel">
                <button type="reset" value="Annuler">Annuler</button>
              </div>
            </div>

            <div class="goBack">
              <a href="profil.php">Revenir en arrière</a>
            </div>

          </form>
        </div>
    </p>

  </body>
</html>
