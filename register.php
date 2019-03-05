<?php

// CONEXION A LA BDD
include('libphp/cnct_bdd.php');
session_start();

include('libphp/islog.php');
//IF IS LOG REDIRECT
if (islog())
    header('Location: ../index.php');

//FUNCTION CONFIRM_MAIL
include('libphp/confirm_mail.php');

// FUNCTION PASSWORD HARD
function pass_check($pass)
{
    if (strlen($pass) < 8)
        return false;
    else if (!preg_match('/[0-9]+/', $pass))
        return false;
    else if (!preg_match('/[a-z]+/', $pass))
        return false;
    else if (!preg_match('/[A-Z]+/', $pass))
        return false;
    else if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+!-]/', $pass))
        return false;
    return true;
}

//RECAPTCHA
// clé privée
$secret = "6LcmcJUUAAAAAMP0q_0uqa0J7VirNEIijbxbYYu6";
// Paramètre renvoyé par le recaptcha
$response = $_POST['g-recaptcha-response'];
// On récupère l'IP de l'utilisateur
$remoteip = $_SERVER['REMOTE_ADDR'];
$api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
    . $secret
    . "&response=" . $response
    . "&remoteip=" . $remoteip;
$decode = json_decode(file_get_contents($api_url), true);

//REGISTER
if (isset($_POST['register_submit'])) {
    $register_pseudo = htmlspecialchars($_POST['register_pseudo']);
    $register_email = htmlspecialchars($_POST['register_email']);
    $register_password = sha1($_POST['register_password']);
    if (!empty($_POST['register_pseudo']) and !empty($_POST['register_email']) and !empty($_POST['register_password'])) {
        // if ($decode['success'] == true) {
        if (pass_check($_POST['register_password'])) {
            if (strlen($register_pseudo) <= 255) {
                $reqpseudo = $bdd->prepare("SELECT * FROM member WHERE pseudo = ?");
                $reqpseudo->execute(array($register_pseudo));
                if ($reqpseudo->rowCount() == 0) {
                    if (filter_var($register_email, FILTER_VALIDATE_EMAIL)) {
                        $reqmail = $bdd->prepare("SELECT * FROM member WHERE email = ?");
                        $reqmail->execute(array($register_email));
                        if ($reqmail->rowCount() == 0) {

                            $key = md5(microtime(true) * 100000);

                            $insertmbr = $bdd->prepare("INSERT INTO member(pseudo, email, pass, avatar, notif, mail_key, confirm) VALUES(?, ?, ?, ?, ?, ?, ?)");
                            $insertmbr->execute(array($register_pseudo, $register_email, $register_password, "data/avatar_member/default.jpg", 1, $key, 0));










                            $mail = 'weaponsb@mail.fr'; // Déclaration de l'adresse de destination.
                            if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui présentent des bogues.
                            {
                                $passage_ligne = "\r\n";
                            } else {
                                $passage_ligne = "\n";
                            }
                                //=====Déclaration des messages au format texte et au format HTML.
                            $message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
                            $message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";
                                //==========
                                

                                //=====Création de la boundary.
                            $boundary = "-----=" . md5(rand());
                            $boundary_alt = "-----=" . md5(rand());
                                //==========
                                
                                //=====Définition du sujet.
                            $sujet = "Hey mon ami !";
                                //=========
                                
                                //=====Création du header de l'e-mail.
                            $header = "From: \"WeaponsB\"<weaponsb@mail.fr>" . $passage_ligne;
                            $header .= "Reply-to: \"WeaponsB\" <weaponsb@mail.fr>" . $passage_ligne;
                            $header .= "MIME-Version: 1.0" . $passage_ligne;
                            $header .= "Content-Type: multipart/mixed;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;
                                //==========
                                
                                //=====Création du message.
                            $message = $passage_ligne . "--" . $boundary . $passage_ligne;
                            $message .= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary_alt\"" . $passage_ligne;
                            $message .= $passage_ligne . "--" . $boundary_alt . $passage_ligne;
                                //=====Ajout du message au format texte.
                            $message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"" . $passage_ligne;
                            $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
                            $message .= $passage_ligne . $message_txt . $passage_ligne;
                                //==========

                            $message .= $passage_ligne . "--" . $boundary_alt . $passage_ligne;
                                
                                //=====Ajout du message au format HTML.
                            $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passage_ligne;
                            $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
                            $message .= $passage_ligne . $message_html . $passage_ligne;
                                //==========
                                
                                //=====On ferme la boundary alternative.
                            $message .= $passage_ligne . "--" . $boundary_alt . "--" . $passage_ligne;
                                //==========

                           $message .= $passage_ligne . "--" . $boundary . $passage_ligne;
                          
  
                            
                            //=====Envoi de l'e-mail.
    
                            if (mail($register_email, $sujet, $message, $header))
                                echo "Work work";
                            else
                                echo "pas work";

                            $register_success = "Votre compte a bien été créé, valide le par mail fdp ! <a href=\"login.php\">Me connecter</a>";
                        } else
                            $register_error = "Adresse mail déjà utilisée !";
                    } else
                        $register_error = "entre un email valide";
                } else
                    $register_error = "Pseudo déjà utilisée !";
            } else
                $register_error = "Pseudo ne doit pas depasser 255 car";
        } else
            $register_error = "Votre mot de passe doit comporter un minimum de 8 caractères, se composer de chiffres et de lettres, doit comprendre des majuscules/minuscules et des caractères spéciaux.";
        // } else
            // $register_error = "Captcha ERROR";
    } else
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

    <!-- CAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
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
            <a href="https://twitter.com/intent/tweet?text=Join Camagru 😋" target="_blank"><li>Partager</li></a>
        </ul>
    </nav>

    <!-- REGISTER -->
    <section id="sect">
        <h1>Register<span> for Camagru Studio</span></h1>

        <form method="POST" action="">
            <input id="register_pseudo" name="register_pseudo" value="<?php if (isset($register_pseudo)) {
                                                                            echo $register_pseudo;
                                                                        } ?>" type="text" placeholder="pseudo" required="required" maxlength="255" >
            <input id="register_email" name="register_email" value="<?php if (isset($register_email)) {
                                                                        echo $register_email;
                                                                    } ?>" type="email" placeholder="E-mail" required="required" maxlength="255">
            <input id="register_password" name="register_password" type="password" placeholder="Password" required="required" minlength="8">
            <!-- <div class="g-recaptcha" data-sitekey="6LcmcJUUAAAAAErxBXWYChbpIKnzikjM6OGyyQIv"></div> -->
            <input id="register_submit" name="register_submit" type="submit" value="create my account">
        </form>

        <?php
        if (isset($register_error)) {
            echo $register_error;
        }
        if (isset($register_success)) {
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