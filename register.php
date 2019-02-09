<?php

// CONEXION A LA BDD
include('libphp/cnct_bdd.php');
session_start();

include('libphp/islog.php');
//IF IS LOG REDIRECT
if (islog())
    header('Location: ../index.php');

//REGISTER
if (isset($_POST['register_submit'])) {
    $register_pseudo = htmlspecialchars($_POST['register_pseudo']);
    $register_email = htmlspecialchars($_POST['register_email']);
    $register_password = sha1($_POST['register_password']);
    if(!empty($_POST['register_pseudo']) AND !empty($_POST['register_email']) AND !empty($_POST['register_password']))
    {
        if(strlen($register_pseudo) <= 255 )
        {
            $reqpseudo = $bdd->prepare("SELECT * FROM member WHERE pseudo = ?");
            $reqpseudo->execute(array($register_pseudo));
            if($reqpseudo->rowCount() == 0)
            {
                if(filter_var($register_email, FILTER_VALIDATE_EMAIL))
                {
                    $reqmail = $bdd->prepare("SELECT * FROM member WHERE email = ?");
                    $reqmail->execute(array($register_email));
                    if($reqmail->rowCount() == 0) {
                        $insertmbr = $bdd->prepare("INSERT INTO member(pseudo, email, pass) VALUES(?, ?, ?)");
                        $insertmbr->execute(array($register_pseudo, $register_email, $register_password));
                        $register_success = "Votre compte a bien été créé, valide le par mail fdp ! <a href=\"login.php\">Me connecter</a>";
                    }
                    else 
                        $register_error = "Adresse mail déjà utilisée !";
                }
                else
                    $register_error = "entre un email valide";
            }
            else
                $register_error = "Pseudo déjà utilisée !";
        }
        else
            $register_error = "Pseudo ne doit pas depasser 255 car";
    }
    else
        $register_error = "All fields must be completed in this Section";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- INFO -->
    <title>Camagru</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/global.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/global_app.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/animation.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/reg_log.css" media="all"/>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet">

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

        <!-- IF NO LOG -->
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
            <a href=""><li>Partager</li></a>
        </ul>
    </nav>

    <!-- REGISTER -->
    <section id="sect">
        <h1>Register<span> for Camagru Studio</span></h1>

        <form method="POST" action="">
            <input id="register_pseudo" name="register_pseudo" value="<?php if(isset($register_pseudo)) {echo $register_pseudo;} ?>" type="text" placeholder="pseudo" required="required" maxlength="255" >
            <input id="register_email" name="register_email" value="<?php if(isset($register_email)) {echo $register_email;} ?>" type="email" placeholder="E-mail" required="required" maxlength="255">
            <input id="register_password" name="register_password" type="password" placeholder="Password" required="required">
            <input id="register_submit" name="register_submit" type="submit" value="create my account">
        </form>

        <?php
            if(isset($register_error)) {
                echo $register_error;
            }
            if(isset($register_success)) {
                echo $register_success;
            }
        ?>

    </section>

    <footer id="footer">
        <p>Create with<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 442.89"><path d="M252.52,473.93C501.34,329.28,502.84,176.4,502.48,163c0-.17,0-.35,0-.53A131.46,131.46,0,0,0,371,31.06c-52.22,0-97.32,30.88-118.53,75-21.22-44.1-66.32-75-118.53-75A131.46,131.46,0,0,0,2.51,162.53c0,.18,0,.35,0,.53-.36,13.36,1.14,166.24,250,310.88" transform="translate(-2.5 -31.06)"></path></svg></span> by <strong>Thibaut Mélen</strong></p>
        <p>Follow me on <a href="https://pikomit.com/user/Thibaut/" target="_blank">Pikomit</a></p>
    </footer>
    
</body>
</html>