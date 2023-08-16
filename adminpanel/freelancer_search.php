<?php

require_once 'connect.php';
if (isset($_POST['free_param'])) {
    $free_param = mysqli_real_escape_string($conn, $_POST['free_param']);
    $query = mysqli_query($conn, "SELECT * FROM users where type='freelance' and name like '%$free_param%' or email like '%$free_param%' or user_name like '%$free_param%' or mobile like '%$free_param%' order by id");
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
?>

