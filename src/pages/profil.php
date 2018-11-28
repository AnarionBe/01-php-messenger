<?php

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
     <h2>Modifier votre profil</h2>

     <p>
       <div class="configProfile">
         <form class="profileModif" action="" method="post">

           <div class="lname">

             <div class="lnameLab">
              <label for="lname">Nom</label>
             </div>

             <div class="lnameInput">
              <input type="text" name="lname" value="">
             </div>

           </div>

           <div class="fname">

             <div class="fnameLab">
              <label for="fname">Prénom</label>
             </div>

             <div class="fnameInput">
              <input type="text" name="fname" value="">
             </div>

           </div>

           <div class="email">

             <div class="emailLab">
              <label for="email">Email</label>
             </div>

             <div class="emailInput">
              <input type="text" name="email" value="">
             </div>

           </div>

           <div class="confirmEmail">

             <div class="confirmEmailLab">
              <label for="confirmemail">Confirmation de l'email</label>
             </div>

             <div class="confirmEmailInput">
              <input type="text" name="confirmemail" value="">
             </div>

           </div>

           <div class="password">

             <div class="passwordLab">
              <label for="password">Nouveau mot de passe</label>
             </div>

             <div class="passwordInput">
              <input type="password" name="password" value="">
             </div>

           </div>

           <div class="confirmPassword">

             <div class="confirmPasswordLab">
              <label for="confirmpassword">Confirmation du mot de passe</label>
             </div>

             <div class="confirmPasswordInput">
              <input type="password" name="confirmpassword" value="">
             </div>

           </div>

           <div class="submit">
             <button type="button" name="submitButton" value="Confirmer">Confirmer</button>
           </div>

           <div class="cancel">
             <button type="reset" name="resetButton" value="Annuler">Annuler</button>
           </div>


         </form>
        </div>
     </p>

   </body>
 </html>
