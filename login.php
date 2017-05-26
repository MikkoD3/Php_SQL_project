<?php
session_start();

//include "include/config.php";

    //session_start();


//login
    if (isset($_POST['login_btn'])) {
       // session_start();
        include "include/config.php";
        
        //Get input from the form
        $username = mysql_real_escape_string($_POST['username']);
        $password = mysql_real_escape_string($_POST['password']);
        
        //Hash the password
        //$password = md5($password);
        //$sql = "SELECT * FROM users WHERE username= '$username' AND password='$password'";
        //$result = mysqli_query($conn, $sql);
        
    
      
        
  
             
          
            
     

    if (!empty($username) && !empty($password)) {
        // Fetch the userid, username, password, and city from the database
         $sql = "SELECT username, password FROM users WHERE username= '$username' AND password= MD5('$password')";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
          // The login is OK. Set the userid, username, and city session variables. Set the cookies. Redirect to the home page
          $row = mysqli_fetch_array($result);
          
          //Set Session variables
            $_SESSION['message'] = 'You are now Logged in';
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
          
          
          // Check this nice way to get the URL of the app's home pag
          header('Location: index2.php');
        }
        else {
          // The username or password are incorrect so set an error message
          $error_msg = 'Sorry, the username/password you entered is not correct. Try again!';
        }
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

    <title>Login</title>

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
              <h3 class="masthead-brand">IMG Gallery</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="/IMG_App/login.php">Login</a></li>
                  <li><a href="/IMG_App/index.php">Home</a></li>
                  <li><a href="/IMG_App/signup.php">Sign Up</a></li>
                </ul>
              </nav>
            </div>
          </div>

             <?php
            include "include/messages.php";
            ?>
            
        
                
                <form method="post" action="login.php" class="form-horizontal">
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">Username: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name="username" placeholder="Username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password: </label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button name="login_btn" type="submit" class="btn btn-default">Login</button>
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