<?php

require_once 'connect.php';
if (isset($_POST['search_param'])) {
    $search_param = mysqli_real_escape_string($conn, $_POST['search_param']);
    $query = mysqli_query($conn, "SELECT * FROM users where type='business' and name like '%$search_param%' or email like '%$search_param%' or user_name like '%$search_param%' or mobile like '%$search_param%' order by id");
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

<!-- <div class="row py-4">
    <div class="row justify-content-start">
        <div class="col-3">
            <div class='d-flex justify-content-evenly py-3'>

                <div>
                    <input type="text" class="form-control" id="search_param" placeholder="Search">
                </div>

            </div>
        </div>
    </div>
</div> -->