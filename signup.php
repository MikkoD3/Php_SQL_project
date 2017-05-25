<?php
session_start();


//connect to database
include "include/config.php";

if (isset($_POST['signup_btn'])) {
  //  session_start();
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']); 
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    

    
    
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);
    
$query1 = "SELECT * FROM users WHERE username = '$username'";
$result1 = mysqli_query($conn, $query1);


    if(!empty($username) && !empty($email) && !empty($password) && !empty($password2) && ($password == $password2)) {
        //Create the user
        $password = md5($password); //hash the password for security
        $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
        mysqli_query($conn, $sql);
        $_SESSION['message'] = "You can now login.";
        $_SESSION['username'] = $username;
        header("location: login.php"); //Redirect to profile page
        
    } else {
        $_SESSION['message'] = "Something Went worng, check your inputs carefully.";
        $email = "";
    }
        
    
}


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

    <title>Sign Up</title>

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
                  <li class="active"><a href="/IMG_App/signup.php">Sign Up</a></li>
                  <li><a href="/IMG_App/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                  <li><a href="/IMG/App/index.php">Home</a></li>
                </ul>
              </nav>
            </div>
          </div>

                
             <?php
            include "include/messages.php";
            ?>
                <form method="post" action="signup.php" class="form-horizontal">
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>
  </div>
    <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name="username" placeholder="Username">
    </div>
  </div>
  <div class="form-group">
    <label for="password1" class="col-sm-2 control-label">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
  </div>
    <div class="form-group">
    <label for="password2" class="col-sm-2 control-label">Confirm Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password2" name="password2" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button name="signup_btn" type="submit" class="btn btn-default">Sign Up!!</button>
    </div>
  </div>
</form>
              <p>IMG gallery</p>
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