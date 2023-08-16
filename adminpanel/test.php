<div class="col-xl-4 col-lg-6 py-5 col-md-6">
                <div class="cds align-middle">
                    <div class="cds1">
                        <?php
                        $count =  "SELECT COUNT(type) AS total FROM users";
                        $result = mysqli_query($conn, $count);
                        $row = mysqli_fetch_array($result);
                        $type = $row['total'];
                        ?>

                        <p class="fs-5 text-white d-flex justify-content-center align-items-center pt-3">User Accounts</p>
                        <div>
                            <p class="fs-3 fw-bold text-white d-flex justify-content-center align-items-center"><?php echo $type ?></p>
                        </div>
                        <div class="progress mt-1" data-height="8" style="height: 8px;">
                            <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 py-5 col-md-6">
                <div class="cds align-middle">
                    <div class="cds2">
                        <?php
                        $count =  "SELECT COUNT(type) AS total FROM users";
                        $result = mysqli_query($conn, $count);
                        $row = mysqli_fetch_array($result);
                        $type = $row['total'];
                        ?>
                        <p class="fs-5 text-white d-flex justify-content-center align-items-center pt-3">Business Accounts</p>
                        <div>
                            <p class="fs-3 fw-bold text-white d-flex justify-content-center align-items-center"><?php echo $type ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 py-5 col-md-6">
                <div class="cds align-middle">
                    <div class="cds3">
                        <?php
                        $count =  "SELECT COUNT(type) AS total FROM users";
                        $result = mysqli_query($conn, $count);
                        $row = mysqli_fetch_array($result);
                        $type = $row['total'];
                        ?>
                        <p class="fs-5 text-white d-flex justify-content-center align-items-center pt-3">Freelancer Accounts</p>
                        <div>
                            <p class="fs-3 fw-bold text-white d-flex justify-content-center align-items-center"><?php echo $type ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 py-5 col-md-6">
                <div class="cds align-middle">
                    <div class="cds">
                        <?php
                        $count =  "SELECT COUNT(type) AS total FROM users";
                        $result = mysqli_query($conn, $count);
                        $row = mysqli_fetch_array($result);
                        $type = $row['total'];
                        ?>
                        <p class="fs-5 text-white d-flex justify-content-center align-items-center pt-3">Total Accounts</p>
                        <div>
                            <p class="fs-3 fw-bold text-white d-flex justify-content-center align-items-center"><?php echo $type ?></p>
                        </div>
                    </div>
                </div>
            </div>