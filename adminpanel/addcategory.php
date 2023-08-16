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
        <div class="row justify-content-center">
            <div class="col-auto px-0">
                <?php
                $directoryURI = $_SERVER['REQUEST_URI'];
                $path = parse_url($directoryURI, PHP_URL_PATH);
                $components = explode('/adminpanel/', $path);
                $first_part = $components[1];
                include 'sides.php'; ?>
            </div>
            <div class="container-fluid px-5 py-5 mx-auto">
                <div class="row">
                    <p class="fs-4 card-text">Add Category</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="card shadow px-3 py-3 mt-4 marq"
                            style="border-radius:1rem; background-color: #111420">
                            <div>
                                <form method="POST" action="categoriesupload.php" enctype="multipart/form-data">

                                    <div class="my-2">

                                        <input class="form-control-md py-2" id="text" cols="30" rows="1"
                                            name="categories_name" placeholder="Category Name" required />
                                        <span class="px-3">
                                            <button class="btn" type="submit" name="upload">Add</button>
                                        </span>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-2 mt-5">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <div class="wrapper">
                                <table class="table css-serial text-white" style="background-color: #111420;">
                                    <thead class=" table-dark text-nowrap text-white">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class='text-center'>Categories Name</th>
                                            <th class='text-center'>Edit</th>
                                            <th class="text-center">Delete</th>
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

                                        $sql = mysqli_query($conn, "SELECT * FROM categories Limit $start_from,$num_per_page");
                                        while ($data = mysqli_fetch_array($sql)) {
                                            $name = $data['name'];
                                        ?>
                                        <tr id="<?php echo $data['id']; ?>" class="text-nowrap text-center">
                                            <td></td>
                                            <td><?php echo $data['name']; ?></td>
                                            <td class='text-center'>
                                                <form action="categoriesEdit.php" method='POST'>
                                                    <input class='d-none' type="text" value='<?php echo $data['id']; ?>'
                                                        name='postid'>
                                                    <button class='btn' type='submit' name='postedit'><i
                                                            class="bi bi-pen fs-6"></i></button>
                                                </form>
                                            </td>
                                            <td class='text-center'>
                                                <form action="categoriesdelete.php" method="POST">
                                                    <input class='d-none' type="text" value='<?php echo $data['id']; ?>'
                                                        name='userid'>
                                                    <button class='btn posters' type='submit' name='postdelete'><i
                                                            class="bi bi-trash fs-6"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="text-center" style="background-color: #2d2e37;">
                                    <?php

                                    $pr_query = "SELECT * FROM categories";
                                    $pr_result = mysqli_query($conn, $pr_query);
                                    $total_record = mysqli_num_rows($pr_result);

                                    $total_page = ceil($total_record / $num_per_page);

                                    if ($page > 1) {
                                        echo "<a href='addcategory.php?page=" . ($page - 1) . "' class='btn mx-2'>Previous</a>";
                                    }


                                    for ($i = 1; $i < $total_page; $i++) {
                                        echo "<a href='addcategory.php?page=" . $i . "' class='btn mx-1'>$i</a>";
                                    }

                                    if ($i > $page) {
                                        echo "<a href='addcategory.php?page=" . ($page + 1) . "' class='btn mx-2'>Next</a>";
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="upload_image.js"></script>
        </div>
    </div>
</body>