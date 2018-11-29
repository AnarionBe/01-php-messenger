<?php
  session_start();
  require '../traitements/avatar.php';
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
     <h2>Bienvenue, <?php echo $_POST['prenom'] ?></h2>

     <p>
       <div class="configProfile">
          <form action="../traitements/User_Profile.php" method="post" class="profileModif">

            <div class="nom">

              <div class="nomLab">
                <label for="nom">Nom :</label>
              </div>

              <div class="nomInput">
                <input type="text" name="nom" value="">
              </div>

            </div>

            <div class="prenom">

              <div class="prenomLab">
                <label for="prenom">Prénom :</label>
              </div>

              <div class="prenomInput">
                <input type="text" name="prenom" value="">
              </div>

            </div>

            <div class="email">

              <div class="emailLab">
                <label for="email">Email :</label>
              </div>

              <div class="emailInput">
                <input type="text" name="email" value="">
              </div>

            </div>

            <div class="confirmEmail">

              <div class="confirmEmailLab">
                <label for="confirmemail">Confirmation de l'email :</label>
              </div>

              <div class="confirmEmailInput">
                <input type="text" name="confirmEmail" value="">
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
                <input type="submit" name="send-profile" value="Confirmer">
              </div>

              <div class="cancel">
                <button type="reset" name="resetButton" value="Annuler">Annuler</button>
              </div>
            </div>


          </form>
        </div>
    </p>

  </body>
</html>
