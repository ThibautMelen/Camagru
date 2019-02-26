<?php
// CONEXION A LA BDD
include('libphp/cnct_bdd.php');
session_start();

include('libphp/usr_nav.php');

// IF NOT LOG REDIRECT
if (!islog())
    header('Location: ../index.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- INFO -->
    <title>Camagru - Studio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/global.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/global_app.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/animation.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/galerie.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/studio.css" media="all"/>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700" rel="stylesheet">

</head>
<body>
    <script async src="js/animation.js"></script>
    <script async src="js/webcam.js"></script>

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
            <a href="studio.php"><li class="activepage">Studio</li></a>
            <a href=""><li>Partager</li></a>
        </ul>
    </nav>

    <!-- STUDIO -->
    <section id="sect">
        <h1>Studio<span> Camagru</span></h1>
        <div class="middle">
            <div id="webcam">

                <div id="filter_img">
                    <img id="filter_0" src="data/filter/filter_0.png" alt="filter 0">
                    <img id="filter_1" src="data/filter/filter_1.png" alt="filter 1">
                    <img id="filter_2" src="data/filter/filter_2.png" alt="filter 2">
                    <img id="filter_3" src="data/filter/filter_3.png" alt="filter 3">
                    <video autoplay></video>
                </div>

                <form id="button-option" method="POST" action="">
                    <input id="screenshot" type="button" value="Take A Picture">
                    <input id="pictureInput" type="file">
                    <input onclick="showHideFilter(0)" type="button" value="F1">
                    <input onclick="showHideFilter(1)" type="button" value="F2">
                    <input onclick="showHideFilter(2)" type="button" value="F3">
                    <input onclick="showHideFilter(3)" type="button" value="F4">
                    <input oninput="showValRangeX(this.value)" onchange="showValRangeX(this.value)" id="filterRangeX" type="range" name="points" min="1" max="939" value="470">
                    <input oninput="showValRangeY(this.value)" onchange="showValRangeY(this.value)" id="filterRangeY" type="range" name="points" min="1" max="379" value="190">
                </form>
            </div>

            <div id="post-list">
            </div>
        </div>
    </section>

    <footer id="footer">
        <p>Create with<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 442.89"><path d="M252.52,473.93C501.34,329.28,502.84,176.4,502.48,163c0-.17,0-.35,0-.53A131.46,131.46,0,0,0,371,31.06c-52.22,0-97.32,30.88-118.53,75-21.22-44.1-66.32-75-118.53-75A131.46,131.46,0,0,0,2.51,162.53c0,.18,0,.35,0,.53-.36,13.36,1.14,166.24,250,310.88" transform="translate(-2.5 -31.06)"></path></svg></span> by <strong>Thibaut Mélen</strong></p>
        <p>Follow me on <a href="https://pikomit.com/user/Thibaut/" target="_blank">Pikomit</a></p>
    </footer>
    
</body>
</html>