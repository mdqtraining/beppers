<?php include 'header.php'; ?>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-auto col-md-3 col-xl-2 px-0">
                <?php include 'sidebar.php'; ?>
            </div>
            <div class="col py-3 px-3">
                <div id="post" class="container">
                    <div class="row" style="margin-top: 20%;">
                        <div class="col-xl-6 col-lg-6">
                            <div class="card p-3" style="background-color: #F5F7FA;">

                            <?php 
                            $sql = mysqli_query($conn, "SELECT COUNT(*) as Count FROM chat WHERE t_type = 'user' AND f_type = 'freelance'");
                            $data = mysqli_fetch_assoc($sql)
                            ?>
                                <div class="align-self-start">
                                    <h3 class="mr-2">User-Freelancer</h3>
                                </div>
                                <div class="media-body">
                                    <h4>count: <?php echo $data['Count']; ?></h4>
                                    <span>Messages</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-wallet success font-large-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="card p-3" style="background-color: #F5F7FA;">
                           
                            <?php
                                $sql = mysqli_query($conn, "SELECT COUNT(*) AS Count FROM chat WHERE t_type = 'user' AND f_type = 'business'");
                                $data = mysqli_fetch_assoc($sql)
                                ?>
                                <div class="align-self-start">
                                    <h3 class="mr-2">User-Business</h3>
                                </div>
                                <div class="media-body">
                                    <h4>Count: <?php echo $data['Count']; ?></h4>
                                    <span>Messages</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-wallet success font-large-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>