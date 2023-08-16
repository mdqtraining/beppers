<?php
          include 'connect.php';

          if (isset($_GET['id'])) {


            $user_id = $_GET['id'];

            $sql = "DELETE FROM admin_block WHERE id = '$user_id'";

            if (mysqli_query($conn, $sql)) {

              echo "<script type='text/javascript'>
                alert('User has been Deleted');
                window.location.href='users.php'; 
                </script>";

            } else {

              echo "<script type='text/javascript'>
          alert('Something went wrong !!! Please try later.');
          window.location.href='users.php'; 
           </script>";

            }
           
          }
          ?>