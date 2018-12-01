<?php
session_start();
include '../config/db.php';

        $email= filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $password= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $confirm= filter_var($_POST['confirm'], FILTER_SANITIZE_STRING);
        $username = filter_var($_SESSION['username'], FILTER_SANITIZE_STRING);
        


    if ($password != $confirm || strlen($password < 5)) {
        $_SESSION['error'] ="password do not match or not strong";
        header("Location: ../form/update.php");
        exit();
        }

        try {
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $req = $pdo->prepare('SELECT username FROM people WHERE username = ?');
	        $req->execute([$username]);
	        $ExistUsername = $req->fetchColumn();
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
            exit;
        }
    if ($ExistUsername)
    {
        try {
            
            $password = hash(SHA256, $password);//generate hash and hash password
            $hashkey = md5(rand(0, 1000));
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $req = $pdo->prepare('UPDATE people SET password = ?, email = ? WHERE username = ?');
            $req->execute([$password, $email, $username]);
    
            $_SESSION['error'] ="User information Updated";
            header("Location: ../form/update.php");
            exit();
    
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
            exit;
        }
         
    }
        

?>