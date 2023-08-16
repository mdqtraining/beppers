<?php

require_once 'connect.php';
if (isset($_POST['user_param'])) {
    $user_param = mysqli_real_escape_string($conn, $_POST['user_param']);
    $query = mysqli_query($conn, "SELECT * FROM users where type='users' and name like '%$user_param%' or email like '%$user_param%' or user_name like '%$user_param%' or mobile like '%$user_param%' order by id");
    $output = '';
    if ($query->num_rows > 0) {
        while ($row = mysqli_fetch_array($query)) {
            $output .= '<tr>
            <td> </td>
            <td> </td>
    <td>' . $row['user_name'] . '</td>
    <td>' . $row['description'] . '</td>
    <td>' . $row['name'] . '</td>
    <td>' . $row['mobile'] . '</td>
    <td>' . $row['email'] . '</td>
    <td>' . $row['dob'] . '</td>
    <td>' . $row['gender'] . '</td>
    <td>' . $row['categories'] . '</td>
    <td>' . $row['others'] . '</td>
    <td>' . $row['service'] . '</td>
    <td>' . $row['certificate_proof'] . '</td>
    <td>' . $row['profile_photo'] . '</td>
     </tr>';
        }
    } else {
        $output = '
  <tr>
    <td colspan="4"> No result found. </td>   
  </tr>';
    }
    echo $output;
}

