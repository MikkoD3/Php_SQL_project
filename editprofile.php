<?php
   session_start();
include "include/checklogin.php";


//session_start();
?>

<?php

//connect to database
include "include/config.php";

$user = $_SESSION['username'];

if (isset($_POST['update_btn'])) {
  //  session_start();
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    


    if(empty($username)) {
        echo "error";
    } else {
        
        $sql = "
                UPDATE users SET username='$username' WHERE username='$user'
        ";
        
        if ($conn->query($sql) === TRUE) {
            echo "username updated!";
        } else {
            echo "there was a error";
        }
    }
    
    
}

if (isset($_POST['update_email_btn'])) {
  //  session_start();
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    


    if(empty($email)) {
        echo "error";
    } else {
        
        $sql = "
                UPDATE users SET email='$email' WHERE username='$user'
        ";
        
        if ($conn->query($sql) === TRUE) {
            echo "email updated!";
        } else {
            echo "there was a error";
        }
    }
    
    
}

if (isset($_POST['update_password_btn'])) {
  //  session_start();
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    


    if(!empty($password) && !empty($password2) && ($password == $password2)) {
        $password = md5($password); 
        
        $sql = "
                UPDATE users SET password='$password' WHERE username='$user'
        ";
        
        if ($conn->query($sql) === TRUE) {
            echo "Password updated!";
        } else {
            echo "there was a error";
        }
    } else {
        echo "error½";
    }
    
    
}

if (isset($_POST['delete_btn'])) {
  //  session_start();
    if(!empty($user)) {

        
        $sql = "
                DELETE FROM users WHERE username='$user'
        ";
        
        if ($conn->query($sql) === TRUE) {
            echo "User Deleted";
            header("location: index.php");
        } else {
            echo "there was a error";
        }
    } else {
        echo "error½";
    }
       }

 $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Profile</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Cover</h3>
              <nav>
                <ul class="nav masthead-nav">
                    <li class="active"><a href="/IMG_app/editprofile.php">Edit Profile</a></li>
                    <li><a href="/IMG_app/index2.php">Home</a></li>
                    <li><a href="/IMG_app/profile.php">Profile</a></li>
                  <li><a href="/IMG_App/logout.php"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>
                    
                </ul>
              </nav>
            </div>
          </div>
            
<br><br><br><br><br><br><br><br>
        
            <?php
            include "include/messages.php";
            ?>
            <h4> Welcome: <?php echo $_SESSION['username'];  ?>  </h4>

       <form method="post" action="editprofile.php" class="form-horizontal">
    <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">Change Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name="username" placeholder="Username">
    </div>
  </div>
     <div class="col-sm-offset-2 col-sm-10">
    <button name="update_btn" type="submit" class="btn btn-default">Update Username</button>
</div>
</form>
        <hr>
<br><br><br><br>            
                        
<form method="post" action="editprofile.php" class="form-horizontal">
    <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Change New Email address:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputName" name="email" placeholder="New Email">
    </div>
  </div>
     <div class="col-sm-offset-2 col-sm-10">
    <button name="update_email_btn" type="submit" class="btn btn-default">Update Email</button>
</div>
</form>
            <hr>
            
<br><br><br><br>
            
<form method="post" action="editprofile.php" class="form-horizontal">
    <div class="form-group">
    <label for="password" class="col-sm-2 control-label">New Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputName" name="password" placeholder="New password">
    </div>
  </div>
    <div class="form-group">
    <label for="password2" class="col-sm-2 control-label">New Password Again:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputName" name="password2" placeholder="new password again">
    </div>
  </div>
     <div class="col-sm-offset-2 col-sm-10">
    <button name="update_password_btn" type="submit" class="btn btn-default">Update Email</button>
</div>
</form>
            <hr>
            
<br><br><br><br><br><br><br>

           
            <div class="alert alert-danger"><h3>WARNING:</h3> <p>if you press thsi button your user account is deleted and it cannot be undone!</p></div>
                <form method="post" action="editprofile.php" class="form-horizontal">
                <button type="submit" class="btn btn-danger btn-lg" name="delete_btn">Delete user</button>
                </form>
            
            
          </div>

          <div class="mastfoot">
            <div class="inner">

              <p>IMG gallery</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>