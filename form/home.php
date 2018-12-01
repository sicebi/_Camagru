<!DOCTYPE html>
<html lang="en">
<head>
  <title>antini Pictures</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 

<link rel="stylesheet" type="text/css" href="../css/css.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="../index.php">Camagru</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="signup.php">Signup</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
  
  <?php
  session_start();
 
    include_once '../config/db.php';
    
    try {
        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $pdo->prepare('SELECT * FROM pictures LIMIT 10');
        $req->execute();
        $picture = $req->fetchAll();
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
        exit;
    }
    
    if (!$picture) {
       
            echo "<marquee><h1> The gallery is empty !!!!!! <br /> log in take pictures</h1></marquee>";
    }
    ?>
   

      <?php
      foreach ($picture as $key => $pictureALL) {
          echo "<div class='col-sm-6' style='background-color:silver;'>";
          try {
              $req = $pdo->prepare("SELECT * FROM `add` WHERE pic_id = $pictureALL[id]");
              $req->execute();
              $like = $req->fetchColumn();
          } catch (PDOException $e) {
              echo 'Error: '.$e->getMessage();
              exit;
          }
         
          echo "<img src='$pictureALL[pic]' style='width:426px;'>
          <br/>
          Posted By : $pictureALL[username]
          <br/>
          Likes:<b>( $like )</b>";
          try {
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $req = $pdo->prepare("SELECT * FROM `add` WHERE pic_id = $pictureALL[id]");
            $req->execute();
            $comment = $req->fetchAll();
          } catch (PDOException $e) {
              echo 'Error: '.$e->getMessage();
              exit;
          }
          
          if ($comment) {
              echo "<div class='well'>";
              foreach ($comment as $key => $comment) {
                  echo "<hr/><b>COMMENT By:</b>  $comment[username] <br/> $comment[comment] <hr>";
              }
              echo '</div>';
          }
          echo '</div>';
      }
      

    ?>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
<br />
<br />
 <p> for more informatin contact antini@wethinkcode &copy;</p>
</footer>

</body>
</html>


*/
