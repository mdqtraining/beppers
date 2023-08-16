<?php
// connect database connection
include "connect.php";

// Initialize message variable
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    // Get image name
    //$image = $_FILES['image']['name'];

    $name = mysqli_real_escape_string($conn, $_POST['categories_name']);

    $sql = mysqli_query($conn, "INSERT INTO categories (name) VALUES ('$name')");

    if ($sql) {
        echo "<script type='text/javascript'>
		alert('Categories has been inserted successfully');
		window.location.href='addcategory.php'; 
		</script>";
    } else {
        echo "<script type='text/javascript'>
		alert('Something went wrong please try again!');
		window.location.href='addcategory.php'; 
		</script>";
    }
}
