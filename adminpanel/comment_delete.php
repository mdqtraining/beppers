<?php

    include 'connect.php';
    
    if (isset($_GET['id'])) 
    {
        $comment_id = $_GET['id'];
        $sql = "DELETE FROM comments WHERE id = '$comment_id'";

        if (mysqli_query($conn, $sql)) 
        {
            echo "<script type='text/javascript'>
            alert('Comment has been Deleted');
            window.location.href='comments.php';
            </script>";
        } 
        else 
        {
            echo "<script type='text/javascript'>
            alert('Something went wrong !!! Please try later.');
            window.location.href='comments.php'; 
            </script>";
        }
       
    }

?>