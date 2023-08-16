<?php include 'header.php'; ?>
<style>
.body_color {
    background-color: #2d2e37 !important;
    color: #fc6703;
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

<body class="body_color">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto px-0">
                <?php include 'sides.php'; ?>
            </div>
            <div class="col py-3 table-responsive">

                <div id="post" class="tabcontent">
                    <?php

                    $postid = $_GET['postid'];
                    //echo $user_id;
                    $result = mysqli_query($conn, "SELECT * FROM post WHERE id = '$postid'");
                    while ($users = mysqli_fetch_array($result)) 
                    {
                    ?>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 py-3">
                                <div class="row py-3">
                                    <a href="post.php">
                                        <button type="button" class="btn-close btn-close-black" aria-label="Close">
                                        </button>
                                    </a>
                                    <div>
                                        <h4 class='fw-bold text-uppercase'>Post Details</h4>
                                    </div>
                                </div>
                                <form action='usersBackend.php' method='post' enctype="multipart/form-data">
                                    <div style='border-radius:1rem;background-color: #111420;'
                                        class="card px-3 py-3 text-white">
                                        <div class="row py-3 gy-3">
                                            <div class="col-lg-4">
                                                <div class="py-1">
                                                    <input type="text" class='d-none'
                                                        value='<?php echo $users['id']; ?>' name='id'>
                                                    <label for="name" class="form-label">Name :</label>
                                                    <input type="text" name='uName'
                                                        value='<?php echo $users['name']; ?>'
                                                        class="form-control input-bg text-white border-0" id="name"
                                                        placeholder="Enter the user name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="py-1">
                                                    <label for="description" class="form-label">Description :</label>
                                                    <textarea class="form-control input-bg text-white border-0"
                                                        name='description'
                                                        id="description"><?php echo $users['description']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="py-1">
                                                    <label for="tag" class="form-label">Tag :</label>
                                                    <input type="text" class="form-control input-bg text-white border-0"
                                                        name='tag' id="tag" value='<?php echo $users['tag']; ?>' />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="py-1">
                                                    <label for="gallery" class="form-label">Gallery :</label>
                                                    <div class="row">
                                                        <div id="postimageprev" class="px-2"></div>
                                                        <div id='postdata'>
                                                            <?php
                                                                $images = $users['gallery'];
                                                                $resultImages = explode(",", $images);
                                                                foreach ($resultImages as $img) {
                                                                    echo "<div class='col-md-4 col-lg-3'>";
                                                                    echo "<img  src='../apis/gallery/$img' class='img-fluid' alt='$img'>";
                                                                    echo "</div>";
                                                                }
                                                                ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="py-1">
                                                        <label for="image" class="form-label">File Upload</label>
                                                        <input id="postimage"
                                                            class="form-control input-bg text-white border-0"
                                                            type="file" name='photos[]' multiple>
                                                    </div>
                                                </div>
                                            </div>


                                            <script language="javascript" type="text/javascript">
                                            window.onload = function() {
                                                var fileUpload = document.getElementById("postimage");
                                                fileUpload.onchange = function() {
                                                    var postdata = document.getElementById('postdata');
                                                    postdata.style.visibility = 'hidden';
                                                    if (typeof(FileReader) != "undefined") {
                                                        var dvPreview = document.getElementById(
                                                            "postimageprev");
                                                        dvPreview.innerHTML = "";
                                                        var regex =
                                                            /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                                                        for (var i = 0; i < fileUpload.files.length; i++) {
                                                            var file = fileUpload.files[i];
                                                            if (regex.test(file.name.toLowerCase())) {
                                                                var reader = new FileReader();
                                                                reader.onload = function(e) {
                                                                    var img = document.createElement("IMG");
                                                                    img.height = "100";
                                                                    img.width = "100";
                                                                    img.src = e.target.result;
                                                                    dvPreview.appendChild(img);
                                                                }
                                                                reader.readAsDataURL(file);
                                                            } else {
                                                                alert(file.name +
                                                                    " is not a valid image file.");
                                                                dvPreview.innerHTML = "";
                                                                return false;
                                                            }
                                                        }
                                                    } else {
                                                        alert(
                                                            "This browser does not support HTML5 FileReader."
                                                            );
                                                    }
                                                }
                                            };

                                            $('#postimage').change(function() {
                                                $('#postdata').hide();
                                            });
                                            </script>

                                            <div class="col-lg-4">
                                                <div class="py-1">
                                                    <label for="no_of_comments" class="form-label">No of comments
                                                        :</label>
                                                    <input type="text" class="form-control input-bg text-white border-0"
                                                        name='no_of_comments' id="no_of_comments"
                                                        value='<?php echo $users['no_of_comments']; ?>' />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="py-1">
                                                    <label for="no_of_likes" class="form-label">No of likes :</label>
                                                    <input type="text" class="form-control input-bg text-white border-0"
                                                        name='no_of_likes' id="no_of_likes"
                                                        value='<?php echo $users['no_of_likes']; ?>' />
                                                </div>
                                            </div>
                                        </div>
                                        <div class='text-center py-3'>
                                            <button type="submit" name='editpost'
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