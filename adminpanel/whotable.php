<?php include "connect.php";
session_start();
$name = isset($_SESSION['email']);

if($name==null){

	echo '<script language="javascript">
	alert("Please Login!");
	window.location = "admin";
	</script>';

}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto px-0">
                <?php include 'sides.php'; ?>
            </div>

            <div class="col py-3 table-responsive">
                <!-- USERS POST -->
                <div id="post" class="tabcontent container-fluid">
                    <div class="text-center">
                        <h4 class="fw-bold py-2">
                            Who We Work Table
                        </h4>
                        <div class="d-flex justify-content-end">
                            <div class="mt-2">
                                <a href="who.php" class="nav-link align-middle px-0 ">
                                    <button class="btn" type="submit" name="switch">Switch to Upload</button>
                                </a>
                            </div>
                        </div>
                        <div class="row py-4">
                            <div class="row justify-content-start">
                                <div class="col-3">
                                    <div class='d-flex justify-content-evenly py-3'>
                                        <div>
                                            <span>
                                                <form class="d-flex" action="#" method="POST">
                                                    <input type="text" class="form-control me-2" name="search" placeholder="Search">
                                                    <button class="btn" type="submit" name="free_param">search</button>
                                                </form>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark text-nowrap">
                                <tr>
                                    <th class='text-center px-5'>Edit</th>
                                    <th class='text-center px-5'>Delete</th>
                                    <th>Image</th>
                                    <th>Heading</th>
                                    <!-- <th>Content</th> -->
                                    <!-- <th>tag</th>
                                    <th>gallery</th>
                                    <th>no_of_comments</th>
                                    <th>no_of_likes</th>
                                    <th>created_at</th> -->
                                </tr>
                            </thead>

                            <tbody id="post_search">
                                <?php

                                if (isset($_POST['free_param'])) {
                                    $srch = $_POST['search'];
                                    $search = "SELECT * FROM `who` where image LIKE '%" .$srch . "%' OR text LIKE '%" . $srch ."%'";
                                    $ftcary = searchTable($search);
                                } else {
                                    $search = "SELECT * FROM `who`";
                                    $ftcary = searchTable($search);
                                }

                                function searchTable($search)
                                {
                                    include 'connect.php';
                                    $search_result = mysqli_query($conn, $search);
                                    return $search_result;
                                }

                                while ($pdata = mysqli_fetch_array($ftcary)) {
                                    $image = $pdata['image'];
                                    $text = $pdata['text'];
                                    // $keyspara = $pdata['keyspara'];
                                    $id = $pdata['id'];
                                    // $tag = $pdata['tag'];
                                    // $gallery = $pdata['gallery'];
                                    // $no_of_comments = $pdata['no_of_comments'];
                                    // $no_of_likes = $pdata['no_of_likes'];
                                    // $created_at = $pdata['created_at'];
                                ?>
                                    <tr>
                                        <td class='text-center'>
                                            <form action="whoedit.php" method='POST'>
                                                <input class="d-none" type="text" value='<?php echo $id; ?>' name='whoid'>
                                                <button class='btn' type='submit' name='whoedit'><i class="bi bi-pen fs-6"></i></button>
                                            </form>
                                        </td>
                                        <td class='text-center'>
                                            <form action="whodelete.php" method="POST">
                                                <input class="d-none" type="text" value='<?php echo $id; ?>' name="who_id">
                                                <button class='btn posters' type='submit' name='whodelete'><i class="bi bi-trash fs-6"></i></button>
                                            </form>
                                        </td>
                                        <td class='text-center px-5'> <?php if ($image != null) { ?><img src="who/<?php echo $image; ?>" height="100vh" width="100vh" alt="gallery" />
                                            <?php } else { ?>

                                            <?php } ?>
                                        </td>
                                        <td><?php echo $text; ?></td>
                                        <!-- <td><?php echo $keyspara; ?></td> -->
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(".posters").click(function() {

            var id = $(this).parents("tr").attr("id");


            if (confirm('Are you sure to remove this record ?'))

            {

                $.ajax({

                    url: 'delete.php',

                    type: 'GET',

                    data: {
                        id: id
                    },

                    error: function() {

                        alert('Something is wrong');

                    },

                    success: function(data) {

                        $("#" + id).remove();

                        alert("Record removed successfully");

                    }

                });

            }

        });
    </script>
</body>

</html>