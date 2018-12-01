<?php
session_start();
include '../config/db.php';
if (isset($_POST['signup'])) {

        $username= filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $email= $_POST['email'];
        $password= $_POST['password'];
        $confirm= $_POST['confirm'];
        

    if (empty($username) || !preg_match('/^[a-zA-Z0-9]+$/', $username) || strlen($username) < 4)
        {
            $_SESSION['error'] ="invalid Username";
            header("Location: ../form/signup.php");
            exit();  
        }

    if ($password != $confirm || strlen($password < 5)) {
        $_SESSION['error'] ="password do not match or not strong";
        header("Location: ../form/signup.php");
        exit();
        }

        try {
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $req = $pdo->prepare('SELECT username FROM people WHERE username = ?');
	        $req->execute([$username]);
	        $ExistUsername = $req->fetch();
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
            exit;
        }

        if ($ExistUsername)
        {
            $_SESSION['error'] ="Username Exist on Our DataBase";
            header("Location: ../form/signup.php");
            exit();    
        }
        try {
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $req = $pdo->prepare('SELECT email FROM people WHERE email = ?');
	        $req->execute([$email]);
	        $ExistEmail = $req->fetch();
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
            exit;
        }
      
    if ($ExistEmail)
    {
        $_SESSION['error'] ="Email Exist on Our DataBase";
        header("Location: ../form/signup.php");
        exit();  
    }

    //generate hash and hash password
        $password = hash(SHA256, $password);
        $hashkey = md5(rand(0, 1000));
        
    try {
        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //lets see
        /*$username = mysql_real_escape_string($username);
        $email = mysql_real_escape_string($email);
        $password = mysql_real_escape_string($password);
        $confirm = mysql_real_escape_string($confirm);*/

        $req = $pdo->prepare('INSERT INTO people SET username = ?, email = ?, password = ?, state = ?');
        $req->execute([$username, $email, $password, $hashkey]);

        //send email after wards

        $to = $email;
 		$subject = 'Camagru | Register';
  		$message = "You have been added to the database, you can login with the following login after activating your account.

  					------------------------
  					username: '$username'
  					------------------------

  					Click on the following link to activate your account
  					http://localhost:8080/angular/control/activate.php?email=$email&hashkey=$hashkey";

  		$headers = 'From:antini@student'."\r\n";
  		mail($to, $subject, $message, $headers);
        $_SESSION['error'] ="please check email to verfy your account then login";
        header("Location: ../form/signup.php");
        exit();

    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
        exit;
    }
}
?>