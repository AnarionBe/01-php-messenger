<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profil Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</head>
<body>

<header></header>

    <div class="profil" align="center">
        <h2>Profil utilisateur</h2>
        <img src="" alt="avatar_user"/>

        <p> Salut <?php echo $user ?> ! </p>

            <table>
                <div class="names">
                    <tr>
                        <td><label for="Prénom">Prénom</label></td>
                    </tr>

                    <tr>
                        <td><input type="text" placeholder="Votre prénom" id="firstname" name="firstname" value=""></td>
                    </tr>

                    <tr>
                        <td><label for="Nom">Nom</label></td>
                    </tr>

                    <tr>
                        <td><input type="text" placeholder="Votre nom" id="lastname" name="lastname" value=""></td>
                    </tr>

                </div>

                <div class="pwd">
                    <tr>
                        <td><label for="Mot de passe">Nouveau mot de passe</label></td>
                    </tr>

                    <tr>
                        <td><input type="password" placeholder="Votre mot de passe" id="password" name="password" value=""/></td>
                    </tr>

                    <tr>
                        <td><label for="Confirmez votre mot de passe">Confirmez votre mot de passe</label></td>
                    </tr>

                    <tr>
                        <td><input type="password" placeholder="Confirmez votre mot de passe" id="confirmpassword" name="confirmpassword" value=""></td>
                    </tr>
                </div>

                <div class="contmail">
                    <tr>
                        <td><label for="E-mail">E-mail</label></td>
                    </tr>

                    <tr>
                        <td><input type="email" placeholder="Votre e-mail" id="email" name="email" value=""></td>
                    </tr>

                    <tr>
                        <td><label for="E-mail">Confirmez l'e-mail</label></td>
                    </tr>

                    <tr>
                        <td><input type="email" placeholder="Confirmez votre e-mail" id="email2" name="email2" value=""></td>
                    </tr>
                </div>

                <div class="bconfirm">
                    <tr>
                        <td><button>Confirmer vos changements</button></td>
                    </tr>
                </div> 
            </table>
    </div>

    <footer></footer>
</body>