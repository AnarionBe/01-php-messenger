<?php
    require('./class/Conversation.php');
    require('./class/User.php');
    session_start();
    
    $activeUser = $_SESSION['user'];
    //var_dump($_SESSION['user']);
    //session_destroy();
    try {
        $bdd = new PDO('mysql:host=mysql;dbname=messenger;charset=utf8', 'messenger', 'messenger');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="fr-BE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meow</title>
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

                <!-- formulare envoi de message -->
                <form action="./traitements/traitementMessageCreate.php" class="sendChat" method="post">
                    <textarea name="message" placeholder="Message à <?php echo $_GET['conv'];?>" class="msgToSend"></textarea>
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
    
</body>
</html>
