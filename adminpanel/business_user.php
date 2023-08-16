<?php include 'header.php'; ?>
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

    /* .table-wrapper {
        max-height: 300px;
        overflow-y: scroll;
        display: inline-block;
    } */
    .tableFixHead          { overflow: auto; height: 80vh; }
.tableFixHead thead th { position: sticky; top: 0; z-index: 1; }
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px; }

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
                <?php include 'sides.php'; ?>
            </div>
            <div class="col py-3">
                <!-- USERS    -->
                <div id="users" class="tabcontent">
                    <?php include 'user_dashboard.php'; ?>

                    <!-- USERS EDIT -->

                    <div id="user" class="usertab py-5">
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
                            $search = "SELECT id, firebase_userid, block, deactivate, user_name, travel, description, name, mobile, email, password, dob, gender, address, type, categories, others, service, certificate_proof, no_of_posts, no_of_following, no_of_followers, profile_photo, privacy, like_comment, message, follow_request, follow_accept, user_post, DATE_FORMAT(created_at, '%Y-%m-%d') AS created, updated_at FROM users WHERE type='business' and block='false' AND service LIKE '%" . $srch . "%' OR user_name LIKE '%" . $srch . "%' OR gender LIKE '%" . $srch . "%' OR mobile LIKE '%" . $srch . "%' OR address LIKE '%" . $srch . "%'";
                            $ftcary = searchTable($search);
                        } elseif (isset($_POST['userfilter'])) {
                            $from = $_POST['startdate'];
                            $to = $_POST['enddate'];

                            $search = "SELECT id, firebase_userid, block, deactivate, user_name, travel, description, name, mobile, email, password, dob, gender, address, type, categories, others, service, certificate_proof, no_of_posts, no_of_following, no_of_followers, profile_photo, privacy, like_comment, message, follow_request, follow_accept, user_post, DATE_FORMAT(created_at, '%d-%m-%Y') AS created, updated_at FROM users WHERE created_at BETWEEN '" . $from . "' AND '" . $to . "' AND type='business' and block='false'";
                            $ftcary = searchTable($search);
                        } else {
                            $search = "SELECT id, firebase_userid, block, deactivate, user_name, travel, description, name, mobile, email, password, dob, gender, address, type, categories, others, service, certificate_proof, no_of_posts, no_of_following, no_of_followers, profile_photo, privacy, like_comment, message, follow_request, follow_accept, user_post, DATE_FORMAT(created_at, '%d-%m-%Y') AS created, updated_at FROM users WHERE type='business' and block='false' limit $start_from,$num_per_page";
                            $ftcary = searchTable($search);
                        }

                        function searchTable($search)
                        {
                            include 'connect.php';
                            $search_result = mysqli_query($conn, $search);
                            return $search_result;
                        }

                        ?>
                        <div class="text-left">
                            <h4 class="fw-bold py-2">
                                Users Account
                            </h4>
                        </div>
                        <div class="py-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
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
                                                            <button class='btn mx-2' name='userfilter'><i class="fa fa-filter fs-6"></i></button>
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
                    <form action="admin_block.php" method='POST'>
                
                  <div class="tableFixHead bg">
                 
                    <table class="table css-serial text-white" style="background: #111420;">
                       
                        <thead class="table-dark text-nowrap theader">
                            <tr>
                                <th>S.no</th>
                                <th class="text-center">Profile</th>
                                <th>User Name</th>
                                <th>Description</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>E-mail</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Created</th>
                                <th class='text-center px-5'>Edit</th>
                                <th class='text-center px-5'>  <button class='text-center btn block' name='adminblock' type='submit'>Block</button></th>

                            </tr>
                        </thead>


                        <tbody id="user_search">


                          
                                <?php
                                while ($frow = mysqli_fetch_array($ftcary)) {
                                    $username = $frow['user_name'];
                                    $description = $frow['description'];
                                    $name = $frow['name'];
                                    $mobile = $frow['mobile'];
                                    $email = $frow['email'];
                                    $dob = $frow['dob'];
                                    $gender = $frow['gender'];
                                    $profile_photo = $frow['profile_photo'];
                                    $address = $frow['address'];
                                    $created = $frow['created'];
                                    $id = $frow['id'];

                                    echo " <tr>
                                    <td class='text-center align-middle'></td>
                                    <td class='text-center px-5'><img src='../apis/profile/$profile_photo' height='100vh' width='100vh' alt='profile_photo' />
                                    </td>
                                    <td class='align-middle'>$username</td>
                                    <td class='align-middle'>$description</td>
                                    <td class='align-middle'>$name</td>
                                    <td class='align-middle'>$mobile</td>
                                    <td class='align-middle'>$email</td>
                                    <td class='align-middle'>$dob</td>
                                    <td class='align-middle'>$gender</td>
                                    <td class='align-middle'>$address</td>
                                    <td class='align-middle'>$created</td>
                                     <td class='text-center align-middle'>
                                    <a href='usersEdit.php?userid=$id' <button class='btn' type='submit'><i class='bi bi-pen fs-6'></i></button></a>
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
                    <div class="text-center pt-2 pb-4">
                        <?php
                        if (!(isset($_POST['free_param']))) {

                            $pr_query = "SELECT id, firebase_userid, block, deactivate, user_name, travel, description, name, mobile, email, password, dob, gender, address, type, categories, others, service, certificate_proof, no_of_posts, no_of_following, no_of_followers, profile_photo, privacy, like_comment, message, follow_request, follow_accept, user_post, DATE_FORMAT(created_at, '%d-%m-%Y') AS created, updated_at FROM users WHERE type='business' and block='false' limit $start_from,$num_per_page";
                            $pr_result = mysqli_query($conn, $pr_query);
                            $total_record = mysqli_num_rows($pr_result);

                            $total_page = ceil($total_record / $num_per_page);

                            if ($page > 1) {
                                echo "<a href='users.php?page=" . ($page - 1) . "' class='btn mx-2'>Previous</a>";
                            }


                            for ($i = 1; $i < $total_page; $i++) {
                                echo "<a href='users.php?page=" . $i . "' class='btn mx-1'>$i</a>";
                            }

                            if ($i > $page) {
                                echo "<a href='users.php?page=" . ($page + 1) . "' class='btn mx-2'>Next</a>";
                            }
                        }

                        ?>
                    </div>
                </div>
                <!-- <div class="text-end pt-2">
                                    <button class='text-center btn block' name='adminblock' type='submit'>Block</button>
                                </div>
              -->
                  
               
                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- <script>
        $(".userremove").click(function() {

            var id = $(this).parents("tr").attr("id");


            if (confirm('Are you sure, do you want to block this account ?'))

            {

                $.ajax({

                    url: 'admin_block.php',

                    type: 'GET',

                    data: {
                        id: id
                    },

                    error: function() {

                        alert('Something is wrong');

                    },

                    success: function(data) {

                        $("#" + id).remove();

                        alert("User has been blocked");

                    }

                });

            }

        });
    </script> -->
    <!-- USER SEARCH -->
    <!-- <script>
        $(document).on('keyup', "#user_param", function() {
            var user_param = $("#user_param").val();
            $.ajax({
                url: 'user_search.php',
                type: 'POST',
                data: {
                    user_param: user_param
                },
                success: function(data) {
                    $("#user_search").html(data);
                }
            });
        });
    </script> -->
</body>


</html>