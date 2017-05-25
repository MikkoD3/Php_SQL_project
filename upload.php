<?php

//Include the databse connection
session_start();
include "include/config.php";
include "include/checklogin.php";
$msg = "";



//If button is pressed
if (isset($_POST['upload'])) {
    
    
    //Path to store images
    $target = "uploads/".basename($_FILES['image']['name']);
    $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
    
  $extensions = array("jpeg", "jpg", "png", "gif");
    
    if(in_array($file_ext, $extensions) === false) {
    $errors[]="Extensions not allowed, please choose a JPEG, GIF or PNG File";
        //OK can upload
    }
    if(empty($errors) == true) {
        
    
    //Get all the submitted data
    $image = $_FILES['image']['name'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $username = $_SESSION['username'];
    
    
    $query = "SELECT * FROM images WHERE title = '$title'";
    $result = mysqli_query($conn, $query);
    
    
     if(mysqli_num_rows($result) == 0) {
    $sql = "INSERT INTO images (username, title, image, description) VALUES ('$username', '$title', '$image', '$description')";
    mysqli_query($conn, $sql); //Stores the submitted data into the database table = images

    //Move image to folder
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image Uploaded successfully";
    } else {
        $msg = "There was a error uploading the image";
    }
     } else {
         $_SESSION['message'] = "An Image with the same title already exist!";
         $title = "";
     }
    } else {
        $_SESSION['message'] = "This File is not an Image, please choose another file.";
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
      <link href="style.css" rel="stylesheet">

    <title>Upload</title>

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
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="/IMG_App/gallery.php">Gallery</a></li>
                     <li><a href="/IMG_App/profile.php"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
                  <li><a href="/IMG_App/logout.php"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
           <h1>Upload!</h1>
              
              <?php
              include "include/messages.php";
              ?>
            <br>
              <br>
                <br>
              <div class="cntainer">
            <form method="post" action="upload.php" enctype="multipart/form-data">
                <input type="hidden"  name="size" value="1000000">
                <div class="form-group">
                <label for="image">Upload Image
                <input class="form-control" type="file" name="image">
                    </label>
                </div>
                 <div class="form-group">
                <label for="title">Title of Image</label>
                <input type="text" name="title" id="title" class="form-control" >
                </div>
                <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" cols="30" rows="3" placeholder="Description of the image" style="color: black !important;"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="upload" value="Upload image" class="btn btn-primary">
                </div>
            </form>
         </div>
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