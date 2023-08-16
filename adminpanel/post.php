<?php include 'header.php'; ?>

<style>
    .body_color {
        background-color: #2d2e37 !important;
        color: #fc6703;
    }

    .css1 {
        height: 6vh;
        width: 30vh;
        color: #fff;
        border-color: #111420;
        border-radius: 7px;
        background: #111420;
        box-shadow: inset -7px -7px 14px #07080d,
            inset 7px 7px 14px #1b2033;
    }

    .css2 {
        height: 6vh;
        width: 10vh;
        color: #fff;
        border: none !important;
        border-radius: 7px;
        /* background: linear-gradient(145deg, #121522, #0f121d); */
        background: linear-gradient(to bottom left, #EC008C 0%, #F05A28 100%);
        box-shadow: 6px 6px 7px #131418,
            -4px -4px 5px #474856;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        color: transparent;
        background: black;
        z-index: 1;
    }

    .tableFixHead {
        overflow: auto;
        height: 80vh;
    }

    .tableFixHead thead th {
        position: sticky;
        top: 0;
        z-index: 1;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 8px 16px;
    }

    .bg {
        border-radius: 5px;
        background: rgba(17, 20, 32, 0.3);
        box-shadow: 13px 13px 26px #07080d,
            -13px -13px 26px #1b2033;
    }
</style>

<body class="body_color">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto px-0">
                <?php
                $directoryURI = $_SERVER['REQUEST_URI'];
                $path = parse_url($directoryURI, PHP_URL_PATH);
                $components = explode('/adminpanel/', $path);
                $first_part = $components[1];
                include 'sides.php'; ?>
            </div>

            <div class="col py-3 table-responsive">
                <!-- USERS POST -->
                <div id="post" class="tabcontent container-fluid">
                    <div class="text-left">
                        <h4 class="fw-bold py-2">
                            Edit Posts
                        </h4>
                        <div class="d-flex justify-content-end">
                            <div class="mt-2">
                                <a href="video_post.php" class="nav-link align-middle px-0 ">
                                    <button class="btn" type="submit" name="switch">Switch to Video</button>
                                </a>
                            </div>
                        </div>
                        <div class="row py-4">
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <div class='d-flex justify-content-evenly py-3'>
                                        <div>
                                            <span>
                                                <form class="d-flex" action="#" method="POST">
                                                    <input type="text" class="css1 mx-2 text-white" name="search" placeholder="Search">
                                                    <button class="css2" type="submit" name="free_param">search</button>

                                                    <div class="px-5 d-flex justify-content-end">
                                                        <div class="input-group input-daterange mx-3">
                                                            <input type="date" class="css1" name="startdate" value="<?php if (isset($_POST['startdate'])) echo $_POST['startdate']; ?>" />
                                                        </div>
                                                        <div class="input-group input-daterange">
                                                            <input type="date" class="css1" name="enddate" value="<?php if (isset($_POST['enddate'])) echo $_POST['enddate']; ?>" />
                                                        </div>
                                                        <div>
                                                            <button class='btn mx-2' name='postfilter'><i class="fa fa-filter fs-6"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="delete_post.php" method="POST">
                        <div class="tableFixHead bg">
                            <table class="table css-serial text-white" style="background-color: #111420;">
                                <thead class="table-dark text-nowrap theader">
                                    <tr>
                                        <th>S.No</th>
                                        <th>User Name</th>
                                        <th>Description</th>
                                        <th>Name</th>
                                        <th>Tag</th>
                                        <th class='text-center'>Gallery</th>
                                        <th>No Of Comments</th>
                                        <th>No Of Likes</th>
                                        <th>Created</th>
                                        <th class='text-center px-5'>Edit</th>
                                        <th class='text-center px-5'> <button class='btn posters' type='submit' name='postdelete'><i class="bi bi-trash fs-6"></i></button></th>
                                    </tr>
                                </thead>

                                <tbody id="post_search">
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
                                        $img = ".jpeg";
                                        $img1 = ".jpg";
                                        $img2 = ".png";
                                        $search = "SELECT p.*,u.user_name,u.id as userid FROM post p inner join users u on p.user_id=u.id where u.user_name LIKE '%" . $srch . "%' OR p.name LIKE '%" . $srch . "%' OR p.description LIKE '%" . $srch . "%'  OR p.tag LIKE '%" . $srch . "%' AND gallery Like '%" . $img . "' or gallery like  '%" . $img1 . "' or gallery like  '%" . $img2 . "' group by p.id";
                                        $ftcary = searchTable($search);
                                    } elseif (isset($_POST['postfilter'])) {
                                        $from = $_POST['startdate'];
                                        $to = $_POST['enddate'];
                                        $img = ".jpeg";
                                        $img1 = ".jpg";
                                        $img2 = ".png";
                                        $search = "SELECT p.*,u.user_name,u.id as userid FROM post p inner join users u on p.user_id=u.id where p.created_at BETWEEN '" . $from . "' AND '" . $to . "' AND gallery Like '%" . $img . "' or gallery like  '%" . $img1 . "' or gallery like  '%" . $img2 . "' group by p.id";
                                        $ftcary = searchTable($search);
                                    } else {
                                        $img = ".jpeg";
                                        $img1 = ".jpg";
                                        $img2 = ".png";
                                        $search = "SELECT p.*,p.id as postid,u.user_name,u.id as userid FROM post p inner join users u on p.user_id=u.id WHERE gallery Like '%" . $img . "' or gallery like  '%" . $img1 . "' or gallery like  '%" . $img2 . "' group by p.id limit $start_from,$num_per_page";
                                        $ftcary = searchTable($search);
                                    }

                                    function searchTable($search)
                                    {
                                        include 'connect.php';
                                        $search_result = mysqli_query($conn, $search);
                                        return $search_result;
                                    }

                                    while ($pdata = mysqli_fetch_array($ftcary)) {
                                        $user_name = $pdata['user_name'];
                                        $name = $pdata['name'];
                                        $description = $pdata['description'];
                                        $tag = $pdata['tag'];
                                        $gallery = $pdata['gallery'];
                                        $no_of_comments = $pdata['no_of_comments'];
                                        $no_of_likes = $pdata['no_of_likes'];
                                        $created_at = $pdata['created_at'];
                                        $userid = $pdata['userid'];
                                        $id = $pdata['postid'];

                                        $resultImages = explode(",", $gallery);
                                        foreach ($resultImages as $images)



                                            echo " <tr>
                                    <td class='text-center align-middle'></td>
                                    <td class='align-middle'>$user_name</td>
                                    <td class='align-middle'>$description</td>
                                    <td class='align-middle'>$name</td>
                                    <td class='align-middle'>$tag</td>
                                    <td class='align-middle'><img
                                    src='https://beppers.in/apis/gallery/$images' height='100vh' width='100vh' alt='gallery' /></td>
                                    <td class='align-middle'>$no_of_comments</td>
                                    <td class='align-middle'>$no_of_likes</td>
                                    <td class='align-middle'>$created_at</td>
                                    <td class='text-center align-middle'>
                                    <a href='postEdit.php?postid=$id' <button class='btn' type='submit'><i class='bi bi-pen fs-6'></i></button></a>
                                    </td>
                                    <td class='text-center align-middle'>
                                    <input type='checkbox' name='chkbox[]' value='$id' />
                                  </td>  
                                  </tr>
                                ";
                                    }
                                    ?>


                                </tbody>
                            </table>
                            <div class="text-center">
                                <?php

                                if (!(isset($_POST['free_param'])) && !(isset($_POST['postfilter']))) {

                                    $img = ".jpeg";
                                    $pr_query = "SELECT p.*,u.user_name,u.id as userid FROM post p inner join users u on p.user_id=u.id AND gallery Like '%" . $img . "'";
                                    $pr_result = mysqli_query($conn, $pr_query);
                                    $total_record = mysqli_num_rows($pr_result);

                                    $total_page = ceil($total_record / $num_per_page);

                                    if ($page > 1) {
                                        echo "<a href='post.php?page=" . ($page - 1) . "' class='btn mx-2'>Previous</a>";
                                    }


                                    for ($i = 1; $i < $total_page; $i++) {
                                        echo "<a href='post.php?page=" . $i . "' class='btn mx-1'>$i</a>";
                                    }

                                    if ($i > $page) {
                                        echo "<a href='post.php?page=" . ($page + 1) . "' class='btn mx-2'>Next</a>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- <script>
        $(".posters").click(function() {

            var id = $(this).parents("tr").attr("id");


            if (confirm('Are you sure to remove this post ?'))

            {

                $.ajax({

                    url: 'delete_post.php',

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
    </script> -->
</body>

</html>