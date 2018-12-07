<?php
    require('./class/Conversation.php');
    require('./class/User.php');
    session_start(); 
    
    
    $activeUser = $_SESSION['user'];
    //var_dump($_SESSION['user']);
    //session_destroy();
    try {
        $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8mb4', 'messenger', 'messenger');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="fr-BE">
<head>
    <meta charset="UTF-8mb4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meow</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/lib/css/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet"> 

</head>

<body>
    <div class="container">
    <?php if(sizeof($_SESSION) == 0) {?>
        <!-- Carte de connexion -->
        <div class="carte" >
            <div class="carteImage">
                <a href= "index.php"><img src=/img/MeowLogo_BeCode.png alt="Logo Meow" class="logoMeow"/></a>
            </div>
            
            <div class="carteTexte">
                <h4>Bienvenue sur le chat Meow!</h4>
                <p>Parce que le(s) chat(s) c'est la vie.</p>
                <div class="bouton">
                    <a href="./pages/login.php" class="boutonSeConnecter">Se Meower</a>
                </div>
            </div>
        </div>
    <?php } else {?>
        <div id="connected">
            <aside id="listConv">
                <div id="profile">
                    <a href="./pages/profil.php"><?php echo $_SESSION['user']->getPseudo(); ?></a>
                    <span><?php echo $_SESSION['user']->getEmail();?></span>
                    <form>
                        <button type="submit" formaction="./traitements/deconnection.php">Se déconnecter</button>
                    </form>
                </div>
                <form method="post" action="./traitements/createConv.php" id="createConvForm">
                    <input type="text" name="title" id="newConvName">
                    <input type="submit" id="submitName">
                </form>
            <?php
                $result = $bdd->query("SELECT * FROM conversations");
                while($tmp = $result->fetch()) {
                    $conv = new Conversation($tmp['author'], $tmp['subject']);
                    if($activeUser->participateTo($bdd, $conv)) {
            ?>
                <div class="conv_tile">
                    <a class="conv_name" href="index.php?conv=<?php echo $conv->getSubject();?>"><?php echo $conv->getSubject();?></a>
                </div>
            <?php
                    }
                }
            ?>
            </aside>

            <div id="chatView">
                <!-- liste des messages -->
                <div id="msgList">
                <?php
                    $conv = $_GET['conv'];
                    $answer = $bdd->query("SELECT * FROM messages WHERE conversation='$conv' ORDER BY id");
                    $i = 0;
                    while($data = $answer->fetch()) {
                ?>
                    <div class="msg <?php if($i % 2 == 0) echo "alternate"?>" data-id=<?php echo $data['id'];?>>
                        <span class="msgTime">(<?php echo $data['hour'];?>) </span>
                        <span class="msgAuthor"><?php echo $data['author'];?> : </span>
                        <span class="msgContent"><?php echo $data['message'];?></span>
                        <?php if($data['author'] == $_SESSION['user']->getPseudo()) {?>
                        <button class="msgEditButton">Modifier</button>
                        <?php }?>
                    </div>
                <?php 
                    $i++;
                }?>
                </div>

                <!-- formulaire envoi de message -->
                <form action="./traitements/traitementMessageCreate.php" class="sendChat" method="post" >
                    <p class="emoji-picker-container"> 
                        <textarea type="text" name="message" data-emojiable="true" placeholder="Message à <?php echo $_GET['conv'];?>" class="msgToSend"></textarea>
                    </p>
                    <input type="text" value="<?php echo $_GET['conv'];?>" name="conv" class="hide">
                    <input type="submit" value="Meow" class="submit"/>
                </form>
            </div>
        </div>
    </div>
    <?php }?>
    <footer class = "footer">
        <?php if(sizeof($_SESSION) == 0) {
            include("footer.php");
        }?>
        <script src="./js/home.js"></script>
    </footer>


<!-- SCRIPT pour afficher le choix des emojis -->
  <script src="/pages/jQuery.js"></script>
  <script src="/lib/js/config.js"></script>
  <script src="/lib/js/util.js"></script>
  <script src="/lib/js/jquery.emojiarea.js"></script>
  <script src="/lib/js/emoji-picker.js"></script>

<script>
    $(function() {
    // Initializes and creates emoji set from sprite sheet
    window.emojiPicker = new EmojiPicker({
        emojiable_selector: '[data-emojiable=true]',
        assetsPath: '/lib/img/',
        popupButtonClasses: 'fa fa-smile-o'
    });
    // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
    // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
    // It can be called as many times as necessary; previously converted input fields will not be converted again
    window.emojiPicker.discover();
    });
</script>

<!-- FIN DU SCRIPT pour afficher le choix des emojis -->
    
</body>
</html>
