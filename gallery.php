<?php
session_start();
include "include/checklogin.php";


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

    <title>Gallery</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
      <link href="style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
   
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>

  <body onload="onLoad()">

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Cover</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="/IMG_App/gallery.php">Gallery</a></li>
                  <li><a href="/IMG_App/upload.php">Upload Image</a></li>
                  <li><a href="/IMG_App/profile.php"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
                  <li><a href="/IMG_App/logout.php"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>
                </ul>
              </nav>
            </div>
          </div>
                 <form method="post" action="gallery.php" class="form-inline">
        <button onclick="return confirm('Note This will delete ALL the images you have uploaded for the service')" class="btn btn-alert" type="submit" name="delete_img_btn">Delete Your Images</button>
        </form>
          <div class="inner cover">
            <h1 class="cover-heading">Gallery</h1>
              
  
              <?php


include "include/config.php";
$sql = "SELECT * FROM images";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $title = $row['title'];
    $_SESSION['title'] = $title;
    echo "<div class='col-sm-6 col-md-4'>";
    echo "<div class='thumbnail'>";
    echo "<h4 style='color: black'>".$row['title']."</h4>";
    echo "<p style='color: black'>By:".$row['username']." </p>";
    echo "<a href='#' class='pop'>";
    echo "<img id='uploads' src='uploads/".$row['image']."' style='width: 100%; border: 3px solid black'>";
    echo "</a>";
    echo "<p class='lines' style='color: black'>".$row['description']."</p>";
    echo "<div class='item' data-postid='".$row['id']."' data-score='".$row['vote']."'>";
    echo "<div class='vote-span'>";
    echo "<button class='vote' id='like' likeid='".$row['id']."' data-action='up' title='vote up'><span class='glyphicon glyphicon-chevron-up'></span></button>";
    echo "<div class='vote-score'>".$row['vote']."</div>";
    echo "<button class='vote' id='like' likeid='".$row['id']."' data-action='down' title='Vote down'><span class='glyphicon glyphicon-chevron-down'></span></button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
} 

      $username = $_SESSION['username'];
    
if (isset($_POST['delete_img_btn'])) {
  //  session_start();
    if(empty($username)) {
        echo "error";
    } else {
        
        $sql = "
                DELETE FROM images WHERE username='$username'
        ";
        
        if ($conn->query($sql) === TRUE) {
            
           header("location: gallery.php");
        } else {
            echo "there was a error";
        }
    }
    
    
}        

?>
 


              
              
              <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
      	<input type="button" value="close" class="close" data-dismiss="modal">
        <img src="" class="imagepreview" style="width: 100%;" >
       
        
      </div>
         <div style="height: 200px; overflow: auto">
        
        </div>
    </div>
  </div>
</div>
      
<br>
<br>
<br>
<br>
<br>
<br>  
        
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="/IMG_App/js/modal.js"></script>
        <script src="likes.js"></script>
       <script src="/IMG_App/js/windowload.js"></script> 
      <script src="/IMG_App/js/localstorage.js"></script> 
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

        
  </body>
</html>
 