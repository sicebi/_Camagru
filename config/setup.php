<?php
	require_once 'db.php';

try{
    $DB = explode(';', $DB_DSN);
    $database = substr($DB[1], 7);
    $pdo = new PDO("$DB[0]", $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $database");
    echo "created database camagru successfully.<br>";
    $pdo->exec("use $database");
/*create tables and insert data */
/* -------------------------------------------------------------*/
    $pdo->exec("CREATE TABLE IF NOT EXISTS `people` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        state VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`))");
      echo "Table 'People' created successfully.<br>";
/* */
/* ------------------------------------------------------------*/
$pdo->exec("CREATE TABLE IF NOT EXISTS `pictures` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    pic VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`))");
  echo "Table 'Pictures' created successfully.<br>";
/* ---------------------------------------------------------------*/

/*$pdo->exec("CREATE TABLE IF NOT EXISTS `likes` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    pic_id VARCHAR(255) NOT NULL,
    likes VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`))");
  echo "Table 'Like' created successfully.<br>";*/

/*-------------------------------------------------------------*/
$pdo->exec("CREATE TABLE IF NOT EXISTS `add` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    pic_id VARCHAR(255) NOT NULL,
    comment VARCHAR(255) NOT NULL,
    likes varchar(255) DEFAULT '0',
    PRIMARY KEY (`id`))");
  echo "Table 'add comment and like' created successfully.<br>";
/*-------------------------------------------------------------*/

}catch (Exception $e)
{
    echo 'Error: '.$e->getMessage();
    exit;
}
?>