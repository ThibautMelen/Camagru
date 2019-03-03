<?php

// CONEXION A LA BDD
include('cnct_bdd.php');
session_start();

//GET POST JS_XMLHttpRequest IMG WEBCAM
$idPost = intval(htmlspecialchars($_POST['idPost']));

// CHECK IF IS ALREADY LIKE
if(!empty($idPost) AND !empty($_SESSION['id'])) {

    $requser = $bdd->prepare("SELECT like_post.id FROM like_post WHERE member_id = ? AND post_id = ?");
    $requser->execute(array($_SESSION['id'], $idPost));
    $like_user_list = $requser->fetch(); 

    $reqPostId = $bdd->prepare("SELECT like_nb FROM post WHERE id = ?");
    $reqPostId->execute(array($idPost));
    $thePost = $reqPostId->fetch();
    $nbLike = $thePost['like_nb'];

    if($requser->rowCount() == 1){
        echo "-1";
        //ADD USER LIKE WHAT
        $deleteLike = $bdd->prepare("DELETE FROM like_post WHERE id = ?");
        $deleteLike->execute(array($like_user_list['id']));
        $nbLike--;
    }
    else if($requser->rowCount() == 0){
        echo "+1";
        //ADD USER LIKE WHAT
        $insertLike = $bdd->prepare("INSERT INTO like_post(member_id, post_id) VALUES(?, ?)");
        $insertLike->execute(array($_SESSION['id'], $idPost));
        $nbLike++;
        
    }
    else{
        echo "Server error";
    }
    $upadateLikePost = $bdd->prepare("UPDATE post SET like_nb = $nbLike WHERE id = $idPost");
    $upadateLikePost->execute(array($like_user_list['id']));
}
else
    echo "Server error";


?>