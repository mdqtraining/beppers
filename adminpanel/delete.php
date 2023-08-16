<?php
          include 'connect.php';
          if (isset($_POST['userunblock'])) {
            $user_id = $_GET['id'];
            $sql = "DELETE FROM admin_block WHERE user_id = '$user_id'";
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
           
          } elseif (isset($_POST['postdelete'])) {
            $post_id = $_POST['post_id'];
            $sql = "DELETE FROM post WHERE id = '$post_id'";
            if (mysqli_query($conn, $sql)) {
              echo "<script type='text/javascript'>
    alert('Post has been Deleted');
    window.location.href='post.php'; 
    </script>";
            } else {
              echo "<script type='text/javascript'>
          alert('Something went wrong !!! Please try later.');
          window.location.href='post.php'; 
           </script>";
            }
            
          } elseif (isset($_POST['commentdelete'])) {
            // $comment_id = $_POST['cmntid'];
            foreach($_POST['chkbox'] as $chk )
            {
                $sql = "DELETE FROM comments WHERE id =".$chk;
            }
            if (mysqli_query($conn, $sql)) {
              echo "<script type='text/javascript'>
    alert('Comment has been Deleted');
    window.location.href='comments.php'; 
    </script>";
            } else {
              echo "<script type='text/javascript'>
          alert('Something went wrong !!! Please try later.');
          window.location.href='comments.php'; 
           </script>";
            }
           
          }