<?php
include 'connect.php';

if (isset($_POST['edituser'])) {
    $user_id = $_POST['id'];
    $description = $_POST['description'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $type = $_POST['type'];
    $categories = $_POST['categories'];
    $service = $_POST['service'];
    $no_of_post = $_POST['no_of_post'];
    $no_of_followings = $_POST['no_of_followings'];
    $no_of_followers = $_POST['no_of_followers'];
    $privacy = $_POST['privacy'];
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-y h:i:s');
    $updated_at = $date;
    $certificateproofName = $_FILES["certificateproof"]["name"];
    $certificateproofTempname = $_FILES["certificateproof"]["tmp_name"];
    $extension = pathinfo($certificateproofName, PATHINFO_EXTENSION);
    $certificateproofFolder = "https://mdqualityapps.in/certificate_proof/";

    $profilephotoName = $_FILES["profilephoto"]["name"];
    $profilephotoTempname = $_FILES["profilephoto"]["tmp_name"];
    $extension = pathinfo($profilephotoName, PATHINFO_EXTENSION);
    $profilephotoFolder = "https://mdqualityapps.in/profile_photo/";

    if (move_uploaded_file($certificateproofTempname, $certificateproofFolder . $certificateproofName) || move_uploaded_file($profilephotoTempname, $profilephotoFolder . $profilephotoName)) {


        $sql = "UPDATE users SET `description` = '$description',`name` = '$name',`mobile` = '$mobile',`email` = '$email',`password` = '$password',`dob` = '$dob',`gender` = '$gender',`address` = '$address',`type` = '$type',`categories` = '$categories',`service` = '$service',`certificate_proof` = '$certificateproofName',`no_of_posts` = '$no_of_post',`no_of_following` = '$no_of_followings',`no_of_followers`= '$no_of_followers',`profile_photo`='$profilephotoName',`privacy`='$privacy',`updated_at`='$updated_at' WHERE id = '$user_id'";
        if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>
           alert('User has been updated image');
           window.location.href='users.php'; 
           </script>";
        } else {
            echo "<script type='text/javascript'>
           alert('Something went wrong !!! Please try again later.');
           window.location.href='usersEdit.php'; 
           </script>";
        }
    } else {

        $sql = "UPDATE users SET `description` = '$description',`name` = '$name',`mobile` = '$mobile',`email` = '$email',`password` = '$password',`dob` = '$dob',`gender` = '$gender',`address` = '$address',`type` = '$type',`categories` = '$categories',`service` = '$service',`no_of_posts` = '$no_of_post',`no_of_following` = '$no_of_followings',`no_of_followers`= '$no_of_followers',`privacy`='$privacy',`updated_at`='$updated_at' WHERE id = '$user_id'";

        if (mysqli_query($conn, $sql)) {

            echo "<script type='text/javascript'>
           alert('User has been updated');
           window.location.href='users.php'; 
           </script>";
        } else {
            echo "<script type='text/javascript'>
           alert('Something went wrong !!! Please try again later.');
           window.location.href='usersEdit.php'; 
           </script>";
        }
    }
    mysqli_close($conn);
    exit;
} elseif (isset($_POST['editpost'])) {

    $post_id = $_POST['id'];
    $user_name = $_POST['uName'];
    $description = $_POST['description'];
    $tag = $_POST['tag'];
    $no_of_comments = $_POST['no_of_comments'];
    $no_of_likes = $_POST['no_of_likes'];
   
    $images_name = "";
	foreach ($_FILES["photos"]["error"] as $key => $error) {
		if ($error == UPLOAD_ERR_OK) {
			$tmp_name = $_FILES["photos"]["tmp_name"][$key];
			$name = $_FILES["photos"]["name"][$key];
			$img_product = move_uploaded_file($tmp_name, "https://mdqualityapps.in/gallery/$name");
			$images_name = $images_name . $name . ",";
		}
	}

    if ($images_name != null) {


    $sql = "UPDATE post SET `name` = '$user_name',`description` = '$description',`tag` = '$tag',`no_of_comments` = '$no_of_comments',`no_of_likes` = '$no_of_likes',`gallery`='" . $images_name . "' WHERE id = '$post_id'";

    if (mysqli_query($conn, $sql)) {

        echo "<script type='text/javascript'>
            alert('Post and photos has been updated');
            window.location.href='post.php'; 
            </script>";

    } else {

        echo "<script type='text/javascript'>
            alert('Post and photos not updated.');
            window.location.href='postEdit.php'; 
            </script>";

    }
}
else
{
    $sql = "UPDATE post SET `name` = '$user_name',`description` = '$description',`tag` = '$tag',`no_of_comments` = '$no_of_comments',`no_of_likes` = '$no_of_likes' WHERE id = '$post_id'";

    if (mysqli_query($conn, $sql)) {

        echo "<script type='text/javascript'>
            alert('Post has been updated');
            window.location.href='post.php'; 
            </script>";

    } else {

        echo "<script type='text/javascript'>
            alert('Something went wrong !!! Please try again later.');
            window.location.href='postEdit.php'; 
            </script>";

    }
    
}
} elseif (isset($_POST['editcomments'])) {
    $comment_id = $_POST['id'];
    $active = $_POST['active'];
    $comments = $_POST['comments'];

    $sql = "UPDATE comments SET `active` = '$active',`comments` = '$comments' WHERE id = '$comment_id'";

    if (mysqli_query($conn, $sql)) {

        echo "<script type='text/javascript'>
        alert('Comments has been updated');
        window.location.href='comments.php'; 
        </script>";

    } else {

        echo "<script type='text/javascript'>
        alert('Something went wrong !!! Please try again later.');
        window.location.href='commentEdit.php'; 
        </script>";
        
    }
}
