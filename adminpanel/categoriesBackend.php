<?php
// connect database connection
include "connect.php";

// Initialize message variable
$msg = "";

// If upload button is clicked ...
if (isset($_POST['editpost'])) {

    $post_id = $_POST['post_id'];

    $categories_name = mysqli_real_escape_string($conn, $_POST['categories_name']);

    $sql = mysqli_query($conn, "UPDATE categories SET `name` = '$categories_name' WHERE id = '$post_id'");

    if ($sql) {
        echo "<script type='text/javascript'>
		alert('categories has been inserted successfully');
		window.location.href='addcategory.php'; 
		</script>";
    } else {
        echo "<script type='text/javascript'>
		alert('categories has not been inserted successfully');
		window.location.href='addcategory.php'; 
		</script>";
    }
}
