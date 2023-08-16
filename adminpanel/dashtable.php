<?php include 'header.php'; ?>
<style>
    body {
        background-color: #2d2e37 !important;
        display: flex;
        margin-top: 50px;
        justify-content: center;
        align-items: center;
    }

    .bg {
        border-radius: 5px;
        background: rgba(17, 20, 32, 0.3);
        box-shadow: 13px 13px 26px #07080d,
            -13px -13px 26px #1b2033;
    }

    .text-orange {
        color: #fc6703;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto px-0">
                <?php include 'sides.php'; ?>
            </div>
            <div class="col py-3 table-responsive">
                <div id="post" class="tabcontent">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 py-3">
                                <div class="row py-3">
                                    <a href="dash.php">
                                        <button type="button" class="btn-close btn-close-white" aria-label="Close">
                                        </button>
                                    </a>
                                    <div class="text-center">
                                        <h4 class="fw-bold text-orange">Post VS Categories</h4>
                                    </div>
                                </div>
                                <?php
                                if (isset($_GET['cat'])) {

                                    $cat = $_GET['cat'];


                                ?>
                                    <div class="py-3 gy-3">
                                        <div class="wrapper shadow-lg">
                                            <table class="table css-serial text-white bg" style="background: #111420;">
                                                <thead class="text-nowrap">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Category</th>
                                                        <th>Account Type</th>
                                                        <th>Count of Post</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="user_search">
                                                    <?php

                                                    $sql = mysqli_query($conn, "SELECT p.user_id, p.name as cat, u.type as acctype, count(u.type) as postcount, u.id from post p inner join users u on p.user_id = u.id where p.name like '" . $cat . "%' group by acctype");
                                                    while ($data = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <tr>
                                                            <td></td>
                                                            <td><?php echo $data['cat']; ?></td>
                                                            <td><?php echo $data['acctype']; ?></td>
                                                            <td><?php echo $data['postcount']; ?></td>

                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <div class="text-center">

                                            </div>
                                        </div>

                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>