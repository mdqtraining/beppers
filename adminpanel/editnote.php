<!DOCTYPE html>
<html>

<head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

</html>

<?php include 'header.php';

include "connect.php";
if (isset($_POST['submit'])) {  //button name
    $id = $_POST['id'];             //input name
    $status = $_POST['status'];
    $note = $_POST['note'];
    $sql = "UPDATE contact_details set status='$status', note='$note' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>
        alert('Status Updated Successfully');
        window.location.href='support.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Something went wrong !!! Please try again later.');
        window.location.href='support.php'; 
        </script>";
    }
}

?>
<style>
    .body_color {
        background-color: #2d2e37 !important;
        color: #fc6703;
    }

    .table> :not(caption)>*>* {
        background-color: #111420 !important;
    }

    .table-striped>tbody>tr:nth-of-type(2n+1)>* {
        --bs-table-accent-bg: #2d2e37 !important;
    }

    .btn {
        background-color: #2d2e37 !important;
    }

    .bg {
        background-color: #111420 !important;
        border: 1px solid #111420 !important;
        color: white !important;
    }

    .filterbtn {
        border-radius: 5px;
        background: #111420 !important;
        box-shadow: -6px -6px 18px #07080d,
            6px 6px 18px #1b2033;
    }
</style>
<?php
include "connect.php";
if (isset($_POST['update'])) {
    $eid = $_SESSION['editid'];
    $note = $_POST['note'];
    $query = mysqli_query($con, "UPDATE contact_details set note='$note' WHERE id = '$eid'");
    if ($query) {
        echo '<script>alert("Note has been Updated.")</script>';
        echo "<script>window.location.href ='support.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
?>

<body class="body_color">
    <div class="container-fluid">
        <div class="row nowrap">
            <div class="col-auto px-0">
                <?php include 'sides.php'; ?>
            </div>

            <div class="col py-3">
               
           
               
                        <textarea id="form10" class="md-textarea form-control" name="note" rows="3">

                       </textarea>

              
            </div>
        </div>
    </div>
</body>
</html>