<?php
// CONEXION A LA BDD
include('libphp/cnct_bdd.php');
session_start();

//FUNCTION CONFIRM_MAIL
function confirm_mail($pseudo, $email)
{
   
    // Génération aléatoire d'une clé
    $key = md5(microtime(true) * 100000);

    // Insertion de la clé dans la base de données
    $insertKeyMail = $bdd->prepare("UPDATE member SET mail_key = ? WHERE pseudo = ?");
    $insertKeyMail->execute(array($key, $pseudo));

    // echo $key;

}
// 

?>