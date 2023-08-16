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
</style>

<body class="body_color">
    <div id="dashboard" class="container-fluid">
        <div class="row">
            <div class="col-auto px-0">
                <?php
                $directoryURI = $_SERVER['REQUEST_URI'];
                $path = parse_url($directoryURI, PHP_URL_PATH);
                $components = explode('/adminpanel/', $path);
                $first_part = $components[1];
                include 'sides.php';
                ?>
            </div>
            <!-- User Account -->
            <!-- COUNT -->
            <div class="col">
                <div class="row">
                    <div class="col h-100">
                        <div class="text-start" style="border-radius: 16px;">
                            <div class="card-body">
                                <div>
                                    <?php include "user_dashboard.php"; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-5">
                <div class="col">
                    <div id="post" class="container-fluid">
                        <h3>Message Count</h3>
                        <div class="row py-5">
                            <div class="col-md-12 col-xl-5 col-lg-5 d-flex align-items-center justify-content-center">
                                <div class="p-3 align-items-center cardshade text-white">

                                    <?php
                                    $sql = mysqli_query($conn, "SELECT COUNT(*) as Count FROM chat WHERE t_type = 'user' AND f_type = 'freelance'");
                                    $data = mysqli_fetch_assoc($sql)
                                    ?>
                                    <div class="align-self-center">
                                        <h5 class="px-5">User to Freelance</h5>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="px-5">Count: <span><?php echo $data['Count']; ?></span></h6>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-wallet success font-large-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-5 col-lg-5 d-flex align-items-center justify-content-center">
                                <div class="p-3 align-items-center cardshade text-white">
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT COUNT(*) AS Count FROM chat WHERE t_type = 'user' AND f_type = 'business'");
                                    $data = mysqli_fetch_assoc($sql)
                                    ?>
                                    <div class="align-self-center">
                                        <h5 class="px-5">User to Business</h5>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="px-5">Count: <span><?php echo $data['Count']; ?></span></h6>
                                    </div>

                                    <div class="align-self-center">
                                        <i class="icon-wallet success font-large-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-2 col-lg-2 d-flex align-items-center justify-content-center">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


    </div>
</body>

</html>
<!-- <div class="col-lg-3 col-xl-3 col-xxl-3 d-flex justify-content-center">
                                    <div class="clone1 clone-color4 px-3 py-3">
                                        <h4 class="fs-6"></h4>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xl-3 col-xxl-3 d-flex justify-content-center">
                                    <div class="clone1 clone-color2 px-3 py-3">
                                        <h4 class="fs-6"></h4>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xl-3 col-xxl-3 d-flex justify-content-center">
                                    <div class="clone1 clone-color1 px-3 py-3">
                                        <h4 class="fs-6"></h4>
                                    </div>
                                </div>
                              -->

<!-- <div class="row px-2 py-2">
                                <div class="col-lg-3 col-xl-3 col-xxl-3 d-flex justify-content-center">
                                 <div class="clone1 clone-color2 px-3 py-3">
                                        <h4 class="fs-6">col2 Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Totam suscipit voluptatem non eius? Molestias repellat ducimus fugiat totam
                                            maiores, nam praesentium soluta architecto temporibus, ipsum atque dolores
                                            repellendus tenetur eveniet!</h4>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xl-3 col-xxl-3 d-flex justify-content-center">
                                    <div class="clone1 clone-color1 px-3 py-3">
                                        <h4 class="fs-6">col2 Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Minima nam reiciendis aliquid animi, cupiditate ducimus cumque voluptas
                                            labore delectus doloribus eligendi voluptate tempora debitis, ab eos
                                            necessitatibus iste at obcaecati!</h4>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xl-3 col-xxl-3 d-flex justify-content-center">
                                    <div class="clone1 clone-color3 px-3 py-3">
                                        <h4 class="fs-6">col2 Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Totam suscipit voluptatem non eius? Molestias repellat ducimus fugiat totam
                                            maiores, nam praesentium soluta architecto temporibus, ipsum atque dolores
                                            repellendus tenetur eveniet!</h4>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xl-3 col-xxl-3 d-flex justify-content-center">
                                    <div class="clone1 clone-color4 px-3 py-3">
                                        <h4 class="fs-6">col2 Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Minima nam reiciendis aliquid animi, cupiditate ducimus cumque voluptas
                                            labore delectus doloribus eligendi voluptate tempora debitis, ab eos
                                            necessitatibus iste at obcaecati!</h4>
                                    </div>
                                </div>
                             
                            </div> -->