<?php
    include "../control/reset.php";
    ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="../index.php">Camagru</a>
          </div>
          <ul class="nav navbar-nav">
          <li class="active"><a href="#">Reset</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="signup.php">Signup</a></li>
          </ul>
        </div>
      </nav>
    </div>

<div class="container">
        <h1>Reset password</h1>
        <div class="form-group">
            <form method="post" action="../control/reset.php" name="resetform">
                Email : <input type="text" class="form-control" placeholder="Enter Email" name="email" tabindex="1" required>
                New Password :  <input type="password" class="form-control" placeholder="Enter password" name="password" tabindex="2" required>
                Confirm :   <input type="password" class="form-control" placeholder="Enter password" name="confirm" tabindex="3" required>
                            <button type="submit" class="btn btn-default"  name="reset" tabindex="3">Reset</button> 
                            <div class="well"><?php echo $_SESSION['error']; ?></div>
            </form>
          </div>
</div>