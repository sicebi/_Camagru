<?php
    include "../control/signup.php";
    ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="../index.php">Camagru</a>
          </div>
          <ul class="nav navbar-nav">
          <li class="active"><a href="#">Signup</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="reset.php">reset</a></li>
          </ul>
        </div>
      </nav>
    </div>

<div class="container">
        <h1>Signup</h1>
        <div class="form-group">
            <form method="post" action="../control/signup.php" name="signupform">
                Username : <input type="text" class="form-control" placeholder="Enter username" name="username" tabindex="1" required>
                Email :     <input type="text" class="form-control" placeholder="Enter email" name="email" tabindex="2" required>
                Password :  <input type="password" class="form-control" placeholder="Enter password" name="password" tabindex="3" required>
                Confirm :   <input type="password" class="form-control" placeholder="Re enter password" name="confirm" tabindex="4" required>
                            <button type="submit" class="btn btn-default"  name="signup">Signup</button>
                            <div class="well"><?php echo $_SESSION['error']; ?></div>
            </form> 
        </div>
    </div>
   
    