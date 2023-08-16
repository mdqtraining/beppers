<?php

use function PHPSTORM_META\type;

include "connect.php";
session_start();

if (!$_SESSION['email']) {
    echo '<script language="javascript">
    window.location = "index.php";
    </script>';
}
$email = $_SESSION['email'];
$res = mysqli_query($conn, "SELECT * FROM admin WHERE full_name='$email'");
$data = mysqli_fetch_array($res);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="900;url=logout.php" /> -->
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <link rel="stylesheet" href="sides.css">


    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
        @import 'variables.css';

        .nav-link {
            color: white !important;
        }

        .nav-link:hover {
            color: #F05A28 !important;
        }

        .nav-link.active {
            color: #F05A28 !important;
        }

        .a {
            color: white !important;
        }

        .td .table {
            word-wrap: break-word;
            word-break: break-all;
            white-space: normal !important;
            text-align: justify;
        }

        .css-serial {
            counter-reset: serial-number;
            /* Set the serial number counter to 0 */
        }

        .css-serial td:first-child:before {
            counter-increment: serial-number;
            /* Increment the serial number counter */
            content: counter(serial-number);
            /* Display the counter */
        }



        .css-serial {
            counter-reset: serial-number;
            /* Set the serial number counter to 0 */
        }

        .css-serial td:first-child:before {
            counter-increment: serial-number;
            /* Increment the serial number counter */
            content: counter(serial-number);
            /* Display the counter */
        }

        .clse {
            background-color: #287bbf;
        }

        html,
        body {
            /* font-family: 'Roboto', sans-serif !important; */
            font-family: 'Roboto', sans-serif !important;
        }


        .content {
            display: flex;
        }



        .container__main {
            /* Take the remaining width */
            flex: 1;

            /* Make it scrollable */
            overflow: auto;
        }

        .head_color{
            color: #fc6703;
            background-color: #111420;
        }
    </style>

</head>