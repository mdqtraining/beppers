<?php include 'header.php'; ?>
<style>
body {
    background-color: #2d2e37 !important;
    display: flex;
    margin-top: 50px;
    justify-content: center;
    align-items: center;
}

.cardshade {
    border-radius: 10px;
    background: #111420;
    box-shadow: -11px 11px 27px #07080d,
        11px -11px 27px #1b2033;

}

.input-bg {
    background-color: #2d2e37 !important;
}
</style>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto">
                <?php include 'sides.php'; ?>
            </div>
            <div class="col py-3 d-flex justify-content-center align-items-center">
                <div id="comments" class="tabcontent">
                    <?php
                    // if (isset($_POST['cmntedit'])) {
                        $cmntid = $_GET['cmntid'];
                        $result = mysqli_query($conn, "SELECT * FROM comments WHERE id = '$cmntid'");
                        while ($users = mysqli_fetch_array($result)) {
                    ?>

                    <div class="container">
                        <div class="row">
                            <div class="col-12 py-3">
                                <div class="row py-3">
                                    <a href="comments.php">
                                        <button type="button" class="btn-close btn-close-black" aria-label="Close">
                                        </button>
                                    </a>
                                    <div>
                                        <h4 class='fw-bold text-orange'>Edit Comments</h4>
                                    </div>
                                </div>
                                <form action='usersBackend.php' method='post' enctype="multipart/form-data">
                                    <div style='border-radius:1rem' class="cardshade px-3 py-3 text-white">
                                        <div class="row py-3 gy-3 d-flex justify-contents-center">
                                            <div class="col-lg-12">
                                                <div class="py-1">
                                                    <input type="text" class='d-none'
                                                        value='<?php echo $users['id']; ?>' name='id'>
                                                    <label for="comments" class="form-label">Comments :</label>
                                                    <textarea class="form-control input-bg text-white border-0"
                                                        name='comments'
                                                        id="comments"><?php echo $users['comments']; ?></textarea>
                                                </div>
                                            </div>
                                            <!-- <div class="col-lg-4">
                                                        <div class="py-1">
                                                            <label class="form-label">User Id :</label>
                                                            <input type="text" class="form-control" value='<?php echo $users['user_id']; ?>' />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="py-1">
                                                            <label class="form-label">Post Id :</label>
                                                            <input type="text" class="form-control" value='<?php echo $users['post_id']; ?>' />
                                                        </div>
                                                    </div> -->

                                            <div class="row pt-4">
                                                <label class="form-label">Active :</label>
                                            </div>
                                            <div>
                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" <?php if ($users['active'] === '1') {
                                                                     echo 'checked';
                                                               }  ?> type="radio" name="active" id="active" value="1">
                                                    <label class="form-check-label" for="active">1</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" <?php if ($users['active'] === '0') {
                                                           echo 'checked';
                                                             } ?> type="radio" name="active" id="active" value="0">
                                                    <label class="form-check-label" for="active">0</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class='text-center py-3'>
                                            <button type="submit" name='editcomments'
                                                class='btn btn-success w-25'>Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <?php
                        }
                    
                        ?>
</body>

</html>