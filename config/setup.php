<?php
require 'database.php';
date_default_timezone_set("Europe/Paris");

// CONNECT TO BDD
try {
    echo "Connection à la base de données..\n";
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOEXCEPTION $e) {
    exit($e);
}

// CREAT DB
try {
    $sql = "CREATE DATABASE IF NOT EXISTS " . $DB_NAME . ";";
    $pdo->prepare($sql)->execute();
} catch (PDOEXCEPTION $e) {
    exit($e);
}

// Closing connection to specify previously created database
$pdo = null;
$DB_DSN .= ";dbname=" . $DB_NAME;
// Now connecting to specified database
try {
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOEXCEPTION $e) {
    exit($e);
}

$pdo->query('SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";');
$pdo->query('SET time_zone = "+00:00";');


//ADD TABLE
// Table structure for table `comment_post`
try {
    echo "Table structure for table `comment_post`\n";
    $sql = "CREATE TABLE `comment_post` (
        `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        `member_id` int(11) NOT NULL,
        `post_id` int(11) NOT NULL,
        `comment` varchar(255) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $pdo->prepare($sql)->execute();
} catch (PDOEXCEPTION $e) {
    exit($e);
}

// Table structure for table `like_post`
try {
    echo "Table structure for table `like_post`\n";
    $sql = "CREATE TABLE `like_post` (
        `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        `member_id` int(11) NOT NULL,
        `post_id` int(11) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $pdo->prepare($sql)->execute();
} catch (PDOEXCEPTION $e) {
    exit($e);
}

// Table structure for table `member`
try {
    echo "Table structure for table `member`\n";
    $sql = "CREATE TABLE `member` (
        `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        `pseudo` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL,
        `pass` varchar(255) NOT NULL,
        `avatar` varchar(255) NOT NULL,
        `notif` int(11) NOT NULL,
        `mail_key` varchar(32) NOT NULL,
        `confirm` int(11) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $pdo->prepare($sql)->execute();
} catch (PDOEXCEPTION $e) {
    exit($e);
}

// Table structure for table `post`
try {
    echo "Table structure for table `post`\n";
    $sql = "CREATE TABLE `post` (
        `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        `member_id` int(11) NOT NULL,
        `picture` varchar(255) NOT NULL,
        `like_nb` int(11) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $pdo->prepare($sql)->execute();
} catch (PDOEXCEPTION $e) {
    exit($e);
}

// Table structure for table `recovery`
try {
    echo "Table structure for table `recovery`\n";
    $sql = "
        CREATE TABLE `recovery` (
        `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        `mail` varchar(255) NOT NULL,
        `key_recov` varchar(32) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $pdo->prepare($sql)->execute();
} catch (PDOEXCEPTION $e) {
    exit($e);
}
