<?php
          include 'connect.php';

          if (isset($_POST['postdelete'])) {

            foreach($_POST['chkbox'] as $chk )
            {
              $delres = mysqli_query($conn,"DELETE FROM post WHERE id =".$chk);
              
              $update = mysqli_query($conn,"UPDATE users set no_of_posts = no_of_posts-1 WHERE id =".$chk);
              // $updateres = mysqli_num_rows($update);
              // echo $updateres;
              }
            
              if ( $update > 0 ) {
              echo "<script type='text/javascript'>
                alert('Post has been Deleted');
                window.location.href='post.php'; 
                </script>";

            }else {

              echo "<script type='text/javascript'>
          alert('Post count has not been changed !!!');
          window.location.href='post.php'; 
           </script>";

            }
          }
          else {

            echo "<script type='text/javascript'>
        alert('Something went wrong !!! Please try later.');
        window.location.href='post.php'; 
         </script>";

          
          }
        
          ?>