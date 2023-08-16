<?php include "connect.php"; ?>
<style>
    /* .css {
        height: 8vh;
        width: 35vh;
        margin-left: -25px;
        color: #fff;
        border-radius: 4px;
        background: #2d2e37;
        box-shadow: inset 7px 7px 14px #202027,
            inset -7px -7px 14px #3b3c48;
    } */

    .cds {
    
            box-shadow:  8px 8px 16px #07080d,
             -8px -8px 16px #1b2033; 
    }

    .cds1 {
      
        box-shadow:  8px 8px 16px #07080d,
             -8px -8px 16px #1b2033;
    }

    
</style>
<div class="col">
    <div id="dashboard" class="container-fluid">
        <div class="row d-flex justify-content-evenly">
            <!-- DASHBOARD QUERY-->
            <?php
            $count =  "SELECT COUNT(type) AS total FROM users";
            $result = mysqli_query($conn, $count);
            $row = mysqli_fetch_array($result);
            $type = $row['total'];
            ?>
            <h3>Accounts</h3>
            <!--Total Account -->
            <div class="col-lg-3 col-xl-4">
                <!-- <a href="freelance.php" class="text-decoration-none text-white"> -->
                    <div class="clp apl3 px-3 py-3 cds">
                        <div class="card border-0 l-bg-gradient">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-users"></i>
                                </div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Total Account</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex usertablinks" onclick="user(event, 'freelance')" id="defaultOpenuser">
                                    <div class="col-8">
                                        <?php
                                        $count =  "SELECT COUNT(type) AS total FROM users";
                                        $result = mysqli_query($conn, $count);
                                        $row = mysqli_fetch_array($result);
                                        $type = $row['total'];
                                        ?>
                                        <h2 class="d-flex align-items-center mb-0">
                                            <?php echo $type; ?>
                                        </h2>
                                    </div>
                                    <div class="col-4 text-right">
                                        <span>
                                            <?php
                                            //to find the yesterday's date
                                            $ydate = mysqli_query($conn, "SELECT DATE_SUB(CURDATE(), INTERVAL 1 DAY) AS ydate");
                                            $ydate_res = mysqli_fetch_array($ydate);
                                            $y_date = $ydate_res['ydate'];

                                            //to find yesterday's count
                                            $yesterday = mysqli_query($conn, "SELECT COUNT(created_at) AS yesterday_count FROM users WHERE created_at LIKE '%" . $y_date .  "%' AND type = 'freelance'");

                                            //to find today's date
                                            $todate = mysqli_query($conn, "SELECT DATE(CURDATE()) AS todate");
                                            $todate_res = mysqli_fetch_array($todate);
                                            $to_date = $todate_res['todate'];

                                            //to find today's count
                                            $today = mysqli_query($conn, "SELECT COUNT(created_at) AS today_count FROM users WHERE created_at like '%" . $to_date . "%' AND type = 'freelance'");
                                            //$total = mysqli_query($conn, "SELECT COUNT(type) AS total FROM users where type = 'user'");

                                            $res = mysqli_fetch_array($yesterday);
                                            $yesterday_count = $res['yesterday_count'];
                                            $res2 = mysqli_fetch_array($today);
                                            $today_count = $res2['today_count'];

                                            $total_count = $yesterday_count + $today_count;
                                            if ($today_count != 0) {
                                                $today_percent = ($today_count / $total_count);
                                            } else {
                                                $today_percent = 0;
                                            }
                                            if ($yesterday_count != 0) {
                                                $yesterday_percent = ($yesterday_count / $total_count);
                                            } else {
                                                $yesterday_percent = 0;
                                            }

                                            $count1 = "SELECT COUNT(type) AS test1 FROM users";
                                            $result1 = mysqli_query($conn, $count1);
                                            $row1 = mysqli_fetch_array($result1);
                                            $type1 = $row1['test1'];
                                            $resu = ($type / $type1) * 100;
                                            echo (int)$resu . "%";

                                            //echo round($today_percent). "%";

                                            if ($yesterday_percent >= $today_percent) {
                                            ?>
                                                <i class="fa fa-arrow-down"></i></span>
                                    <?php
                                            } else if ($yesterday_percent < $today_percent) {
                                    ?>
                                        <i class="fa fa-arrow-up"></i></span>
                                    <?php
                                            }
                                    ?>
                                    </div>
                                </div>
                                <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                    <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </a> -->
            </div>
            <!-- User Account -->
            <div class="col-lg-3 col-xl-4">
                <a href="users.php" class="text-decoration-none text-white">
                    <div class="clp apl1 px-3 py-3 cds1">
                        <div class="card border-0 l-bg-green-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-users"></i>
                                </div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">User Account</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex usertablinks" onclick="user(event, 'user')" id="defaultOpenuser">

                                    <div class="col-8">
                                        <?php
                                        $count =  "SELECT COUNT(type) AS user FROM users WHERE type='user'";
                                        $result = mysqli_query($conn, $count);
                                        $row = mysqli_fetch_array($result);
                                        $type = $row['user'];
                                        ?>
                                        <h2 class="d-flex align-items-center mb-0">
                                            <?php echo $type; ?>
                                        </h2>
                                    </div>
                                    <div class="col-4 text-right">
                                        <span>
                                            <?php
                                            //to find the yesterday's date
                                            $ydate = mysqli_query($conn, "SELECT DATE_SUB(CURDATE(), INTERVAL 1 DAY) AS ydate");
                                            $ydate_res = mysqli_fetch_array($ydate);
                                            $y_date = $ydate_res['ydate'];

                                            //to find yesterday's count
                                            $yesterday = mysqli_query($conn, "SELECT COUNT(created_at) AS yesterday_count FROM users WHERE created_at LIKE '%" . $y_date .  "%' AND type = 'user'");

                                            //to find today's date
                                            $todate = mysqli_query($conn, "SELECT DATE(CURDATE()) AS todate");
                                            $todate_res = mysqli_fetch_array($todate);
                                            $to_date = $todate_res['todate'];

                                            //to find today's count
                                            $today = mysqli_query($conn, "SELECT COUNT(created_at) AS today_count FROM users WHERE created_at like '%" . $to_date . "%' AND type='user'");
                                            //$total = mysqli_query($conn, "SELECT COUNT(type) AS total FROM users where type = 'user'");

                                            $res = mysqli_fetch_array($yesterday);
                                            $yesterday_count = $res['yesterday_count'];
                                            $res2 = mysqli_fetch_array($today);
                                            $today_count = $res2['today_count'];

                                            $total_count = $yesterday_count + $today_count;
                                            if ($today_count != 0) {
                                                $today_percent = ($today_count / $total_count);
                                            } else {
                                                $today_percent = 0;
                                            }
                                            if ($yesterday_count != 0) {
                                                $yesterday_percent = ($yesterday_count / $total_count);
                                            } else {
                                                $yesterday_percent = 0;
                                            }



                                            $count1 = "SELECT COUNT(type) AS test1 FROM users";
                                            $result1 = mysqli_query($conn, $count1);
                                            $row1 = mysqli_fetch_array($result1);
                                            $type1 = $row1['test1'];
                                            $resu = ($type / $type1) * 100;
                                            echo (int)$resu . "%";

                                            //echo round($today_percent). "%";

                                            if ($yesterday_percent >= $today_percent) {
                                            ?>
                                                <i class="fa fa-arrow-down"></i></span>
                                    <?php
                                            } else if ($yesterday_percent < $today_percent) {
                                    ?>
                                        <i class="fa fa-arrow-up"></i></span>
                                    <?php
                                            }
                                    ?>
                                    </div>
                                </div>
                                <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                    <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        
        <div class="row d-flex justify-content-evenly">
            <!-- Business Account -->
            <div class="col-lg-3 col-xl-4">
                <div class="clp apl px-3 py-3 cds1">
                    <div class="card border-0 l-bg-cherry">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-users"></i>
                            </div>
                           
                            <a href="business_user.php" class="text-decoration-none text-white">
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Business Account</h5>
                            </div>
                                <div class="row align-items-center mb-2 d-flex usertablinks">
                                    <div class="col-8">
                                        <?php
                                        $count =  "SELECT COUNT(type) AS business FROM users WHERE type='business'";
                                        $result = mysqli_query($conn, $count);
                                        $row = mysqli_fetch_array($result);
                                        $type = $row['business'];
                                        ?>
                                        <h2 class="d-flex align-items-center mb-0">
                                            <?php echo $type; ?>
                                        </h2>
                                    </div>
                                    <div class="col-4 text-right">
                                        <span>
                                            <?php
                                            //to find the yesterday's date
                                            $ydate = mysqli_query($conn, "SELECT DATE_SUB(CURDATE(), INTERVAL 1 DAY) AS ydate");
                                            $ydate_res = mysqli_fetch_array($ydate);
                                            $y_date = $ydate_res['ydate'];

                                            //to find yesterday's count
                                            $yesterday = mysqli_query($conn, "SELECT COUNT(created_at) AS yesterday_count FROM users WHERE created_at LIKE '%" . $y_date .  "%' AND type = 'business'");

                                            //to find today's date
                                            $todate = mysqli_query($conn, "SELECT DATE(CURDATE()) AS todate");
                                            $todate_res = mysqli_fetch_array($todate);
                                            $to_date = $todate_res['todate'];

                                            //to find today's count
                                            $today = mysqli_query($conn, "SELECT COUNT(created_at) AS today_count FROM users WHERE created_at like '%" . $to_date . "%' AND type = 'business'");
                                            //$total = mysqli_query($conn, "SELECT COUNT(type) AS total FROM users where type = 'user'");

                                            $res = mysqli_fetch_array($yesterday);
                                            $yesterday_count = $res['yesterday_count'];
                                            $res2 = mysqli_fetch_array($today);
                                            $today_count = $res2['today_count'];

                                            $total_count = $yesterday_count + $today_count;
                                            if ($today_count != 0) {
                                                $today_percent = ($today_count / $total_count);
                                            } else {
                                                $today_percent = 0;
                                            }
                                            if ($yesterday_count != 0) {
                                                $yesterday_percent = ($yesterday_count / $total_count);
                                            } else {
                                                $yesterday_percent = 0;
                                            }



                                            $count1 = "SELECT COUNT(type) AS test1 FROM users";
                                            $result1 = mysqli_query($conn, $count1);
                                            $row1 = mysqli_fetch_array($result1);
                                            $type1 = $row1['test1'];
                                            $resu = ($type / $type1) * 100;
                                            echo (int)$resu . "%";

                                            //echo round($today_percent). "%";

                                            if ($yesterday_percent >= $today_percent) {
                                            ?>
                                                <i class="fa fa-arrow-down"></i></span>
                                    <?php
                                            } else if ($yesterday_percent < $today_percent) {
                                    ?>
                                        <i class="fa fa-arrow-up"></i></span>
                                    <?php
                                            }
                                    ?>
                                    </div>
                                </div>
                            </a>
                            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Freelancer Account -->
            <div class="col-lg-3 col-xl-4">
                <a href="freelance.php" class="text-decoration-none text-white">
                    <div class="clp apl2 px-3 py-3 cds1">
                        <div class="card border-0 l-bg-orange-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-users"></i>
                                </div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Freelance Account</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex usertablinks" onclick="user(event, 'freelance')" id="defaultOpenuser">
                                    <div class="col-8">
                                        <?php
                                        $count =  "SELECT COUNT(type) AS freelance FROM users WHERE type='freelance'";
                                        $result = mysqli_query($conn, $count);
                                        $row = mysqli_fetch_array($result);
                                        $type = $row['freelance'];
                                        ?>
                                        <h2 class="d-flex align-items-center mb-0">
                                            <?php echo $type; ?>
                                        </h2>
                                    </div>
                                    <div class="col-4 text-right">
                                        <span>
                                            <?php
                                            //to find the yesterday's date
                                            $ydate = mysqli_query($conn, "SELECT DATE_SUB(CURDATE(), INTERVAL 1 DAY) AS ydate");
                                            $ydate_res = mysqli_fetch_array($ydate);
                                            $y_date = $ydate_res['ydate'];

                                            //to find yesterday's count
                                            $yesterday = mysqli_query($conn, "SELECT COUNT(created_at) AS yesterday_count FROM users WHERE created_at LIKE '%" . $y_date .  "%' AND type = 'freelance'");

                                            //to find today's date
                                            $todate = mysqli_query($conn, "SELECT DATE(CURDATE()) AS todate");
                                            $todate_res = mysqli_fetch_array($todate);
                                            $to_date = $todate_res['todate'];

                                            //to find today's count
                                            $today = mysqli_query($conn, "SELECT COUNT(created_at) AS today_count FROM users WHERE created_at like '%" . $to_date . "%' AND type = 'freelance'");
                                            //$total = mysqli_query($conn, "SELECT COUNT(type) AS total FROM users where type = 'user'");

                                            $res = mysqli_fetch_array($yesterday);
                                            $yesterday_count = $res['yesterday_count'];
                                            $res2 = mysqli_fetch_array($today);
                                            $today_count = $res2['today_count'];

                                            $total_count = $yesterday_count + $today_count;
                                            if ($today_count != 0) {
                                                $today_percent = ($today_count / $total_count);
                                            } else {
                                                $today_percent = 0;
                                            }
                                            if ($yesterday_count != 0) {
                                                $yesterday_percent = ($yesterday_count / $total_count);
                                            } else {
                                                $yesterday_percent = 0;
                                            }

                                            $count1 = "SELECT COUNT(type) AS test1 FROM users";
                                            $result1 = mysqli_query($conn, $count1);
                                            $row1 = mysqli_fetch_array($result1);
                                            $type1 = $row1['test1'];
                                            $resu = ($type / $type1) * 100;
                                            echo (int)$resu . "%";

                                            //echo round($today_percent). "%";

                                            if ($yesterday_percent >= $today_percent) {
                                            ?>
                                                <i class="fa fa-arrow-down"></i></span>
                                    <?php
                                            } else if ($yesterday_percent < $today_percent) {
                                    ?>
                                        <i class="fa fa-arrow-up"></i></span>
                                    <?php
                                            }
                                    ?>
                                    </div>
                                </div>
                                <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                    <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
            $count =  "SELECT COUNT(type) AS total FROM users";
            $result = mysqli_query($conn, $count);
            $row = mysqli_fetch_array($result);
            $type = $row['total'];
            ?>
        </div>
    </div>
</div>