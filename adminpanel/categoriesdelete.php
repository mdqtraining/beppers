<?php
include 'connect.php';

if (isset($_POST['postdelete'])) {
    $userid = $_POST['userid'];
    $sql = "DELETE FROM categories WHERE id = '$userid'";
    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>
    alert('Categories has been Deleted');
    window.location.href='addcategory.php'; 
    </script>";
    } else {
        echo "<script type='text/javascript'>
          alert('Something went wrong !!! Please try later.');
          window.location.href='addcategory.php'; 
           </script>";
    }
}
