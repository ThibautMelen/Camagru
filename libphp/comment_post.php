<?php

// CONEXION A LA BDD
include('cnct_bdd.php');
session_start();

include('islog.php');

// IF NOT LOG REDIRECT
if (!islog())
    header('Location: ../login.php');

// CREATE A COMMENT
$comment_value = htmlspecialchars($_POST['post_comment']);
$idPost = intval(htmlspecialchars($_POST['idPost']));

if(!empty($_POST['post_comment']) AND !empty($_SESSION['id']))
{
    if(strlen($comment_value) <= 255 )
    {
        $insertcom = $bdd->prepare("INSERT INTO comment_post(member_id, post_id, comment) VALUES(?, ?, ?)");
        $insertcom->execute(array($_SESSION['id'], $idPost, $comment_value));
        header('Location: ../index.php');
    }
    else
        header('Location: ../index.php');
}
else
    header('Location: ../login.php');

?>