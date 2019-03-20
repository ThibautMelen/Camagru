<?php

// CONEXION A LA BDD
include('libphp/cnct_bdd.php');
session_start();

include('libphp/islog.php');
//IF IS LOG REDIRECT
if (islog())
    header('Location: ../index.php');

//LOGIN
if (isset($_POST['login_submit']))
{
    $login_pseudo = htmlspecialchars($_POST['login_pseudo']);
    $login_password = sha1($_POST['login_password']);
    if(!empty($login_pseudo) AND !empty($login_password)) {
        $requser = $bdd->prepare("SELECT * FROM member WHERE pseudo = ? AND pass = ?");
        $requser->execute(array($login_pseudo, $login_password));
        $userexist = $requser->rowCount();
        if($userexist == 1) {
            $userinfo = $requser->fetch();
            if($userinfo['confirm'] == 1) {
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['pseudo'] = $userinfo['pseudo'];
                $_SESSION['email'] = $userinfo['email'];
                $_SESSION['avatar'] = $userinfo['avatar'];
                $_SESSION['notif'] = $userinfo['notif'];
                header('Location: ../index.php');
            }
            else{
                $login_error = "Compte non comfirmée par mail";
            }
        }
        else
           $login_error = "Mauvais pseudo ou mot de passe !";
    }
    else
        $login_error = "Remplie tout les champs FDP";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- INFO -->
    <title>Login - Camagru</title>
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

    <!-- GALERIE -->
    <section id="sect">
        <h1>Login<span> to Camagru</span></h1>

        <form method="POST" action="">
            <input id="login_pseudo" name="login_pseudo" type="text" placeholder="pseudo" required="required" maxlength="180">
            <input id="login_password" name="login_password" type="password" placeholder="Password" required="required">
            <input id="login_submit" name="login_submit" type="submit" value="login">
            <i><a href="reset.php">Forgot Password ?</a></i>
        </form> 
        
        <?php
            if(isset($login_error)) {
                echo $login_error;
            }
        ?>

    </section>

    <footer id="footer">
        <p>Create with<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 442.89"><path d="M252.52,473.93C501.34,329.28,502.84,176.4,502.48,163c0-.17,0-.35,0-.53A131.46,131.46,0,0,0,371,31.06c-52.22,0-97.32,30.88-118.53,75-21.22-44.1-66.32-75-118.53-75A131.46,131.46,0,0,0,2.51,162.53c0,.18,0,.35,0,.53-.36,13.36,1.14,166.24,250,310.88" transform="translate(-2.5 -31.06)"></path></svg></span> by <strong>Thibaut Mélen</strong></p>
        <p>Follow me on <a href="https://pikomit.com/user/Thibaut/" target="_blank">Pikomit</a></p>
    </footer>
    
</body>
</html>