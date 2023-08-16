<?php
include 'connect.php';

if(isset($_POST['adminblock']))
{

    foreach($_POST['chkbox'] as $chk )
     {
        
        $query="UPDATE users set block='true' where id=".$chk;
        $res = mysqli_query($conn, $query);
     }
   
    if ($res > 0) {

        echo "<script type='text/javascript'>
        alert('User has been blocked');
        window.location.href='users.php';
        </script>";
     
    } else {
        echo "<script type='text/javascript'>
        alert('Something went wrong !!! Please try again later.');
        window.location.href='users.php'; 
        </script>";
    }
}
?>

