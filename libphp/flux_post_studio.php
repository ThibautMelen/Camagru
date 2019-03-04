<?php 
// CONEXION A LA BDD
include('cnct_bdd.php');
session_start();


//GET POST JS nbPost
$nbPost =  intval(htmlspecialchars($_POST['nbPost']));

//GET DATA POST IN BDD
$addDomPost = $bdd->prepare('SELECT pseudo, avatar, picture, like_nb, post.id FROM member INNER JOIN post ON member.id = post.member_id WHERE member.id = ? ORDER BY post.id DESC LIMIT '.$nbPost.'');
$addDomPost->execute(array($_SESSION['id']));

while ($dataPost = $addDomPost->fetch())
{
//IT'S MY POST ?
$reqItsMyPost = $bdd->prepare("SELECT * FROM post WHERE member_id = ? AND id = ?");
$reqItsMyPost->execute(array($_SESSION['id'], $dataPost['id']));
if($reqItsMyPost->rowCount() == 1)
{
    $delPost = '
    <div id="delete-post">
        <div></div>
        <div></div>
        <div></div>
        <div id="open-delete-post" onclick="delPost('.$dataPost['id'].')" >
            <p>delete this post</p>
        </div>
    </div>';
}
else
    $delPost = "prout";

echo '
<div class="post" id="post_' . $dataPost['id'] . '">
    <figure>
        <img src="' . $dataPost['picture'] . '" alt="' . $dataPost['picture'] . '">
    </figure>
    <div class="post-user">
        <a href="profile.php?user=' . $dataPost['pseudo'] . '">
            <img src="' . $dataPost['avatar'] . '" alt="">
            <h3>by <strong>' . $dataPost['pseudo'] . '</strong></h3>
        </a>
    </div>
    <form class="post-comment">
        '. $delPost . '
    </form>
</div>
    ';
}
