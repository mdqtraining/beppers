<?php

include ("connect.php");
session_start();

if(isset($_POST['send']))
{
    
    $email=$_POST['email'];
    $password=$_POST['pwd'];
   
    

    // $sql="SELECT * from register where email='$email'and pwd='$password'";
    // $result=mysqli_query($conn, $sql);


        $sql = "SELECT * FROM admin WHERE full_name= '$email' AND pwd = '$password'";
        $result=mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);

        if ($rows == 1)

        {
          
            $_SESSION['email'] = $email;
            echo '<script language="javascript">
            alert("Logged in successfully!");
            window.location = "home.php";
            </script>';
           
        }
        else{
            echo '<script language="javascript">
            alert("Failed to Login!");
            window.location = "index.php";
            </script>';
        }
 
}


?>
