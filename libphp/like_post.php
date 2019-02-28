<?php

// CONEXION A LA BDD
include('cnct_bdd.php');
session_start();

//GET POST JS_XMLHttpRequest IMG WEBCAM
$imgDataEncoded = $_POST['img'];
$imgDataEncoded = str_replace('data:image/png;base64,', '', $imgDataEncoded);
$imgDataEncoded = str_replace(' ', '+', $imgDataEncoded);
$imgData = base64_decode($imgDataEncoded);
$imgData = imagecreatefromstring($imgData);


?>