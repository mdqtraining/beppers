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
    $sql = "UPDATE contact_details set status='$status' WHERE id='$id'";

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
</style>

<body class="body_color">
    <div class="container-fluid">
        <div class="row nowrap">
            <div class="col-auto px-0">
                <?php
                $directoryURI = $_SERVER['REQUEST_URI'];
                $path = parse_url($directoryURI, PHP_URL_PATH);
                $components = explode('/adminpanel/', $path);
                $first_part = $components[1];
                include 'sides.php'; ?>
            </div>

            <div class="col py-3 table-responsive">
                <div id="post" class="tabcontent container-fluid">
                    <div class="py-3">
                        <h4 class='fw-bold text-uppercase'>Help & Support</h4>
                    </div>
                    <div class="wrapper shadow-lg">
                        <table class="table css-serial text-white" style="background-color: #111420;">
                            <thead class="table-dark text-nowrap theader">
                                <tr>
                                    <th>No</th>
                                    <th>User Name</th>
                                    <th>Mobile Number</th>
                                    <th>Email Id</th>
                                    <th>Message</th>
                                    <th>
                                        <form action="#" method="POST">

                                            <select class="form-select bg" name="search" aria-label="Default select example">
                                                <option value="Status">Status</option>
                                                <option value="In-Progress">In-Progress</option>
                                                <option value="Completed">Completed</option>
                                                <option value="Rejected">Rejected</option>

                                            </select>

                                    </th>
                                    <th>
                                        <button type="submit" name="free_param">
                                            <i class="material-icons">filter_alt</i>
                                        </button>
                                        </form>
                                    </th>
                                    <th class="text-center">Update</th>
                                </tr>
                            </thead>
                            <tbody id="user_search">
                                <?php

                                $num_per_page = 20;

                                if (isset($_GET["page"])) {
                                    $page = $_GET["page"];
                                } else {
                                    $page = 1;
                                }

                                $start_from = ($page - 1) * 20;

                                if (isset($_POST['free_param'])) {
                                    $srch = $_POST['search'];
                                    if ($srch == 'Status') {
                                        $search = "SELECT * FROM contact_details";
                                        $ftcary = searchTable($search);
                                    } else {
                                        $search = "SELECT * FROM contact_details WHERE status LIKE '%" . $srch . "%'";
                                        $ftcary = searchTable($search);
                                    }
                                } else {
                                    $search = "SELECT * FROM contact_details";
                                    $ftcary = searchTable($search);
                                }

                                function searchTable($search)
                                {
                                    include 'connect.php';
                                    $search_result = mysqli_query($conn, $search);
                                    return $search_result;
                                }
                                if (mysqli_num_rows($ftcary) > 0) {

                                    while ($frow = mysqli_fetch_array($ftcary)) {

                                        $username = $frow['name'];
                                        $number = $frow['number'];
                                        $email = $frow['email'];
                                        $message = $frow['message'];
                                        $user_id = $frow['id'];

                                ?>
                                        <tr id="<?php echo $frow['id']; ?>">
                                            <td class="text-center"></td>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $number; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $message; ?></td>
                                            <form action="#" method="POST">

                                                <td class='text-center'>
                                                    <select class="form-select" name="status" aria-label="Default select example">

                                                        <option value="In-Progress" <?php if ($frow['status'] == 'In-Progress') {
                                                                                        echo 'selected';
                                                                                    } ?>>In-Progress</option>
                                                        <option value="Completed" <?php if ($frow['status'] == 'Completed') {
                                                                                        echo 'selected';
                                                                                    } ?>>Completed</option>
                                                        <option value="Rejected" <?php if ($frow['status'] == 'Rejected') {
                                                                                        echo 'selected';
                                                                                    } ?>>Rejected</option>
                                                    </select>
                                                </td>
                                                <td></td>
                                                <td class="text-center"> <input class="d-none" name="id" value="<?php echo $frow['id']; ?>" /><button class="btn" name="submit">Update</button></td>
                                            </form>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="text-center">
                                    <?php echo "No data found";
                                }
                                    ?>
                                    </div>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <?php

                            $pr_query = "SELECT * FROM contact_details";
                            $pr_result = mysqli_query($conn, $pr_query);
                            $total_record = mysqli_num_rows($pr_result);

                            $total_page = ceil($total_record / $num_per_page);

                            if ($page > 1) {
                                echo "<a href='support.php?page=" . ($page - 1) . "' class='btn mx-2'>Previous</a>";
                            }


                            for ($i = 1; $i < $total_page; $i++) {
                                echo "<a href='support.php?page=" . $i . "' class='btn mx-1'>$i</a>";
                            }

                            if ($i > $page) {
                                echo "<a href='support.php?page=" . ($page + 1) . "' class='btn mx-2'>Next</a>";
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <script>
        //    USER UNBLOCK

        $(".userunblock").click(function() {

            var id = $(this).parents("tr").attr("id");


            if (confirm('Are you sure, do you want to delete this account ?'))

            {

                $.ajax({

                    url: 'delete_user.php',

                    type: 'GET',

                    data: {
                        id: id
                    },

                    error: function() {

                        alert('Something is wrong');

                    },

                    success: function(data) {

                        $("#" + id).remove();

                        alert("Account removed successfully");

                    }

                });

            }

        });
    </script>

</body>

</html>