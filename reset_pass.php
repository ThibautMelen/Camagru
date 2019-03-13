<?php

// CONEXION A LA BDD
include('libphp/cnct_bdd.php');
session_start();

include('libphp/islog.php');
//IF IS LOG REDIRECT
if (islog())
    header('Location: ../index.php');

// FUNCTION PASSWORD HARD
include('libphp/pass_check.php');

//CHANGE PASS
if (isset($_POST['change_pass'])) {

    $user_id = htmlspecialchars($_GET['log']);
    $key = htmlspecialchars($_GET['key']);

    if(!empty($user_id) AND !empty($key)) {
        $requser = $bdd->prepare("SELECT * FROM member WHERE id = ?");
        $requser->execute(array($user_id));
        $userexist = $requser->rowCount();
        if($userexist == 1) {
            $userinfo = $requser->fetch();

            $reqrecovery = $bdd->prepare("SELECT * FROM `recovery` WHERE mail = ?");
            $reqrecovery->execute(array($userinfo['email']));
            $keyinfo = $reqrecovery->fetch();

            if(!empty($keyinfo['key_recov']) && $keyinfo['key_recov'] == $key)
            {
                if(isset($_POST['change_password']) && !empty($_POST['change_password']) && isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) {
                    $confirm_password = sha1($_POST['confirm_password']);
                    $change_password = sha1($_POST['change_password']);
                        if($confirm_password == $change_password) {
                            if (pass_check($_POST['change_password'])) {
                                $insertpass = $bdd->prepare("UPDATE member SET pass = ? WHERE id = ?");
                                $insertpass->execute(array($change_password, $user_id));
                                $newkey = md5(microtime(true) * 100000);
                                $changekey = $bdd->prepare("UPDATE `recovery` SET `key_recov` = ? WHERE mail = ?");
                                $changekey->execute(array($newkey, $userinfo['email']));
                                header('Location: ../login.php');
                            }
                            else
                                $reset_error = "Votre mot de passe doit comporter un minimum de 8 caractères, se composer de chiffres et de lettres, doit comprendre des majuscules/minuscules et des caractères spéciaux.";
                        }
                        else
                            $reset_error = "Vos mot de passe ne sont pas similaire";
                    } else
                      $reset_error = "Veuillez remplir tous les champs nécessaire a reinitialisation de votre mot de passe";
 
                } else
                    $reset_error = "La reinitialisation de votre mot de passe a expirés";
            } else
                $reset_error = "Un probleme est survenue lors de la modification du mot de passe B";
        } else
            $reset_error = "Un probleme est survenue lors de la modification du mot de passe C";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- INFO -->
    <title>Reset your password | Pass</title>
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
        <h1>Reset your password | Pass</h1>

        <form method="POST" action="">
            <input id="change_password" name="change_password" type="password" placeholder="New Password">
            <input id="confirm_password" name="confirm_password" type="password" placeholder="Confrim Password">
            <input id="change_pass" name="change_pass" type="submit" value="save">
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