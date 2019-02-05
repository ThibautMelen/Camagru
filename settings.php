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
    <script src="js/animation.js"></script>

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

        <!-- IF IS LOG -->
        <div class="account">
            <p>Miguel</p>
            <img src="https://assets.awwwards.com/awards/media/cache/thumb_user_70/default/user7.jpg" alt="avatar">
            
            <ul>
                <a href="profile.php"><li>Profile</li></a>
                <a href="settings.php"><li>Settings</li></a>
                <a href="#"><li>log out</li></a>
            </ul>
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

    <!-- GALERIE -->
    <section id="sect">
        <h1>Settings<span> , change your personel data</span></h1>

        <form action="">
            <input id="change_username" name="change_username" type="text" placeholder="Username" required="required" maxlength="180">
            <input id="change_email" name="change_email" type="email" placeholder="E-mail" required="required" maxlength="180">
            <input id="change_password" name="change_password" type="password" placeholder="Password" required="required">
            <input id="change_submit" type="submit" value="save">
        </form> 
        

    </section>

    <footer id="footer">
        <p>Create with<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 442.89"><path d="M252.52,473.93C501.34,329.28,502.84,176.4,502.48,163c0-.17,0-.35,0-.53A131.46,131.46,0,0,0,371,31.06c-52.22,0-97.32,30.88-118.53,75-21.22-44.1-66.32-75-118.53-75A131.46,131.46,0,0,0,2.51,162.53c0,.18,0,.35,0,.53-.36,13.36,1.14,166.24,250,310.88" transform="translate(-2.5 -31.06)"></path></svg></span> by <strong>Thibaut Mélen</strong></p>
        <p>Follow me on <a href="https://pikomit.com/user/Thibaut/" target="_blank">Pikomit</a></p>
    </footer>
    
</body>
</html>