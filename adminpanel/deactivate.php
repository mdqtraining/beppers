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
                    <div>
                        <h4 class="py-3">
                            Deactivate Request
                        </h4>
                    </div>
                    <div class="wrapper">

                        <div class="col py-3 table-responsive">
                            <div id="home" class="tabcontent container-fluid">
                                <div class="row text-end">

                                    <a href="reactivate.php" class="text-decoration-none text-white"> <button class='text-center btn block my-4' type='submit'>Activate Account</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table class="table css-serial text-white" style="background-color: #111420;">
                            <thead class=" table-dark text-nowrap">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">profile_pics</th>
                                    <th class="text-center">User Name</th>
                                    <th class="text-center">Accept</th>
                                    <th class="text-center">Reject</th>
                                </tr>
                            </thead>
                            <tbody id="user_search">
                                <?php
                                if (isset($_POST['free_param'])) {
                                    $srch = $_POST['search'];

                                    $search = "SELECT * FROM users WHERE deactivate='false'";
                                    //deactivate='false' is for data from apps as shown to us
                                    //deactivate='true' is for data to be hidden in app
                                    //deactivate='0' is for data to be reshow
                                    $ftcary = searchTable($search);
                                } else {
                                    $search = "SELECT * FROM users WHERE deactivate='false'";
                                    $ftcary = searchTable($search);
                                }

                                function searchTable($search)
                                {
                                    include 'connect.php';
                                    $search_result = mysqli_query($conn, $search);
                                    return $search_result;
                                }

                                while ($frow = mysqli_fetch_array($ftcary)) {
                                    $profile_photo = $frow['profile_photo'];
                                    $username = $frow['user_name'];
                                    $user_id = $frow['id'];

                                ?>
                                    <tr id="<?php echo $frow['id']; ?>">
                                        <td class="text-center"></td>
                                        <td class='text-center px-5'> <?php if ($profile_photo != null) { ?><img src="../apis/profile/<?php echo $profile_photo; ?>" height="100vh" width="100vh" alt="profile_photo" />
                                            <?php } else { ?>

                                            <?php } ?>
                                        </td>
                                        <td><?php echo $username; ?></td>

                                        <td class='text-center'>
                                            <form action="user_deactive.php" method="POST">
                                                <input class='d-none' type="text" value="<?php echo $frow['id'] ?>" name='id' />
                                                <button class='text-center btn block' name="deactivate" type='submit'>Accept</button>
                                            </form>
                                        </td>

                                        <td class='text-center'>
                                            <form action="deactive_reject.php" method="POST">
                                                <input class='d-none' type="text" value="<?php echo $frow['id'] ?>" name='id' />
                                                <button class='text-center btn block' name="activate" type='submit'>Reject</button>
                                            </form>
                                        </td>
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



    <!-- <script>
        //    USER UNBLOCK

        $(".deactivate").click(function() {

            var id = $(this).parents("tr").attr("id");


            if (confirm('Are you sure, do you want to deactivate this account ?'))

            {

                $.ajax({

                    url: 'user_deactive.php',

                    type: 'POST',

                    data: {
                        id: id
                    },

                    error: function() {

                        alert('Something is wrong');

                    },

                    success: function(data) {

                        $("#" + id).remove();

                        alert("Account deactivate successfully");

                    }

                });

            }

        });
    </script> -->

</body>

</html>