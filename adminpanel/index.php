<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>makeover_final Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/login.css">

   
</head>

<body>
    <div class="container text-white d-flex align-items-center justify-content-center" style="height:100vh">
        <div class="card login-form">
            <div class="card-body">

                <h1 class="card-title text-center">LOGIN</h1>
                <div class="card-text">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                <h5 style="margin-top: 20px;">User Name</h5>
                            </label>

                            <input type="text" name="email" class="form-control form-control-sm em" id="exampleInputEmail1" placeholder="Enter your username" />
                        </div>
                        <div class="form-group">
                            
                                <label for="exampleInputPassword1">
                                    <h5 style="margin-top: 20px;">Password</h5>
                                </label>
                                <input type="password" name="pwd" class="form-control form-control-sm ps" placeholder="password" />
                           
                        </div>
                        <div class="text-center py-2">
                            <button type="submit" name="send" class="btn bs">
                                Sign In
                            </button>
                            </div>
                    </form>
              
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<!-- <div class="text-end">
                            <a href="#"  style=" font-size:12px;">
                                Forget Password?</a>
                        </div> -->
<!-- <div class="signup">
                                Don't have an account? <a href="signup.php" style="float: center; font-size:12px;">Create One</a>
                            </div> -->