<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>antini Camera</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

<script src="../script/myscripts.js" ></script>
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
        <li><a href="home.php">Home</a></li>
        <li class="active"><a href="#">Camera</a></li>
        <li><a href="#">About</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="picture.php">Picture</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><span class="glyphicon glyphicon-log-in"></span><?php echo $_SESSION['username'];?></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    <form id="editpic_filter" width="100%"> <!--filters to change-->
        <label for="download">
          <input type="radio" name="editpic_filter" value="../src/p1.png" id="p1" onchange="show_img('p1')">
          <img class="img" src="../src/p1.png" height="80" width="80">
        </label>
        <label>
          <input type="radio" name="editpic_filter" value="../src/p2.png" id="p2" onchange="show_img('p2')">
          <img class="img" src="../src/p2.png" height="80" width="80">
        </label>
        <label>
          <input type="radio" name="editpic_filter" value="../src/p3.png" id="p3" onchange="show_img('p3')">
          <img class="img" src="../src/p3.png" height="80" width="80">
        </label>
        <label>
          <input type="radio" name="editpic_filter" value="../src/p4.png" id="p4" onchange="show_img('p4')">
          <img class="img" src="../src/p4.png" height="80" width="80">
        </label>
        <label>
          <input type="radio" name="editpic_filter" value="../src/p5.png" id="p5" onchange="show_img('p5')">
          <img class="img" src="../src/p5.png" height="80" width="80">
        </label>
        <label>
          <input type="radio" name="editpic_filter" value="../src/p6.png" id="p6" onchange="show_img('p6')">
          <img class="img" src="../src/p6.png" height="80" width="80">
        </label>
    </form>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Smile For the Camera</h1>
      <img id="image" height="240px" width="280px" style="display: none;" />
    <div id="edit_pic"><video id="video"></video></div><!--show images with filter--> <!--show video-->
    </div>
    <div class="col-sm-2 sidenav">
      
      <div id="canvas"></div><!-- Show complete picture-->
        <form method='post' accept-charset='utf-8' name='form'>
          <input name='img' id='img' type='hidden'/><!--getting image to post ID on upload-->
        </form>
     
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
<br />
<br />
  <p><button class="button" id="capture" onclick="javascript:capture()">Capture</button></p>
  
  <p><input type='file' accept="image/*" onchange="readURL(this);" /></p>
</footer>

</body>
</html>
