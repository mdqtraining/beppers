<?php include 'header.php'; ?>
<style>
    .body_color {
        background-color: #2d2e37 !important;
        color: #fc6703;
    }


    .search {

        justify-content: center;
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
                <div id="comments" class="tabcontent container-fluid">
                    <div class="text-left">
                        <h4 class="fw-bold py-2">
                            Comments
                        </h4>
                    </div>
                    <div class="row py-4">
                        <div class="row justify-content-center">
                            <div class="col-3">
                                <div class='d-flex justify-content-evenly py-3'>
                                    <div>
                                        <span>
                                            <form class="d-flex" action="#" method="POST">
                                                <input type="text" class="css1 me-2 text-white" name="search" placeholder="Search">
                                                <button class="css2" type="submit" name="free_param">search</button>

                                                <div class="px-5 d-flex justify-content-end">
                                                    <div class="input-group input-daterange mx-3">
                                                        <input type="date" class="css1" name="startdate" value="<?php if (isset($_POST['startdate'])) echo $_POST['startdate']; ?>" />
                                                    </div>
                                                    <div class="input-group input-daterange">
                                                        <input type="date" class="css1" name="enddate" value="<?php if (isset($_POST['enddate'])) echo $_POST['enddate']; ?>" />
                                                    </div>
                                                    <div>
                                                        <button class='btn mx-1' name='commentfilter'><i class="fa fa-filter fs-6"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="delete.php" method="POST">
                        <div class="tableFixHead bg">
                            <table class="table css-serial text-white" style="background-color: #111420;">
                                <thead class="table-dark text-nowrap theader">
                                    <tr>
                                        <th>S.no</th>
                                        <th>Post User Name</th>
                                        <th>Comments User Name</th>
                                        <th>Comments</th>
                                        <!-- <th>Date&Time</th> -->
                                        <th>Post Name</th>
                                        <th>Photos</th>
                                        <th class='text-center px-5'>Edit</th>
                                        <th class='text-center px-5'> <button class='btn posters' type='submit' name='commentdelete'><i class="bi bi-trash fs-6"></i></button></th>
                                    </tr>
                                </thead>


                                <tbody id="comment_search">

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
                                        $search = "SELECT c.id AS cmt_id,c.comments,c.created_at AS createdat,p.name as postname,p.gallery as pics,u.id,u.name as comments_name,v.name as postusername,u.type FROM comments c inner join users u on u.id = c.user_id inner join post p on p.id = c.post_id inner join users v on v.id = p.user_id where c.comments LIKE '%" . $srch . "%' OR v.name LIKE '%" . $srch . "%' OR p.name LIKE '%" . $srch . "%'  group by c.id";
                                        $ftcary = searchTable($search);
                                    } elseif (isset($_POST['commentfilter'])) {
                                        $from = $_POST['startdate'];
                                        $to = $_POST['enddate'];
                                        $search = "SELECT c.id AS cmt_id,c.comments,c.created_at AS createdat,p.name as postname,p.gallery as pics,u.id,u.name as comments_name,v.name as postusername,u.type FROM comments c inner join users u on u.id = c.user_id inner join post p on p.id = c.post_id inner join users v on v.id = p.user_id where c.created_at BETWEEN '" . $from . "' AND '" . $to . "' group by c.id";
                                        $ftcary = searchTable($search);
                                    } else {
                                        $search = "SELECT c.id AS cmt_id,c.comments,c.created_at AS createdat,p.name as postname,p.gallery as pics,u.id,u.name as comments_name,v.name as postusername,u.type FROM comments c inner join users u on u.id = c.user_id inner join post p on p.id = c.post_id inner join users v on v.id = p.user_id group by c.id Limit $start_from,$num_per_page";
                                        $ftcary = searchTable($search);
                                    }

                                    function searchTable($search)
                                    {

                                        include 'connect.php';
                                        $search_result = mysqli_query($conn, $search);
                                        return $search_result;
                                    }

                                    while ($cdata = mysqli_fetch_array($ftcary)) {

                                        $postusername = $cdata['postusername'];
                                        $commentsusername = $cdata['comments_name'];
                                        $comments = $cdata['comments'];
                                        $created_at = $cdata['createdat'];
                                        $postname = $cdata['postname'];
                                        $pics = $cdata['pics'];
                                        $ied = $cdata['cmt_id'];

                                        $resultImages = explode(",", $pics);
                                        foreach ($resultImages as $img)
                                            if ($pics != null) {
                                                $images = "<img
                                            src='https://beppers.in/apis/gallery/$img' height='100vh' width='100vh'
                                            alt='gallery' /> ";
                                            } else {
                                                $images = "<img src='https://beppers.in/apis/images/man.png' height='100' width='100' />";
                                            }

                                        echo " <tr>
                                    <td class='text-center align-middle'></td>
                                    <td class='align-middle'>$postusername</td>
                                    <td class='align-middle'>$commentsusername</td>
                                    <td class='align-middle'>$comments</td>
                                    <td class='align-middle'>$postname</td>
                                    <td class='align-middle'>$images</td>
                                    <td class='text-center align-middle'>
                                        <a href='commentEdit.php?cmntid=$ied' <button class='btn' type='submit'><i
                                                class='bi bi-pen fs-6'></i></button></a>
                                    </td>
                                    <td class='text-center align-middle'>
                                        <input type='checkbox' name='chkbox[]' value='$ied' />
                                    </td>
                                    </tr>
                                    ";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <?php
                                if (!(isset($_POST['free_param'])) && !(isset($_POST['commentfilter']))) {
                                    $pr_query = "SELECT c.id AS cmt_id,c.comments,c.created_at AS createdat,p.name as postname,p.gallery as pics,u.id,u.name as comments_name,v.name as postusername,u.type FROM comments c inner join users u on u.id = c.user_id inner join post p on p.id = c.post_id inner join users v on v.id = p.user_id group by c.id";
                                    $pr_result = mysqli_query($conn, $pr_query);
                                    $total_record = mysqli_num_rows($pr_result);

                                    $total_page = ceil($total_record / $num_per_page);

                                    if ($page > 1) {
                                        echo "<a href='comments.php?page=" . ($page - 1) . "' class='btn mx-2'>Previous</a>";
                                    }


                                    for ($i = 1; $i < $total_page; $i++) {
                                        echo "<a href='comments.php?page=" . $i . "' class='btn mx-1'>$i</a>";
                                    }

                                    if ($i > $page) {
                                        echo "<a href='comments.php?page=" . ($page + 1) . "' class='btn mx-2'>Next</a>";
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

    <!-- <script>
    $(".cmntremove").click(function() {

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
    </script> -->

</body>

</html>