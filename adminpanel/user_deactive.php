<?php
include 'connect.php';

    if(isset($_POST['deactivate'])) {  //button name
    $id = $_POST['id'];             //input name

    $sql = "UPDATE users set deactivate='true' WHERE id= '$id'";

    if (mysqli_query($conn, $sql)) {

        echo "<script type='text/javascript'>
        alert('Account deactivated Successfully');
        window.location.href='deactivate.php';
        </script>";
        
    } else {
        echo "<script type='text/javascript'>
        alert('Something went wrong !!! Please try again later.');
        window.location.href='deactivate.php'; 
        </script>";
    }
}
?>