<div class="sticky-top crome fw-bold text-uppercase">

    <div class="d-flex align-items-center justify-content-center align-items-sm-start px-3 pt-2 text-white min-vh-100 my-auto">
        <div class="glass px-4">
            <a class="d-flex pb-3 mb-md-0 me-md-auto text-decoration-none mq">
                <span class="fs-5 d-none d-sm-inline">Menu</span>
            </a>

            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

                <li class="nav-item">
                    <a href="home.php" class="nav-link align-middle px-0 ">
                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="dash.php" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-bar-chart-fill"></i> <span class="ms-1 d-none d-sm-inline ">Posts</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="charts.php" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Sign Up</span></a>
                </li>

                <li class="nav-item">
                    <a href="users.php" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Accounts</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="post.php" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-pencil-square"></i> <span class="ms-1 d-none d-sm-inline">Edit Posts</span> </a>
                </li>

                <li class="nav-item">
                    <a href="comments.php" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Comments</span></a>
                </li>

                <li class="nav-item">
                    <a href="user_block.php" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-person-fill"></i>
                        <span class="ms-1 d-none d-sm-inline">Block Page</span></a>
                </li>

                <li class="nav-item">
                    <a href="deactivate.php" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi bi-exclamation-triangle"></i>
                        <span class="ms-1 d-none d-sm-inline">Deactivate</span></a>
                </li>
                
                <li class="nav-item">
                    <a href="addcategory.php" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi bi-chat"></i>
                        <span class="ms-1 d-none d-sm-inline">Message</span></a>
                </li>
                <li class="nav-item">
                    <a href="support.php" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi bi-question-circle-fill"></i>
                        <span class="ms-1 d-none d-sm-inline">Support</span></a>
                </li>
            </ul>

            <hr>    

            <div class="dropdown pb-2 pt-3">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="bg.jpeg" alt="none" width="30" height="30" class="rounded-circle">
                    <span class="d-none d-sm-inline mx-1">
                        <?php
                        //echo $name;
                        ?>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li> -->
                    <!-- <li><a class="dropdown-item" href="#">Profile</a></li> -->
                    <li>
                        <!-- <hr class="dropdown-divider"> -->
                    </li>
                    <li>
                        <form id="myform_id" action="logout.php" method="POST"> <a href="javascript:$('#myform_id').submit();" class="dropdown-item">Sign
                                out</a></form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>