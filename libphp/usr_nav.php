<?php

include('libphp/islog.php');

$usr_nav = islog()
? 
'<div class="account">
<p>' .  $_SESSION['pseudo'] . '</p>
<img src="' . $_SESSION['avatar'] . '" alt="avatar">
<ul>
    <a href="profile.php?user=' . $_SESSION['pseudo'] . '"><li>Profile</li></a>
    <a href="settings.php"><li>Settings</li></a>
    <a href="libphp/logout.php"><li>log out</li></a>
</ul>
</div>' 
: 
'<div class="reg-log">
    <a href="login.php">login</a>
    <a href="register.php">register</a>
</div>';

?>