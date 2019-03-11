<?php
// CONEXION A LA BDD
include('libphp/cnct_bdd.php');
session_start();

//CONFIRM_MAIL
$login_pseudo = htmlspecialchars($_GET['log']);
$key = htmlspecialchars($_GET['key']);

if(!empty($login_pseudo) AND !empty($key)) {
    $requser = $bdd->prepare("SELECT mail_key, confirm, id FROM member WHERE pseudo = ?");
    $requser->execute(array($login_pseudo));
    $userexist = $requser->rowCount();
    if($userexist == 1) {
        $userinfo = $requser->fetch();
        if($userinfo['confirm'] == 1)
          header('Location: ../login.php');
        else{
          if($key == $userinfo['mail_key'])
          {
            $validmail = $bdd->prepare("UPDATE member SET confirm = ? WHERE id = ?");
            $validmail->execute(array(1, $userinfo['id']));
            header('Location: ../login.php');
          }
          else
            echo "C Erreur ! Votre compte ne peut être activé...";
        }
    }
    else
      echo "B Erreur ! Votre compte ne peut être activé...";
}
else
    echo "A Erreur ! Votre compte ne peut être activé...";

?>