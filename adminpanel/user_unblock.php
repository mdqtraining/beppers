<?php
include 'connect.php';

    if(isset($_POST['unblock'])) {  //button name
    $id = $_POST['id'];             //input name

    $sql = "UPDATE users set block='false' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {

        echo "<script type='text/javascript'>
        alert('User Unblocked Successfully');
        window.location.href='user_block.php';
        </script>";
        }
     else {
        echo "<script type='text/javascript'>
        alert('Something went wrong !!! Please try again later.');
        window.location.href='user_block.php'; 
        </script>";
    }
}
?>