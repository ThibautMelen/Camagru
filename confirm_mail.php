<?php
// CONEXION A LA BDD
include('libphp/cnct_bdd.php');
session_start();

//CONFIRM_MAIL
$login_pseudo = htmlspecialchars($_GET['log']);
$key = htmlspecialchars($_GET['key']);



if(!empty($login_pseudo) AND !empty($key)) {

    $requser = $bdd->prepare("SELECT mail_key, confirm FROM member WHERE pseudo = ?");
    $requser->execute(array($login_pseudo));
    $userexist = $requser->rowCount();
    if($userexist == 1) {
        $userinfo = $requser->fetch();
        echo $userinfo['mail_key'];
        echo $userinfo['confirm'];
        if($userinfo['confirm'] == '1')
          echo "Votre compte est déjà actif !";
        else{
          // if($cle == $clebdd) // On compare nos deux clés	
          // {
          // // Si elles correspondent on active le compte !	
          // echo "Votre compte a bien été activé !";

          // // La requête qui va passer notre champ actif de 0 à 1
          // $stmt = $dbh->prepare("UPDATE membres SET actif = 1 WHERE login like :login ");
          // $stmt->bindParam(':login', $login);
          // $stmt->execute();
          // }
          // else // Si les deux clés sont différentes on provoque une erreur...
          // {
          // echo "Erreur ! Votre compte ne peut être activé...";
          // }
        }
          // header('Location: ../index.php');
    }
    else
        $login_error = "Mauvais pseudo ou mot de passe !";
}
else
    echo "Erreur ! Votre compte ne peut être activé...";