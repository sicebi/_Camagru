<?php 
session_start(); 
unset ($_SESSION['error']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>antini camagru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-ico" href="favicon.ico">
   
 <!--Start bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--End bootstrap -->
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body id="index">
<?php require 'header/header.php'; ?>
    <div class="container">
        
        <h1 >Welcome To Camagru</h1>
        <h3 >Say Cheese to the Camera !!!!!!!!!!!!  <?php echo $_SESSION['username'] ; ?></h3>
    </div>
</body>
</html>