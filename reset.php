<?php

// CONEXION A LA BDD
include('libphp/cnct_bdd.php');
session_start();

include('libphp/islog.php');
//IF IS LOG REDIRECT
if (islog())
    header('Location: ../index.php');

//RESET
if (isset($_POST['reset_submit'], $_POST['reset_email']))
{
    $reset_email = htmlspecialchars($_POST['reset_email']);
    if (filter_var($reset_email, FILTER_VALIDATE_EMAIL) && !empty($_POST['reset_email'])) {
        $requser = $bdd->prepare("SELECT id, pseudo FROM member WHERE email = ?");
        $requser->execute(array($reset_email));
        if ($requser->rowCount() == 1) {

            //INFO USER
            $userinfo = $requser->fetch();

            //CODE RECUPERATION
            $key = md5(microtime(true) * 100000);

            //INSERTION CODE RECUP BDD
            $reqmailexist = $bdd->prepare('SELECT id FROM `recovery` WHERE mail = ?');
            $reqmailexist->execute(array($reset_email));
            $nb =  $reqmailexist->rowCount();
            if($reqmailexist->rowCount() == 1) {
                $insertkey = $bdd->prepare("UPDATE `recovery` SET `key_recov` = ? WHERE mail = ?");
                $insertkey->execute(array($key, $reset_email));
            } else {
                $insertkey = $bdd->prepare("INSERT INTO `recovery`(`mail`, `key_recov`) VALUES(?, ?)");
                $insertkey->execute(array($reset_email, $key));
            }

            //ENVOI MAIL
            $sujet = "Réinitialisation de votre Mot de passe - Camagru" ;
            $header = "From: no-reply@camagru.com" ;
            $message = $userinfo['id'] . ' - Réinitialisation de votre Mot de passe sur Camagru,
            Pour réinitialisation votre mot de passe, veuillez cliquer sur le lien ci dessous
            ou copier/coller dans votre navigateur internet.
            http://localhost:8080/reset_pass.php?log='.urlencode($userinfo['id']).'&key='.urlencode($key).'
            ---------------
            Ceci est un mail automatique, Merci de ne pas y répondre.';
        
            mail($reset_email, $sujet, $message, $header);
    
        } else
            $reset_error = "Aucun compte ne corespond a cette adresse email";
    } else
        $reset_error = "Adresse email invalide";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- INFO -->
    <title>Reset your password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/global.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/global_app.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/animation.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/reg_log.css" media="all"/>
    <link rel="icon" href="data/favicon.ico" />

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700" rel="stylesheet">
</head>
<body>
    <script async src="js/animation.js"></script>

    <!-- GLOBAL ELEMENT -->
    <div id="wrapper"></div>
  
    <header id="header"> 
        <div id="open-nav">
            <div id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <p>menu</p>
        </div>

        <div class="logo">
            <h2><a class="bim-boom" href="index.php">camagru</a></h2>
        </div>

        <div class="reg-log">
            <a href="login.php">login</a>
            <a href="register.php">register</a>
        </div>
    </header>
   
    <nav id="nav">
        <ul class="menu">
            <li id="menu-close"><span>X</span> CLOSE</li>
            <a href="index.php"><li>Galerie</li></a>
            <a href="studio.php"><li>Studio</li></a>
            <a href="https://twitter.com/intent/tweet?text=Join Camagru 😋" target="_blank"><li>Partager</li></a>
        </ul>
    </nav>

    <!-- RESET PASS -->
    <section id="sect">
        <h1>Reset your password</h1>

        <form method="POST" action="">
            <input id="reset_email" name="reset_email" type="email" placeholder="E-mail" required="required" maxlength="255">
            <input id="reset_submit" name="reset_submit" type="submit" value="send email">
        </form> 
        
        <?php
            if(isset($reset_error)) {
                echo $reset_error;
            }
        ?>

    </section>

    <footer id="footer">
        <p>Create with<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 442.89"><path d="M252.52,473.93C501.34,329.28,502.84,176.4,502.48,163c0-.17,0-.35,0-.53A131.46,131.46,0,0,0,371,31.06c-52.22,0-97.32,30.88-118.53,75-21.22-44.1-66.32-75-118.53-75A131.46,131.46,0,0,0,2.51,162.53c0,.18,0,.35,0,.53-.36,13.36,1.14,166.24,250,310.88" transform="translate(-2.5 -31.06)"></path></svg></span> by <strong>Thibaut Mélen</strong></p>
        <p>Follow me on <a href="https://pikomit.com/user/Thibaut/" target="_blank">Pikomit</a></p>
    </footer>
    
</body>
</html>