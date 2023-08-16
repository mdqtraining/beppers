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
    .input-bg{
         background-color: #2d2e37 !important ;    
    }
    .text-orange{
        color: #fc6703;
    }

</style>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto px-0">
                <?php include 'sides.php'; ?>
            </div>
            <div class="col py-3">
                <!-- USERS    -->
                <div id="users" class="tabcontent">

                    <?php
                    $users_id = $_GET['userid'];
                    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$users_id'");
                    while ($users = mysqli_fetch_array($result)) {
                    ?>

                        <div class="container d-flex justify-content-center align-items-center text-white">
                            <div class="row">
                                <div class="col-12 py-3">
                                    <div class="row py-3">
                                        <a href="users.php">
                                            <button type="button" class="btn-close btn-close-black" aria-label="Close">
                                            </button>
                                        </a>
                                        <div>
                                            <h4 class='fw-bold text-orange'>Edit Account</h4>
                                        </div>
                                    </div>
                                    <form action='usersBackend.php' method='post' enctype="multipart/form-data">
                                        <div style='border-radius:1rem' class="cardshade px-3 py-3">
                                            <div class="row py-3 gy-3">
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <input type="text" class='d-none' value='<?php echo $users['id']; ?>' name='id'>
                                                        <label for="name" class="form-label">User name :</label>
                                                        <input type="text" class="form-control input-bg text-white border-0" name='uName' value='<?php echo $users['user_name']; ?>' id="name" placeholder="Enter the user name" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="description" class="form-label">Description :</label>
                                                        <textarea class="form-control input-bg text-white border-0" name='description' id="description"><?php echo $users['description']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="name" class="form-label">Name :</label>
                                                        <input type="text" class="form-control input-bg text-white border-0" name='name' id="name" value='<?php echo $users['name']; ?>' />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="mobile" class="form-label">Mobile Number :</label>
                                                        <input type="text" class="form-control input-bg text-white border-0" name='mobile' id="mobile" value='<?php echo $users['mobile']; ?>' />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="email" class="form-label">Email :</label>
                                                        <input type="email" class="form-control input-bg text-white border-0" name='email' id="email" value='<?php echo $users['email']; ?>' />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="password" class="form-label">Password :</label>
                                                        <input type="text" class="form-control input-bg text-white border-0" name='password' id="password" value='<?php echo $users['password']; ?>' />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="dob" class="form-label">Date of birth :</label>
                                                        <?php echo $users['dob']; ?>
                                                        <input type="date" class="form-control input-bg text-white border-0" name='dob' id="dob" value="<?php echo $users['dob']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="gender" class="form-label">Gender :</label>
                                                        <select class="form-select input-bg text-white border-0" name='gender' aria-label="Default select example">
                                                            <option selected value='<?php echo $users['gender']; ?>'><?php echo $users['gender']; ?></option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="others">Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="address" class="form-label">Address :</label>
                                                        <textarea class="form-control input-bg text-white border-0" name='address' id="address"><?php echo $users['address']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="type" class="form-label">Type :</label>
                                                        <select class="form-select input-bg text-white border-0" name='type' aria-label="Default select example">
                                                            <option selected value='<?php echo $users['type']; ?>'><?php echo $users['type']; ?></option>
                                                            <option value="user">user</option>
                                                            <option value="business">business</option>
                                                            <option value="freelance">freelance</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="categories" class="form-label">Categories :</label>
                                                        <textarea class="form-control input-bg text-white border-0" name='categories' id="categories"><?php echo $users['categories']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="service" class="form-label">Services :</label>
                                                        <input type="text" class="form-control input-bg text-white border-0" name='service' id="service" value='<?php echo $users['service']; ?>' />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                       <div class="py-1">
                                                                <label for="certificateproof" class="form-label">Certificate proof :</label>
                                                                <input type="file" class="form-control input-bg text-white border-0" name='certificateproof' id="certificateproof" />
                                                            </div>
                                                       
                                                  
                                                    <script>
                                                        $(document).ready(function() {
                                                            // Prepare the preview for profile picture
                                                            $("#certificateproof").change(function() {
                                                                readURL(this);
                                                            });
                                                        });

                                                        function readURL(input) {
                                                            if (input.files && input.files[0]) {
                                                                var reader = new FileReader();

                                                                reader.onload = function(e) {
                                                                    $('#certificateproofPrev').attr('src', e.target.result).fadeIn('slow');
                                                                }
                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }
                                                    </script>
                                                </div>
                                                <div class="col-lg-4">
                                             
                                                <div class="py-1">
                                                                <img id="certificateproofPrev" src="https://mdqualityapps.in/certificate_proof/<?php echo $users['certificate_proof']; ?>" class='h-50 w-50' alt="<?php echo $users['certificate_proof']; ?>">
                                                            </div>
                                                 

                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="no_of_post" class="form-label">Number of post :</label>
                                                        <input type="text" class="form-control input-bg text-white border-0" name='no_of_post' id="no_of_post" value='<?php echo $users['no_of_posts']; ?>' />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="no_of_followings" class="form-label">Number of following :</label>
                                                        <input type="text" class="form-control input-bg text-white border-0" name='no_of_followings' id="no_of_followings" value='<?php echo $users['no_of_following']; ?>' />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="no_of_followers" class="form-label">Number of followers :</label>
                                                        <input type="text" class="form-control input-bg text-white border-0" name='no_of_followers' id="no_of_followers" value='<?php echo $users['no_of_followers']; ?>' />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="privacy" class="form-label">Privacy :</label>
                                                        <input type="text" class="form-control input-bg text-white border-0" name='privacy' id="privacy" value='<?php echo $users['privacy']; ?>' />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                            <div class="py-1">
                                                                <label for="profilephoto" class="form-label">Profile photo :</label>
                                                                <input type="file" class="form-control input-bg text-white border-0" name='profilephoto' id="profilephoto" />
                                                            </div>
                                                    <script>
                                                        $(document).ready(function() {
                                                            // Prepare the preview for profile picture
                                                            $("#profilephoto").change(function() {
                                                                readURL(this);
                                                            });
                                                        });

                                                        function readURL(input) {
                                                            if (input.files && input.files[0]) {
                                                                var reader = new FileReader();

                                                                reader.onload = function(e) {
                                                                    $('#profilephotoPrev').attr('src', e.target.result).fadeIn('slow');
                                                                }
                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }
                                                    </script>
                                                </div>
                                                <div class="col-lg-4">
                                                <div class="py-1">
                                                                <img id='profilephotoPrev' src="../apis/profile/<?php echo $users['profile_photo']; ?>" class='h-50 w-50' alt="<?php echo $users['profile_photo']; ?>">
                                                            </div>
                                                </div>
                                            
                                                <!-- <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="created_at" class="form-label">Created at :</label>
                                                        <input type="text" class="form-control" name='created_at' id="created_at" value='<?php echo $users['created_at']; ?>' />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="py-1">
                                                        <label for="updated_at" class="form-label">Updated at :</label>
                                                        <input type="text" class="form-control" name='updated_at' id="updated_at" value='<?php echo $users['updated_at']; ?>' />
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class='text-center py-3'>
                                                <button type="submit" name='edituser' class='btn btn-success w-25'>Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>



                        <?php

                    }
                        ?>
                        </div>
                </div>
            </div>
        </div>
</body>



</html>