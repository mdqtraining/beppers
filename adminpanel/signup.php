<?php
include_once ("connect.php");
include_once ("register.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oneplus Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
          rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
         crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/signup.css" >
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                    <h1 class="card-title text-center">SIGN UP</h1>
                        <form action="register.php" method="POST">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input 
                                type="text" 
                                class="form-control"
                                style="border-radius:10px;" 
                                placeholder="Enter your full name"
                                id="name"
                                name="full_name"
                                />
                            </div>

                            <div class="form-group">
                                <label for="mobile">Mobile No.</label>
                                <input
                                 type="number" 
                                 name="mobile_no" 
                                id="mobile" 
                                class="form-control"
                                style="border-radius:10px;"
                                placeholder="Enter a mobile number">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                 type="email"
                                 name="email"
                                 id="email" 
                                 class="form-control"
                                 style="border-radius:10px;"
                                 placeholder="Enter a email">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input
                                 type="password"
                                 name="pwd"
                                 id="password" 
                                 class="form-control"
                                 style="border-radius:10px;"
                                 placeholder="Enter a password">
                            </div>

                            <div class="form-group">
                                <label for="department">Department</label>
                                 <select 
                                 class="form-control" 
                                 name="department"
                                 style="border-radius: 10px;"
                                 aria-label="Default select example"> 
                                <option selected>Select from below</option>
                                <option value="Merchant">Merchant</option>
                                <option value="Industrial Engineer">Industrial Engineer</option>
                                <option value="Quality Controller">Quality Controller</option>
                                 </select>
                            </div>
                            <br>
                            <div class="form-group text-center p-2">
                                <button
                                 type="submit" name="send"
                                 class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>