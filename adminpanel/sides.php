<!-- <?php
        session_start();
        if (!$_SESSION['email']) {
            echo '<script language="javascript">
    window.location = "index.php";
    </script>';
        }
        ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="900;url=logout.php" /> -->
    <link rel="shortcut icon" sizes="100x100" href="favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="sides.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="sides.css">

    <style>
        .nav_list>a:hover {
            color: #fc6703;
        }

        /*code to change background color*/
        nav.nav>.nav_list>a.active {
            background-color: #C0C0C0;
            color: #fc6703;
        }

        .btn:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        .brandcolor {
            background-image: -webkit-linear-gradient(60deg, #FC6703, #F12651, #ED0A76);
            background-image: -moz-linear-gradient(60deg, #FC6703, #F12651, #ED0A76);
            background-image: -ms-linear-gradient(60deg, #FC6703, #F12651, #ED0A76);
            background-image: -o-linear-gradient(60deg, #FC6703, #F12651, #ED0A76);
            background-image: linear-gradient(60deg, #FC6703, #F12651, #ED0A76);
            -webkit-background-clip: text;
            -moz-background-clip: text;
            -ms-background-clip: text;
            -o-background-clip: text;
            background-clip: text;
            color: transparent;
            background: -webkit-linear-gradient(60deg, #FC6703, #F12651, #ED0A76);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle" style="color: #fff;"> <i class='bx bx-menu' id="header-toggle"></i></div>
        <!-- <a href="#" class="nav_logo my-3"><img src="images/vsafe-logo.png" alt="login form" class="img-fluid headr" /></a> -->
        <p class="brandcolor my-3 fs-2 mt-3"><span><img src="images/logo.png" width="60" height="60" /></span>Beppers</p>
        <div class="header_toggle">
            <div type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Exit">
                <a href="logout.php"><i class='bx bx-log-out nav_icon my-auto mnd'></i></a>
            </div>
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">

            <div class="nav_list">

                <a href="home.php" class="nav_link <?php if ($first_part=="home.php") {echo "active"; } else  {echo "noactive";} ?>"> <i class='bx bi-house nav_icon'></i><span class="nav_name">Home</span> </a>
                <a href="dash.php" class="nav_link <?php if ($first_part=="dash.php") {echo "active"; } else  {echo "noactive";} ?>"> <i class='bx bi-bar-chart-fill nav_icon'></i> <span class="nav_name">Post</span> </a>
                <a href="charts.php" class="nav_link <?php if ($first_part=="charts.php") {echo "active"; } else  {echo "noactive";} ?>"> <i class='bx bi-people nav_icon'></i> <span class="nav_name">Users</span> </a>
                <a href="users.php" class="nav_link <?php if ($first_part=="users.php") {echo "active"; } else  {echo "noactive";} ?>"> <i class='bx bi-table nav-icon'></i> <span class="nav_name">Accounts</span> </a>
                <a href="post.php" class="nav_link <?php if ($first_part=="post.php") {echo "active"; } else  {echo "noactive";} ?>"> <i class='bx bi-pencil-square nav_icon'></i> <span class="nav_name">Edit Posts</span> </a>
                <a href="comments.php" class="nav_link <?php if ($first_part=="comments.php") {echo "active"; } else  {echo "noactive";} ?>"> <i class='bx bxs-user nav_icon'></i> <span class="nav_name">Comments</span> </a>
                <a href="user_block.php" class="nav_link <?php if ($first_part=="user_block.php") {echo "active"; } else  {echo "noactive";} ?>"> <i class='bx bx-file nav_icon'></i> <span class="nav_name">Blocked Accounts</span> </a>
                <a href="deactivate.php" class="nav_link <?php if ($first_part=="deactivate.php") {echo "active"; } else  {echo "noactive";} ?>"> <i class='bx bi-exclamation-triangle nav_icon'></i> <span class="nav_name">Deactivate</span> </a>
                <a href="addcategory.php" class="nav_link <?php if ($first_part=="addcategory.php") {echo "active"; } else  {echo "noactive";} ?>"> <i class='bx bi-plus-circle nav_icon'></i> <span class="nav_name">Add Category</span> </a>
                <a href="support.php" class="nav_link <?php if ($first_part=="support.php") {echo "active"; } else  {echo "noactive";} ?>"> <i class="bx bi-question-circle-fill"></i> <span class="nav_name">Support</span></a>

            </div>

        </nav>

        <script>
            $(document).ready(function() {

                $('nav.nav > nav_list > a ')
                    .click(function(e) {
                        $('nav.nav > nav_list > a')
                            .removeClass('active');
                        $(this).addClass('active');
                    });
            });
        </script>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

</html>