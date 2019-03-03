<?php

// CONEXION A LA BDD
include('cnct_bdd.php');
session_start();

//GET POST JS_XMLHttpRequest IMG WEBCAM
$idPost = intval(htmlspecialchars($_POST['idPost']));

// CHECK IF IS ALREADY LIKE
if(!empty($idPost) AND !empty($_SESSION['id']))
{
        $requser = $bdd->prepare("SELECT * FROM post WHERE member_id = ? AND id = ?");
        $requser->execute(array($_SESSION['id'], $idPost));
        $postCoresp = $requser->rowCount();
        if($postCoresp == 1) {
            echo "yes";
            $deletePost = $bdd->prepare("DELETE FROM post WHERE id = ?");
            $deletePost->execute(array($idPost));
        }else
            echo "no";
}
else
    echo "Server error";


?>