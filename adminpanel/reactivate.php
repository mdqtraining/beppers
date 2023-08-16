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
                <?php include 'sides.php'; ?>
            </div>
            <div class="col py-3 table-responsive">
                <div id="post" class="tabcontent container-fluid">
                <div>
                    <h4 class="py-3">
                        Activate Account
                    </h4>
                    </div>
                    <div class="wrapper">
                        <div class="col py-3 table-responsive">
                            <div id="home" class="tabcontent container-fluid">
                            <div class="row text-end">
                           
                           <a href="deactivate.php" class="text-decoration-none text-white"> 
                             <button class='text-center btn block my-4' type='submit'>Deactivate Request</button>
                           </a>    
                       </div>
                            </div>

                        </div>
                        <table class="table table-striped table-dark css-serial text-white">
                            <thead class="table-dark text-nowrap">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">profile_pics</th>
                                    <th class="text-center">User Name</th>
                                    <th class="text-center">Activate</th>
                                </tr>
                            </thead>
                            <tbody id="user_search">
                                <?php
                                if (isset($_POST['free_param'])) {
                                    $srch = $_POST['search'];

                                    $search = "SELECT * FROM users WHERE deactivate='true'";
                                    //deactivate='false' is for data from apps as shown to us
                                    //deactivate='true' is for data to be hidden in app
                                    //deactivate='0' is for data to be reshow
                                    $ftcary = searchTable($search);
                                } else {
                                    $search = "SELECT * FROM users WHERE deactivate='true'";
                                    $ftcary = searchTable($search);
                                }

                                function searchTable($search)
                                {
                                    include 'connect.php';                           $search_result = mysqli_query($conn, $search);
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
                                            <form action="user_reactivate.php" method="POST">
                                                <input class='d-none' type="text" value="<?php echo $frow['id'] ?>" name='id' />
                                                <button class='text-center btn block' name="activate" type='submit'>Activate</button>
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
    </script> -->

</body>

</html>