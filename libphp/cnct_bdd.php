<?php
    date_default_timezone_set("Europe/Paris");
    $user = "root";
    $pass = "root";
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=camagru', $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->exec("SET NAMES 'UTF8'");
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    // session_start();
?>