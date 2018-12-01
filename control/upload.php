<?php
session_start();

include_once '../config/db.php';

  if (!file_exists('../src')) {
      mkdir('../src', 0775, true);
  }
  $img = $_POST['img'];
  $img = str_replace('data:image/png;base64,', '', $img);
  $img = str_replace(' ', '+', $img);
  $data = base64_decode($img);
  $file = '../src/'.mktime().'.png';
  $success = file_put_contents($file, $data);
  echo $success ? $file : 'Unable to save the file.';

  $file = '../src/'.mktime().'.png';
  
  try {
      $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $req = $pdo->prepare('INSERT INTO pictures (username, pic) VALUES (:username, :file)');
      $req->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
      $req->bindParam(':file', $file, PDO::PARAM_STR);
      $req->execute();
  } catch (PDOException $e) {
    echo 'Error: '.$e->getMessage();
  }
  
?>

