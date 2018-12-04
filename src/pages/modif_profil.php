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

      if(empty($_POST['firstName'])){ 
        $errors['profil_error_firstName'] = "Ce champ est requis";
      }

      if(empty($_POST['lastName'])){
        $errors['profil_error_lastName'] = "Ce champ est requis";
      }

      if(empty($_POST['email'])){
        $errors['profil_error_email'] = "Ce champ est requis";
      }

      if (empty($errors)) { // Changement de nom
        // nettoyer les données (htmlentities)
        $lastName = $_POST['lastName'];
        // enregistrer les données nettoyées
        $bdd->prepare('UPDATE users SET lastname = ? WHERE email = ?')->execute([$lastName, $user->getEmail()]);
      }

      if (empty($errors)){ // Changement de prénom
        $firstName = $_POST['firstName'];
        $bdd->prepare('UPDATE users SET firstName = ? WHERE email = ?')->execute([$firstName, $user->getEmail()]);
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
    <link rel="stylesheet" type="text/css" href="styleprofil.css" />
    <title>Meowser - Modifier le profil</title>
  </head>
  <body>

     <h1>Meowser</h1> <!--- ajout prénom a l'affichage --->
     <h2>Bienvenue, <?php echo $_SESSION['user']->getFirstName() ?></h2>

     <p>
       <div class="configProfile">
          <form action="../pages/profil.php" method="post" class="profileModif">

            <div class="nom">

              <div class="nomLab">
                <label for="nom">Nom :</label>
              </div>

              <div class="nomInput">
                <input type="text" name="lastName" value="<?php echo getField($user, $_POST, 'lastName'); ?>">

                <?php 
                  if(array_key_exists('profil_error_lastName', $errors)){
                    echo '<p class="error">' . $errors['profil_error_lastName'] . '</p>';
                  }
                ?>
              </div>

            </div>

            <div class="prenom">

              <div class="prenomLab">
                <label for="prenom">Prénom :</label>
              </div>

              <div class="prenomInput">
                <input type="text" name="firstName" value="<?php echo getField($user, $_POST, 'firstName'); ?>">

                <?php 
                  if(array_key_exists('profil_error_firstName', $errors)){
                    echo '<p class="error">' . $errors['profil_error_firstName'] . '</p>';
                  }
                ?>
              </div>

            </div>

            <div class="email">

              <div class="emailLab">
                <label for="email">Email :</label>
              </div>

              <div class="emailInput">
                <input type="text" name="email" value="<?php echo getField($user, $_POST, 'email'); ?>">

                <?php 
                  if(array_key_exists('profil_error_email', $errors)){
                    echo '<p class="error">' . $errors['profil_error_email'] . '</p>';
                  }
                ?>
              </div>

            </div>

            <div class="password">

              <div class="passwordLab">
                <label for="password">Nouveau mot de passe :</label>
              </div>

              <div class="passwordInput">
                <input type="password" name="password" value="">
              </div>

            </div>

            <div class="confirmPassword">

              <div class="confirmPasswordLab">
                <label for="confirmpassword">Confirmation du mot de passe :</label>
              </div>

              <div class="confirmPasswordInput">
                <input type="password" name="confirmPassword" value="">

                <?php 
                  if(array_key_exists('profil_error_password', $errors)){
                    echo '<p class="error">' . $errors['profil_error_password'] . '</p>';
                  }
                ?>
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
                <input type="submit" value="Confirmer">
              </div>

              <div class="cancel">
                <button type="reset" value="Annuler">Annuler</button>
              </div>
            </div>


          </form>
        </div>
    </p>

  </body>
</html>
