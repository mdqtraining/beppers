<?php include 'header.php'; ?>
<link rel="stylesheet" href="css/dash.css">
<style>
    body {
        background-color: #2d2e37 !important;
        display: flex;
        margin-top: 50px;
        justify-content: center;
        align-items: center;
    }

    @media (max-width: 900px) {
        .css {
            height: 8vh;
            width: 35vh;
            margin-left: -25px;
            color: #fff;
            border-radius: 4px;
            background: #2d2e37;
            box-shadow: inset 7px 7px 14px #202027,
                inset -7px -7px 14px #3b3c48;
        }

        .circ {
            margin-top: -73px;
            margin-left: -70px;
            height: 9vh;
            width: 9vh;
            border-radius: 42px;
            background: linear-gradient(145deg, #30313b, #292932);
            box-shadow: 6px 6px 12px #1e1e24,
                -6px -6px 12px #3c3e4a;
        }

        .counts {
            padding-top: 25px;
        }
    }

    @media (min-width: 1100px) {
        .css {
            height: 75px;
            width: 250px;
            color: #fff;
            border-radius: 4px;
            background: #2d2e37;
            box-shadow: inset 7px 7px 14px #202027,
                inset -7px -7px 14px #3b3c48;
        }

        .circ {
            margin-top: -45px;
            margin-left: -40px;
            height: 70px;
            width: 70px;
            border-radius: 42px;
            background: linear-gradient(145deg, #30313b, #292932);
            box-shadow: 6px 6px 12px #1e1e24,
                -6px -6px 12px #3c3e4a;
        }

        .counts {
            padding-top: 25px;
        }
    }

    @media (min-width: 1300px) {
        .css {
            height: 80px;
            width: 250px;
            color: #fff;
            border-radius: 4px;
            background: #2d2e37;
            box-shadow: inset 7px 7px 14px #202027,
                inset -7px -7px 14px #3b3c48;
        }

        .circ {
            margin-top: -45px;
            margin-left: -40px;
            height: 80px;
            width: 80px;
            border-radius: 42px;
            background: linear-gradient(145deg, #30313b, #292932);
            box-shadow: 6px 6px 12px #1e1e24,
                -6px -6px 12px #3c3e4a;
        }

        .counts {
            padding-top: 25px;
        }
    }

    @media (min-width: 2000px) {
        .css {
            height: 10vh;
            width: 35vh;
            color: #fff;
            border-radius: 4px;
            background: #2d2e37;
            box-shadow: inset 7px 7px 14px #202027,
                inset -7px -7px 14px #3b3c48;
        }

        .circ {
            margin-top: -65px;
            margin-left: -50px;
            height: 100px;
            width: 100px;
            border-radius: 42px;
            background: linear-gradient(145deg, #30313b, #292932);
            box-shadow: 6px 6px 12px #1e1e24,
                -6px -6px 12px #3c3e4a;
        }

        .counts {
            padding-top: 25px;
        }
    }


    .btn{
    border-radius: 5px;
background: #111420 !important;
box-shadow:  -6px -6px 18px #07080d,
             6px 6px 18px #1b2033;
}

  
</style>

<body class="body_color">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto px-0">
                <?php include 'sides.php'; ?>
            </div>
            <div class="col">
            <div class="row py-4 px-5 fs-5">
                <div class="col-6">
                <h4 class="fw-bold w-25 text-nowrap" style="color: #fc6703;">
                    Post Chart
                </h4>
                </div>
                <div class="col-6">
                    <div class="float-end">
                   <a href="dash.php"> <button class="btn">Day</button></a>
                   <a href="dash_month.php"> <button class="btn">Month</button></a>
                   <a href="dash_year.php"> <button class="btn">Year</button></a>
                </div>
                </div>
                </div>
                <div id="dashboard" class="tabcontent container-fluid d-flex justify-content-center align-items-center">
                    <div class="col-10 pb-3">
                        <div class="card shadow rounded-3 p-2 chart_form" style="background-color: #111420; color: #fff;">
                            <div>
                                <input type="date" onchange="startDatefilter(this)">
                                <input type="date" onchange="endDatefilter(this)">
                             
                                <canvas id="mycharter"></canvas>
                            </div>

                            <?php
                            $counter = "SELECT DISTINCT (DATE(p.created_at)) AS post_date, COUNT(*) AS postu 
                            FROM post p INNER JOIN users u ON
                            p.user_id = u.id WHERE u.type = 'user'
                                   GROUP BY month(post_date)
                                   ORDER BY post_date ASC";
                            $day = mysqli_query($conn, $counter);

                            foreach ($day as $data) {
                                $postwise[] = $data['post_date'];
                                $user_count[] = $data['postu'];
                            }

                            $counter1 = "SELECT DISTINCT (DATE(p.created_at)) AS post_date, COUNT(*) AS postb 
                            FROM post p INNER JOIN users u ON
                            p.user_id = u.id WHERE u.type = 'business'
                                   GROUP BY month(post_date)
                                   ORDER BY post_date ASC";
                            $day2 = mysqli_query($conn, $counter1);

                            foreach ($day2 as $data2) {
                                $postwise[] = $data2['post_date'];
                                $business_count[] = $data2['postb'];
                            }

                            $counter2 = "SELECT DISTINCT (DATE(p.created_at)) AS post_date, COUNT(*) AS postf 
                            FROM post p INNER JOIN users u ON
                            p.user_id = u.id WHERE u.type = 'freelance'
                                   GROUP BY month(post_date)
                                   ORDER BY post_date ASC";
                            $day3 = mysqli_query($conn, $counter2);

                            foreach ($day3 as $data3) {
                                $postwise[] = $data3['post_date'];
                                $freelance_count[] = $data3['postf'];
                            }
                            ?>

                            <script>
                                const postwiseJS = <?php echo json_encode($postwise); ?>;
                                // console.log($postwiseJS)

                                const dateChartJS = postwiseJS.map((day, index) => {
                                    let dayjs = new Date(day);
                                    return dayjs.setHours(0, 0, 0, 0);
                                });
                                // setup 
                                const data = {
                                    labels: dateChartJS,
                                    datasets: [{
                                            label: 'Users',
                                            data: <?php echo json_encode($user_count); ?>,
                                            backgroundColor: ['rgb(252, 103, 3)'],
                                            borderWidth: 1
                                        },
                                        {
                                            label: 'freelancer',
                                            data: <?php echo json_encode($freelance_count); ?>,
                                            backgroundColor: ['rgb(241, 38, 81)'],
                                            borderWidth: 1
                                        },
                                        {
                                            label: 'business',
                                            data: <?php echo json_encode($business_count); ?>,
                                            backgroundColor: ['rgb(237, 10, 118)'],
                                            borderWidth: 1
                                        }
                                    ]
                                };

                                // config 
                                const config = {
                                    type: 'bar',
                                    data,
                                    options: {
                                        // autoSkip: false,
                                        scales: {
                                            x: {
                                                ticks: {
                                                    color: '#fff'
                                                },
                                                stacked: true,
                                                type: 'time',
                                                time: {
                                                    unit: 'month'
                                                },
                                                gridLines: {
                                                    display: false
                                                }
                                            },
                                            y: {
                                                ticks: {
                                                    color: '#fff'
                                                },
                                                beginAtZero: true,
                                                stacked: true
                                            }
                                        }
                                    }
                                };

                                // render init block
                                const mycharter = new Chart(
                                    document.getElementById('mycharter'),
                                    config
                                );

                                //start date filter
                                function startDatefilter(date) {
                                    const startDate = new Date(date.value);
                                    console.log(startDate.setHours(0, 0, 0, 0));
                                    mycharter.config.options.scales.x.min = startDate.setHours(0, 0, 0, 0);
                                    mycharter.update();
                                }

                                //end date filter
                                function endDatefilter(date) {
                                    const endDate = new Date(date.value);
                                    console.log(endDate.setHours(0, 0, 0, 0));
                                    mycharter.config.options.scales.x.max = endDate.setHours(0, 0, 0, 0);
                                    mycharter.update();
                                }

                                //reset
                                function resetChart() {
                                    mycharter.data.datasets[0].data = data;
                                    mycharter.data.labels = labels;
                                    mycharter.update();
                                }

                            </script>
                        </div>

                        <div class="row h-100 py-3">
                           
                           <?php include 'postvscat.php' ?>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- <script>
            function myFunction() {
                document.getElementById("cat").submit();
            }
        </script> -->

</html>