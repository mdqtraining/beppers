<?php
          include 'connect.php';

          if (isset($_POST['postdelete'])) {


            $user_id = $_POST['userid'];
           
            $sql = "UPDATE users set no_of_posts = no_of_posts-1 WHERE id = $user_id";

            if (mysqli_query($conn, $sql)) {

              echo "<script type='text/javascript'>
                alert('User has been Deleted');
                window.location.href='post.php'; 
                </script>";

            } else {

              echo "<script type='text/javascript'>
          alert('Something went wrong !!! Please try later.');
          window.location.href='post.php'; 
           </script>";

            }
           
          }


 ?>