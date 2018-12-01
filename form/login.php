<?php
    include "../control/login.php";
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="../index.php">Camagru</a>
          </div>
          <ul class="nav navbar-nav">
              <li class="active"><a href="#">Login</a></li>
              <li><a href="signup.php">Signup</a></li>
              <li><a href="reset.php">reset</a></li>
          </ul>
        </div>
      </nav>
    </div>
  
    
<div class="container">
    <h1>login</h1>
    <div class="form-group">
        <form method="post" action="../control/login.php" name="loginform">
            Username : <input type="text" class="form-control" placeholder="Enter username" name="username" tabindex="1" required>
            Password :  <input type="password" class="form-control" placeholder="Enter password" name="password" tabindex="2" required>
                        <button type="submit" class="btn btn-default" name="login" tabindex="3">Login</button> 
                        <div class="well"><?php echo $_SESSION['error']; ?></div>
        </form>
      </div>
</div>