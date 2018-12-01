<?php 
include "../control/signup.php";
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="../index.php">Camagru</a>
          </div>
        </div>
      </nav>
    </div>

<div class="container">
        <h1>Update Profile</h1>
        <div class="form-group">
            <form method="post" action="../control/profile.php" name="profileform">
                Username :  <input type="text" class="form-control" value="<?php echo $_SESSION['username'] ; ?>" tabindex="1">
                Email :     <input type="text" class="form-control" placeholder="Enter email" name="email" tabindex="2" required>
                CellNo:     <input type="text" class="form-control" placeholder="Enter cell No" name="No" tabindex="3" required>
                Gender :     <input type="text" class="form-control" placeholder="Male/Female" name="gender" tabindex="4" required>
                Password :  <input type="password" class="form-control" placeholder="Enter password" name="password" tabindex="5" required>
                Confirm :   <input type="password" class="form-control" placeholder="Re enter password" name="confirm" tabindex="6" required>
                            <button type="submit" class="btn btn-default"  name="profile">Update Profile</button>
                            <span><?php echo $_SESSION['error']; ?></span>
            </form> 
        </div>
    </div>