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

//GET POST JS_XMLHttpRequest FILTER NB
$filter = intval(htmlspecialchars($_POST['filter']));
$filerImg = imagecreatefrompng('../data/filter/filter_' . $filter . '.png');

//GET POST JS filterRange X/Y
$filterRangeX =  intval(htmlspecialchars($_POST['filterRangeX']));
$filterRangeY =  intval(htmlspecialchars($_POST['filterRangeY']));


$margin_right = $filterRangeX; //939 max | 470 mid
$margin_bottom = $filterRangeY; //379 max | 190 mid

//coordonnées du point de destination.
$dst_x = imagesx($imgData) - imagesx($filerImg) - $margin_right;
$dst_y = imagesy($imgData) - imagesy($filerImg) - $margin_bottom;
//coordonnées du point source.
$src_x = 0;
$src_y = 0;

imagecopy(
    $imgData, $filerImg, //resource $dst_im , resource $src_im 
    $dst_x, $dst_y, //int $dst_x , int $dst_y
    $src_x, $src_y, //int $src_x , int $src_y
    imagesx($filerImg), imagesy($filerImg) //int $src_w , int $src_h 
);

imagepng($imgData, "../data/post/" .  "post_" . $_SESSION['id'] . "_" . time() . ".png");
imagedestroy($imgData);




?>