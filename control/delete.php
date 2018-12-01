<?php

  session_start();
  include_once '../config/db.php';

  try { //delete comment and likes
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $pdo->prepare('DELETE FROM `add` WHERE pic_id = ?');
    $req->execute([$_GET['pic_id']]);
} catch (PDOException $e) {
    echo $sql.'<br>'.$e->getMessage();
}
  try { //delete picture
      $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $req = $pdo->prepare('DELETE FROM pictures WHERE username = :username AND id = :pic');
      $req->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
      $req->bindParam(':pic', $_GET['pic'], PDO::PARAM_INT);
      $req->execute();
  } catch (PDOException $e) {
      echo $sql.'<br>'.$e->getMessage();
  }
 
  header("Location: ../form/picture.php");
  ?>
