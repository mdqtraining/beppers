<?php

include_once "connect.php";

if(isset($_POST['send']))
{
    $name=$_POST['full_name'];
    $mobile=$_POST['mobile_no'];
	$email=$_POST['email'];
	$password=$_POST['pwd'];
    $department=$_POST['department'];

  
	if(!empty($name))
	{
        
		
		$sql="INSERT INTO register (full_name,mobile_no,email,pwd,department) VALUES ('$name','$mobile','$email','$password','$department')";

		   $result=mysqli_query($conn, $sql);
           
           if($result){
            echo '<script language="javascript">
            alert("Registered successfully");
            window.location = "index.php";
            </script>';
        }
        else{
            echo '<script language="javascript">
            alert("something went wrong");
            window.location = "signup.php";
            </script>';
            
        }
    }else{
        $error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
        }
}

?>