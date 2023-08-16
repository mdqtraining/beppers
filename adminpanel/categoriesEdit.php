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
        <div class="row flex-nowrap">
            <div class="col-auto px-0">
                <?php include 'sides.php'; ?>
            </div>
            <div class="col py-3 table-responsive">
                <div id="post" class="tabcontent">
                    <?php
                    if (isset($_POST['postedit'])) {
                        $postid = $_POST['postid'];
                        //echo $user_id;
                        $result = mysqli_query($conn, "SELECT * FROM categories WHERE id = '$postid'");
                        while ($cat = mysqli_fetch_array($result)) {
                    ?>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 py-3">
                                        <div class="row py-3">
                                            <a href="addcategory.php">
                                                <button type="button" class="btn-close btn-close-black" aria-label="Close">
                                                </button>
                                            </a>
                                            <div>
                                                <h4 class='fw-bold text-uppercase'>Edit Category</h4>
                                            </div>
                                        </div>
                                        <form action='categoriesBackend.php' method='post' enctype="multipart/form-data">
                                        <div class="d-flex align-items-center justify-content-center">
                        <div class="card shadow px-3 py-3 mt-4 marq" style="border-radius:1rem; background-color: #111420">
                            <div>
                                <form method="POST" action="categoriesupload.php" enctype="multipart/form-data">
                            <div class="my-2">
                            <label class="text-white px-2">Category</label>
                            </div>
                                    <div class="my-2">
                                    <input type="text" class='d-none' value='<?php echo $cat['id']; ?>' name='id'>
                                    <input type="text" name='categories_name' value='<?php echo $cat['name']; ?>' class="form-control-md py-2" id="name" placeholder="Enter the user name">
                                        <span class="px-3">
                                        <button type="submit" name='editpost' class='btn text-nowrap'>Update</button>
                                        </span>
                                        <input class="form-control d-none" type="text" name="post_id" value="<?php echo $postid; ?>" />
                                    </div>
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                                            <!-- <div style='border-radius:1rem' class="card shadow px-3 py-3">
                                                <div class="row py-3 gy-3">
                                                    <div class="col-lg-6">
                                                        <div class="py-1">
                                                            <input type="text" class='d-none' value='<?php echo $users['id']; ?>' name='id'>
                                                            <label for="name" class="form-label text-dark">Category :</label>
                                                            <input type="text" name='categories_name' value='<?php echo $users['name']; ?>' class="form-control" id="name" placeholder="Enter the user name">
                                                            <span>
                                                            <button type="submit" name='editpost' class='btn text-nowrap w-25'>Update</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='text-center py-3'>
                                                    <input class="form-control d-none" type="text" name="post_id" value="<?php echo $postid; ?>" />
                                                  
                                                </div>
                                            </div> -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <script src="upload_image.js"></script>
</body>

</html>