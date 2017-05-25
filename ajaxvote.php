
<?php
session_start();

include "include/dbconfig.php";

//Start session

dbConnect();



if($_SERVER['HTTP_X_REQUESTED_WITH']) {
    if (isset($_POST['postid']) AND isset($_POST['action'])) {
        $postId = (int) mysql_real_escape_string($_POST['postid']);
        
        if(isset($_SESSION['vote'][$postId])) return;
        
        //query
        $query = mysql_query("
        SELECT vote
        FROM images
        WHERE id = '{$postId}'
        LIMIT 1 ");
        
        //increase or decrease
        if ($data = mysql_fetch_array($query)) {
            if ($_POST['action'] === 'up') {
                $vote = ++$data['vote'];
            } else {
                $vote = --$data['vote'];
            }
            
            //update score
            mysql_query("
            UPDATE images
            SET vote = '{$vote}'
            WHERE id = '{$postId}' ");
            
            
            
            //Set session
            $_SESSION['vote']['postId'] = true;
            setcookie('vote', $_SESSION['vote'], time() + (60 * 60 * 24 *30));
            setcookie('postid', $_SESSION['postid'], time() + (60 * 60 * 24 *30));
        }
    }
}
 

dbConnect(false);

?>