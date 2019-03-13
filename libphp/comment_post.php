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

        $requser = $bdd->prepare("SELECT pseudo, email, notif FROM member INNER JOIN post ON member.id = post.member_id WHERE post.id = ?");
        $requser->execute(array($idPost));
        if($requser->rowCount() == 1)
            $userpostinfo = $requser->fetch();

        //ENVOI MAIL
        if($userpostinfo['notif'] == 1)
        {
            $sujet = "Nouveau commentaire sur un de vos post(s) - Camagru" ;
            $header = "From: no-reply@camagru.com" ;
            $message = "Salut " . $userpostinfo['pseudo'] . " ! ". $_SESSION['pseudo'] . " a commenter un de vos post : \""
            . $comment_value  . "\" http://localhost:8080/profile.php?user=".urlencode($_SESSION['pseudo']) . "
            ---------------
            Ceci est un mail automatique, Merci de ne pas y répondre.";
            $email = $userpostinfo['email'];
    
            mail($email, $sujet, $message, $header);
        }

        header('Location: ../index.php');
    }
    else
        header('Location: ../index.php');
}
else
    header('Location: ../login.php');

?>