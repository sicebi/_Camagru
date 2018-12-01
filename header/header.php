<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Camagru</a>
          </div>
          <ul class="nav navbar-nav">
          <?php if (isset($_SESSION['username'])) { ?>
              <li><a href="form/home.php">Home</a></li>
              <li><a href="#">AboutUs</a></li>
                <li><a href="form/camera.php">Camera</a></li>
                <li><a href="form/picture.php">Picture</a></li>
                <li><a href="form/profile.php">Profile</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>Welcome : <?php echo $_SESSION['username']; ?></a></li>
                <li><a href="control/logout.php"><span class="glyphicon glyphicon-off"></span> LogOut</a></li>
            <?php }else{ ?>
              <li><a href="form/home.php">Home</a></li>
              <li><a href="form/login.php">Login</a></li>
              <li><a href="form/signup.php">Signup</a></li>
              <li><a href="form/reset.php">Reset</a></li>
            <?php } ?>
          </ul>
        </div>
      </nav>
    </div>
