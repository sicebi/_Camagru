<?php
  session_start();
  include "../config/db.php";

  $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
  
  try {
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $pdo->prepare('INSERT INTO `add`(`username`, `pic_id`, `comment`) VALUES (:username, :pic_id, :comment)');
    $req->bindParam(':pic_id', $_GET['pic_id'], PDO::PARAM_INT);
    $req->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
    $req->bindParam(':comment', $comment, PDO::PARAM_STR);
    $req->execute();
  } catch (PDOException $e) {
      echo 'Error: '.$e->getMessage();
      exit;
  }
  header("location: ../form/picture.php");
  ?>