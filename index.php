<?php

// CONEXION A LA BDD
include('libphp/cnct_bdd.php');
session_start();

include('libphp/usr_nav.php');





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
    <link rel="stylesheet" type="text/css" href="css/galerie.css" media="all"/>

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

        <?php   echo $usr_nav;  ?>

    </header>
   
    <nav id="nav">
        <ul class="menu">
            <li id="menu-close"><span>X</span> CLOSE</li>
            <a href="index.php"><li class="activepage">Galerie</li></a>
            <a href="studio.php"><li>Studio</li></a>
            <a href=""><li>Partager</li></a>
        </ul>
    </nav>

    <!-- GALERIE -->
    <section id="sect">
        <h1>Galerie<span> les dernières photos Camagru</span></h1>
        
        <div id="post-list">

            <div class="post">

                <figure>
                    <img src="https://assets.awwwards.com/awards/images/2019/01/introduction-1.jpg" alt="">
                </figure>

                <div class="post-user">
                    <a href="">
                        <img src="https://assets.awwwards.com/awards/media/cache/thumb_user_70/avatar/674754/5c17347e67538.png" alt="">
                        <h3>by <strong>El Pablo</strong></h3>
                    </a>
                </div>

                <div class="post-action">
                    <div>
                        <svg fill="#adb4b9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 494.54 500" class="hvr-up">
                            <title>Create a Comment ! 👌</title>
                            <path d="M252.5,2.5C116,2.5,5.4,113,5.23,249.47h0V484.53h0A18.17,18.17,0,0,0,30,501.26h0l42.55-16a147.19,147.19,0,0,1,97.6-2.21v0A246.91,246.91,0,0,0,252.5,497c136.56,0,247.27-110.71,247.27-247.27S389.06,2.5,252.5,2.5Z" transform="translate(-5.23 -2.5)"></path>
                        </svg>
                        <p>1</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>I like that ! 🔥❤</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                        <p>16</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>Comment</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                    </div>
                </div>

                <div id="list-comment">
                    <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p>
                    <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p>
                </div>

                <form class="post-comment" action="">
                    <input id="post-comment" name="post-comment" type="text" placeholder="Add a comment" required="required" maxlength="210">
                    <!-- IF MY POST -->
                    <div id="delete-post">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div id="open-delete-post">
                            <p>delete this post</p>
                        </div>
                    </div>
     
                </form>
            </div>

            <div class="post">
                <figure>
                    <img src="https://assets.awwwards.com/awards/images/2019/01/introduction-1.jpg" alt="">
                </figure>

                <div class="post-user">
                    <a href="">
                        <img src="https://assets.awwwards.com/awards/media/cache/thumb_user_70/avatar/674754/5c17347e67538.png" alt="">
                        <h3>by <strong>El Pablo</strong></h3>
                    </a>
                </div>

                <div class="post-action">
                    <div>
                        <svg fill="#adb4b9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 494.54 500" class="hvr-up">
                            <title>Create a Comment ! 👌</title>
                            <path d="M252.5,2.5C116,2.5,5.4,113,5.23,249.47h0V484.53h0A18.17,18.17,0,0,0,30,501.26h0l42.55-16a147.19,147.19,0,0,1,97.6-2.21v0A246.91,246.91,0,0,0,252.5,497c136.56,0,247.27-110.71,247.27-247.27S389.06,2.5,252.5,2.5Z" transform="translate(-5.23 -2.5)"></path>
                        </svg>
                        <p>1</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>I like that ! 🔥❤</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                        <p>16</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>Comment</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                    </div>
                </div>

                <div id="list-comment">
                    <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p>
                    <!-- <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p> -->
                </div>

                <form class="post-comment" action="">
                    <input id="post-comment" name="post-comment" type="text" placeholder="Add a comment" required="required" maxlength="210">
                </form>
            </div>

            <div class="post">
                <figure>
                    <img src="https://assets.awwwards.com/awards/images/2019/01/introduction-1.jpg" alt="">
                </figure>

                <div class="post-user">
                    <a href="">
                        <img src="https://assets.awwwards.com/awards/media/cache/thumb_user_70/avatar/674754/5c17347e67538.png" alt="">
                        <h3>by <strong>El Pablo</strong></h3>
                    </a>
                </div>

                <div class="post-action">
                    <div>
                        <svg fill="#adb4b9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 494.54 500" class="hvr-up">
                            <title>Create a Comment ! 👌</title>
                            <path d="M252.5,2.5C116,2.5,5.4,113,5.23,249.47h0V484.53h0A18.17,18.17,0,0,0,30,501.26h0l42.55-16a147.19,147.19,0,0,1,97.6-2.21v0A246.91,246.91,0,0,0,252.5,497c136.56,0,247.27-110.71,247.27-247.27S389.06,2.5,252.5,2.5Z" transform="translate(-5.23 -2.5)"></path>
                        </svg>
                        <p>1</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>I like that ! 🔥❤</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                        <p>16</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>Comment</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                    </div>
                </div>

                <div id="list-comment">
                    <!-- <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p> -->
                    <!-- <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p> -->
                </div>

                <form class="post-comment" action="">
                    <input id="post-comment" name="post-comment" type="text" placeholder="Add a comment" required="required" maxlength="210">
                </form>
            </div>

            <div class="post">
                <figure>
                    <img src="https://assets.awwwards.com/awards/images/2019/01/introduction-1.jpg" alt="">
                </figure>

                <div class="post-user">
                    <a href="">
                        <img src="https://assets.awwwards.com/awards/media/cache/thumb_user_70/avatar/674754/5c17347e67538.png" alt="">
                        <h3>by <strong>El Pablo</strong></h3>
                    </a>
                </div>

                <div class="post-action">
                    <div>
                        <svg fill="#adb4b9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 494.54 500" class="hvr-up">
                            <title>Create a Comment ! 👌</title>
                            <path d="M252.5,2.5C116,2.5,5.4,113,5.23,249.47h0V484.53h0A18.17,18.17,0,0,0,30,501.26h0l42.55-16a147.19,147.19,0,0,1,97.6-2.21v0A246.91,246.91,0,0,0,252.5,497c136.56,0,247.27-110.71,247.27-247.27S389.06,2.5,252.5,2.5Z" transform="translate(-5.23 -2.5)"></path>
                        </svg>
                        <p>1</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>I like that ! 🔥❤</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                        <p>16</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>Comment</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                    </div>
                </div>

                <div id="list-comment">
                    <!-- <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p> -->
                    <!-- <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p> -->
                </div>

                <form class="post-comment" action="">
                    <input id="post-comment" name="post-comment" type="text" placeholder="Add a comment" required="required" maxlength="210">
                </form>
            </div>
    
            <div class="post">

                <figure>
                    <img src="https://assets.awwwards.com/awards/images/2019/01/introduction-1.jpg" alt="">
                </figure>

                <div class="post-user">
                    <a href="">
                        <img src="https://assets.awwwards.com/awards/media/cache/thumb_user_70/avatar/674754/5c17347e67538.png" alt="">
                        <h3>by <strong>El Pablo</strong></h3>
                    </a>
                </div>

                <div class="post-action">
                    <div>
                        <svg fill="#adb4b9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 494.54 500" class="hvr-up">
                            <title>Create a Comment ! 👌</title>
                            <path d="M252.5,2.5C116,2.5,5.4,113,5.23,249.47h0V484.53h0A18.17,18.17,0,0,0,30,501.26h0l42.55-16a147.19,147.19,0,0,1,97.6-2.21v0A246.91,246.91,0,0,0,252.5,497c136.56,0,247.27-110.71,247.27-247.27S389.06,2.5,252.5,2.5Z" transform="translate(-5.23 -2.5)"></path>
                        </svg>
                        <p>1</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>I like that ! 🔥❤</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                        <p>16</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>Comment</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                    </div>
                </div>

                <div id="list-comment">
                    <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p>
                    <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p>
                </div>

                <form class="post-comment" action="">
                    <input id="post-comment" name="post-comment" type="text" placeholder="Add a comment" required="required" maxlength="210">
                    <!-- IF MY POST -->
                    <div id="delete-post">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div id="open-delete-post">
                            <p>delete this post</p>
                        </div>
                    </div>
     
                </form>
            </div>

            <div class="post">
                <figure>
                    <img src="https://assets.awwwards.com/awards/images/2019/01/introduction-1.jpg" alt="">
                </figure>

                <div class="post-user">
                    <a href="">
                        <img src="https://assets.awwwards.com/awards/media/cache/thumb_user_70/avatar/674754/5c17347e67538.png" alt="">
                        <h3>by <strong>El Pablo</strong></h3>
                    </a>
                </div>

                <div class="post-action">
                    <div>
                        <svg fill="#adb4b9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 494.54 500" class="hvr-up">
                            <title>Create a Comment ! 👌</title>
                            <path d="M252.5,2.5C116,2.5,5.4,113,5.23,249.47h0V484.53h0A18.17,18.17,0,0,0,30,501.26h0l42.55-16a147.19,147.19,0,0,1,97.6-2.21v0A246.91,246.91,0,0,0,252.5,497c136.56,0,247.27-110.71,247.27-247.27S389.06,2.5,252.5,2.5Z" transform="translate(-5.23 -2.5)"></path>
                        </svg>
                        <p>1</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>I like that ! 🔥❤</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                        <p>16</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>Comment</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                    </div>
                </div>

                <div id="list-comment">
                    <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p>
                    <!-- <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p> -->
                </div>

                <form class="post-comment" action="">
                    <input id="post-comment" name="post-comment" type="text" placeholder="Add a comment" required="required" maxlength="210">
                </form>
            </div>

            <div class="post">
                <figure>
                    <img src="https://assets.awwwards.com/awards/images/2019/01/introduction-1.jpg" alt="">
                </figure>

                <div class="post-user">
                    <a href="">
                        <img src="https://assets.awwwards.com/awards/media/cache/thumb_user_70/avatar/674754/5c17347e67538.png" alt="">
                        <h3>by <strong>El Pablo</strong></h3>
                    </a>
                </div>

                <div class="post-action">
                    <div>
                        <svg fill="#adb4b9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 494.54 500" class="hvr-up">
                            <title>Create a Comment ! 👌</title>
                            <path d="M252.5,2.5C116,2.5,5.4,113,5.23,249.47h0V484.53h0A18.17,18.17,0,0,0,30,501.26h0l42.55-16a147.19,147.19,0,0,1,97.6-2.21v0A246.91,246.91,0,0,0,252.5,497c136.56,0,247.27-110.71,247.27-247.27S389.06,2.5,252.5,2.5Z" transform="translate(-5.23 -2.5)"></path>
                        </svg>
                        <p>1</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>I like that ! 🔥❤</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                        <p>16</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>Comment</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                    </div>
                </div>

                <div id="list-comment">
                    <!-- <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p> -->
                    <!-- <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p> -->
                </div>

                <form class="post-comment" action="">
                    <input id="post-comment" name="post-comment" type="text" placeholder="Add a comment" required="required" maxlength="210">
                </form>
            </div>

            <div class="post">
                <figure>
                    <img src="https://assets.awwwards.com/awards/images/2019/01/introduction-1.jpg" alt="">
                </figure>

                <div class="post-user">
                    <a href="">
                        <img src="https://assets.awwwards.com/awards/media/cache/thumb_user_70/avatar/674754/5c17347e67538.png" alt="">
                        <h3>by <strong>El Pablo</strong></h3>
                    </a>
                </div>

                <div class="post-action">
                    <div>
                        <svg fill="#adb4b9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 494.54 500" class="hvr-up">
                            <title>Create a Comment ! 👌</title>
                            <path d="M252.5,2.5C116,2.5,5.4,113,5.23,249.47h0V484.53h0A18.17,18.17,0,0,0,30,501.26h0l42.55-16a147.19,147.19,0,0,1,97.6-2.21v0A246.91,246.91,0,0,0,252.5,497c136.56,0,247.27-110.71,247.27-247.27S389.06,2.5,252.5,2.5Z" transform="translate(-5.23 -2.5)"></path>
                        </svg>
                        <p>1</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>I like that ! 🔥❤</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                        <p>16</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455.2 500" class="hvr-up" style="fill: rgb(173, 180, 185);">
                            <title>Comment</title>
                            <path d="M479.18,298.51a192.92,192.92,0,0,0-73.94-132.8,13.36,13.36,0,0,0-4-2.15c-4-1.73-8.74-1-11.2,4.11a178.73,178.73,0,0,1-47.65,60.6,177.81,177.81,0,0,0,4.89-22.92c1.14-8,1.53-16.28,2.08-24.19.25-3.48.51-7.95-.36-11.7C345.29,98,301.6,33.83,236.7,3.65c-7-3.27-13.76.73-14.55,8.34a171.11,171.11,0,0,1-38.52,91.46,178.34,178.34,0,0,1-36.18,33.05c-5.31,3.63-10.89,6.73-16.46,9.92-2.75,1.56-6.29,3.11-9.1,5.24a198.17,198.17,0,0,0-70.64,69.83C34.5,249.87,23.68,284.87,25,318.1c0,.09,0,.18,0,.28.07,2.08.15,4.16.22,6.25a10.62,10.62,0,0,0,.23,1.89,194.31,194.31,0,0,0,90.09,153.34,201.23,201.23,0,0,0,49.15,22.29c6.56,2,14.59-4.93,11.89-11.89a173.69,173.69,0,0,1-.07-126.59,1,1,0,0,1,0-.14c.07-.16.15-.31.22-.48a175,175,0,0,1,16.33-30.62c3.17,38.3,18.35,75.05,42.65,105.14a195.33,195.33,0,0,0,49,43A203,203,0,0,0,315,496.16q7.36,3,15,5.36c6.54,2,11.14.49,17.41-1.65C430.85,471.29,488.15,387.22,479.18,298.51Zm-305,68.67,0,.06,0,0Z" transform="translate(-24.9 -2.5)"></path>
                        </svg>
                    </div>
                </div>

                <div id="list-comment">
                    <!-- <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p> -->
                    <!-- <p><a href=""><strong>John Snow</strong></a>yah but did anyone assume he was gay and basically forced the thought on him when he was straight?</p> -->
                </div>

                <form class="post-comment" action="">
                    <input id="post-comment" name="post-comment" type="text" placeholder="Add a comment" required="required" maxlength="210">
                </form>
            </div>
            
            <div class="actuel-page">
                <a href="#" id="last-page">last page</a>
                <p>1</p>
                <a href="#" id="next-page">next page</a>
            </div>

        </div>

    </section>

    <footer id="footer">
        <p>Create with<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 442.89"><path d="M252.52,473.93C501.34,329.28,502.84,176.4,502.48,163c0-.17,0-.35,0-.53A131.46,131.46,0,0,0,371,31.06c-52.22,0-97.32,30.88-118.53,75-21.22-44.1-66.32-75-118.53-75A131.46,131.46,0,0,0,2.51,162.53c0,.18,0,.35,0,.53-.36,13.36,1.14,166.24,250,310.88" transform="translate(-2.5 -31.06)"></path></svg></span> by <strong>Thibaut Mélen</strong></p>
        <p>Follow me on <a href="https://pikomit.com/user/Thibaut/" target="_blank">Pikomit</a></p>
    </footer>
    
</body>
</html>