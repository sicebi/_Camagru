<?php
session_start();
include '../config/db.php';
//wiating to the data from URL
//$email = $_GET['email'];
//$hashkey = $_GET['hashkey'];
//$email = "advocate.ntini@gmail.com";
//$hashkey = "59b90e1005a220e2ebc542eb9d950b1e";
try {
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $pdo->prepare('SELECT * FROM people WHERE email = ? AND state = ?' );
    $req->execute([$_GET['email'], $_GET['hashkey']]);
    $ExistEmailandhashKey = $req->fetch();
} catch (PDOException $e) {
    echo 'Error: '.$e->getMessage();
    exit();
}

if ($ExistEmailandhashKey){
    try {
        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $pdo->prepare("UPDATE people SET state = 'active' WHERE email = ? AND state = ?");
        $req->execute([$_GET['email'], $_GET['hashkey']]);
        //$ExistEmailandhashKey = $req->fetchColumn();
    
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
        exit();
    }
    $_SESSION['error'] ="Account activated Ready to login ";
    header("Location: ../form/login.php");
}else{
    $_SESSION['error'] ="check link or contact your admin";
    header("Location: ../form/login.php");
}
?>