<?php
session_start();
include '../config/db.php';
if (isset($_POST['reset'])) {

        $email= $_POST['email'];
        $password= $_POST['password'];
        $confirm= $_POST['confirm'];

    if ($password != $confirm || strlen($password < 5)) {
        $_SESSION['error'] ="password do not match or not strong";
        header("Location: ../form/reset.php");
        exit();
        }

        try {
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $req = $pdo->prepare('SELECT email FROM people WHERE email = ?');
	        $req->execute([$email]);
	        $ExistEmail = $req->fetchColumn();
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
            exit;
        }
      
    if ($ExistEmail)
    {
        try {
            
            $password = hash(SHA256, $password);//generate hash and hash password
            $hashkey = md5(rand(0, 1000));
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $req = $pdo->prepare('UPDATE people SET password = ?, state = ? WHERE email = ?');
            $req->execute([$password, $hashkey, $email]);
    
            
    
            $to = $email;//send email after wards
            $subject = 'Camagru | Reset';
            $message = "Your have been reset, you can login with the following login after activating your account.
    
                          ------------------------
                          username: '$username'
                          ------------------------
    
                          Click on the following link to activate your account
                          http://localhost:8080/angular/control/activate.php?email=$email&hashkey=$hashkey";
    
              $headers = 'From:antini@student'."\r\n";
              mail($to, $subject, $message, $headers);
            $_SESSION['error'] ="please check email to verfy your account then login";
            header("Location: ../form/reset.php");
            exit();
    
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
            exit;
        }
         
    }
        
}
?>