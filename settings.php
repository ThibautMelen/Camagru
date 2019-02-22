<?php
// CONEXION A LA BDD
include('libphp/cnct_bdd.php');
session_start();

include('libphp/usr_nav.php');
//IF IS NOT LOG REDIRECT
if (!(islog()))
    header('Location: ../index.php');

//PROFILE SETTING INFO
if(isset($_SESSION['pseudo'])) {
    $requser = $bdd->prepare("SELECT * FROM member WHERE pseudo = ?");
    $requser->execute(array($_SESSION['pseudo']));
    $userexist = $requser->rowCount();
    if($userexist == 1) {
        $userinfo = $requser->fetch();
    }
    else
        header('Location: ../login.php');
}
else
    header('Location: ../login.php');

//NEW AREA
if (isset($_POST['change_submit']))
{
    if(isset($_POST['change_pseudo']) && !empty($_POST['change_pseudo']) && $_POST['change_pseudo'] != $userinfo['pseudo']) {
        $change_pseudo = htmlspecialchars($_POST['change_pseudo']);
        $insertpseudo = $bdd->prepare("UPDATE member SET pseudo = ? WHERE id = ?");
        $insertpseudo->execute(array($change_pseudo, $_SESSION['id']));
        $_SESSION['pseudo'] = $change_pseudo;
        header('Location: profile.php?user='.$_SESSION['pseudo']);
    }
    if(isset($_POST['change_email']) && !empty($_POST['change_email']) && $_POST['change_email'] != $userinfo['email']) {
        $change_email = htmlspecialchars($_POST['change_email']);
        $insertemail = $bdd->prepare("UPDATE member SET email = ? WHERE id = ?");
        $insertemail->execute(array($change_email, $_SESSION['id']));
        $_SESSION['email'] = $change_email;
        header('Location: profile.php?user='.$_SESSION['pseudo']);
    }
    if(isset($_FILES['change_avatar']) && !empty(($_FILES['change_avatar']['name'])))
    {
        $sizemax = 2097152;
        $validExtension = array('jpg', 'jpeg', 'png', 'gif');
        if($_FILES['change_avatar']['name'] <= $sizemax)
        {
            $uploadExtension = strtolower(substr(strrchr($_FILES['change_avatar']['name'], '.'), 1));
            if(in_array($uploadExtension, $validExtension))
            {
                $path = "data/avatar_member/".$_SESSION['id'].".".$uploadExtension;
                $fileEnd = move_uploaded_file($_FILES['change_avatar']['tmp_name'], $path);
                if($fileEnd)
                {
                    $updateAvatar = $bdd->prepare('UPDATE member SET avatar = ? WHERE id = ?');
                    $updateAvatar->execute(array($path, $_SESSION['id']));
                    $_SESSION['avatar'] = $path;
                    header('Location: profile.php?user='.$_SESSION['pseudo']);
                }else
                    $settings_error = "Erreur durant l'importation de votre photo de profil";
            }
            else
                $settings_error = "Votre image de profil doit etre au format jpg, jpeg, png ou gif";
        }
        else
            $settings_error = "Votre image de profil doit faire moins de 2Mo";

    }
    if(isset($_POST['change_old_password']) && !empty($_POST['change_old_password']) && isset($_POST['change_password']) && !empty($_POST['change_password'])) {
        $change_old_password = sha1($_POST['change_old_password']);
        $change_password = sha1($_POST['change_password']);
        if($change_old_password == $userinfo['pass'])
        {
            if($change_old_password != $change_password) {
                $insertpass = $bdd->prepare("UPDATE member SET pass = ? WHERE id = ?");
                $insertpass->execute(array($change_password, $_SESSION['id']));
                header('Location: profile.php?user='.$_SESSION['pseudo']);
             }
             else
                $settings_error = "Votre ancien et nouveau mot de passe sont similaires";
        }
        else
            $settings_error = "Votre mot de passe n'est pas bon";
     }

    //NEW AREA ERROR
    if (empty($_POST['change_pseudo']))
        $settings_error = "Votre pseudo ne peut etre vide";
    if (empty($_POST['change_email']))
        $settings_error = "Votre email ne peut etre vide";
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

        <?php   echo $usr_nav;  ?>

    </header>
   
    <nav id="nav">
        <ul class="menu">
            <li id="menu-close"><span>X</span> CLOSE</li>
            <a href="index.php"><li>Galerie</li></a>
            <a href="studio.php"><li>Studio</li></a>
            <a href=""><li>Partager</li></a>
        </ul>
    </nav>

    <!-- SETTINGS -->
    <section id="sect">
        <h1>Settings<span> , change your personel data</span></h1>

        <form method="POST" action="" enctype= multipart/form-data>
            <input id="change_pseudo" name="change_pseudo" type="text" placeholder="Pseudo" maxlength="180" value="<?php echo $userinfo['pseudo']?>">
            <input id="change_email" name="change_email" type="email" placeholder="E-mail" maxlength="180" value="<?php echo $userinfo['email']?>">
            <input id="change_avatar" name="change_avatar" type="file">
            <input id="change_old_password" name="change_old_password" type="password" placeholder="Old Password">
            <input id="change_password" name="change_password" type="password" placeholder="New Password">
            <input id="change_submit" name="change_submit" type="submit" value="save">
        </form> 
        
        <?php
            if(isset($settings_error)) {
                echo $settings_error;
            }
        ?>

    </section>

    <footer id="footer">
        <p>Create with<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 442.89"><path d="M252.52,473.93C501.34,329.28,502.84,176.4,502.48,163c0-.17,0-.35,0-.53A131.46,131.46,0,0,0,371,31.06c-52.22,0-97.32,30.88-118.53,75-21.22-44.1-66.32-75-118.53-75A131.46,131.46,0,0,0,2.51,162.53c0,.18,0,.35,0,.53-.36,13.36,1.14,166.24,250,310.88" transform="translate(-2.5 -31.06)"></path></svg></span> by <strong>Thibaut Mélen</strong></p>
        <p>Follow me on <a href="https://pikomit.com/user/Thibaut/" target="_blank">Pikomit</a></p>
    </footer>
    
</body>
</html>