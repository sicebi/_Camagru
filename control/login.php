<?php
session_start();
include '../config/db.php';
if (isset($_POST['login'])) {

        $username= filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $password= $_POST['password'];
//check username 
    if (empty($username) || !preg_match('/^[a-zA-Z0-9]+$/', $username) || strlen($username) < 4)
        {
            $_SESSION['error'] ="invalid Username";
            header("Location: ../form/login.php");
            exit();  
        }
//check  password strength
        if (strlen($password) < 4)
        {
            $_SESSION['error'] ="Invalid Password";
            header("Location: ../form/login.php");
            exit();  
        }
//connect and check user by colum return(id NO)
        try {
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $req = $pdo->prepare('SELECT * FROM people WHERE username = ?' );
	        $req->execute([$username]);
	        $ExistUsername = $req->fetchColumn();

        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
            exit;
        }




//variable for usercolum (id) to check assume exist else not exist

        if ($ExistUsername)//check pass word
        {
            try {
                $password = hash(SHA256, $password);
                $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $req = $pdo->prepare('SELECT * FROM people WHERE username = ? AND password = ?' );
                $req->execute([$username, $password]);
                $ExistusrANDpasw = $req->fetchColumn();
    
            } catch (PDOException $e) {
                echo 'Error: '.$e->getMessage();
                exit;
            }
            if ($ExistusrANDpasw) //if password in username check state
            {   
                try {
                    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $req = $pdo->prepare('SELECT * FROM people WHERE username = ? AND password = ? AND state = "active"' );
                    $req->execute([$username, $password]);
                    $ExistusrANDpaswANDstate = $req->fetchColumn();
        
                } catch (PDOException $e) {
                    echo 'Error: '.$e->getMessage();
                    exit;
                }
                if ($ExistusrANDpaswANDstate) //if state active session start else activate
                {
                    $_SESSION['username'] = $username;
                    header("Location: ../index.php");
                    exit();
                }
                else{
                    $_SESSION['error'] ="activate account";
                    header("Location: ../form/login.php");
                    exit();
                }

            }
            else{
                $_SESSION['error'] ="Wrong Password";
                header("Location: ../form/login.php");
                exit(); 
            }   

        }
        else{
            $_SESSION['error'] ="Account Do not Exist";
            header("Location: ../form/login.php");
            exit();  
        }

}
?>