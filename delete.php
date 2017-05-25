<?php
session_start();

include "include/config.php";

$username = $_SESSION['username'];
    
if (isset($_POST['delete_btn'])) {
  //  session_start();
    

    if(empty($username)) {
        echo "error";
    } else {
        
        $sql = "
                DELETE FROM users WHERE username='$username'
        ";
        
        if ($conn->query($sql) === TRUE) {
            header("location: index.php");
            echo "user Deleted";
        } else {
            echo "there was a error";
        }
    }
    
    
}

?>