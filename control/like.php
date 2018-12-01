<?php 
session_start();
include "../config/db.php";

    try {
        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $pdo->prepare('UPDATE `add` SET `likes` = ?, `pic_id` = ?');
        $req->execute([`likes`+1, $_GET['pic_id']]);
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
        exit;
    }

header("location: ../form/picture.php");

?>