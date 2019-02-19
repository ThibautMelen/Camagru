<?php

// CONEXION A LA BDD
include('cnct_bdd.php');
session_start();


//GET POST JS IMG WEBCAM
$imgDataEncoded = $_POST['img'];
$imgDataEncoded = str_replace('data:image/png;base64,', '', $imgDataEncoded);
$imgDataEncoded = str_replace(' ', '+', $imgDataEncoded);
$imgData = base64_decode($imgDataEncoded);
$imgData = imagecreatefromstring($imgData);


//SAVE POST IMG WEBCAM
imagepng($imgData, "../data/tarace.png");
imagedestroy($imgData);



?>