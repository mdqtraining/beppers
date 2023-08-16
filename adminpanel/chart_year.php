<?php include 'header.php'; ?>
<style>
    .body_color {
        background-color: #2d2e37 !important;
        color: #fc6703;
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
                    Users Chart
                </h4>
                </div>
                <div class="col-6">
                    <div class="float-end">
                    <a href="charts.php"> <button class="btn">Day</button></a>
                    <a href="chart_week.php"> <button class="btn">Week</button></a>
                   <a href="chart_month.php"> <button class="btn">Month</button></a>
                  
                </div>
                </div>
                </div>
                <div id="chart" class="tabcontent container-fluid d-flex justify-content-center align-items-center">
                    <div class="col-10 pb-3">
                        <div class="card shadow rounded-3 p-2" style="background-color: #111420; color: #fff;">
                            <div>
                                <input type="date" onchange="startDatefilter(this)">
                                <input type="date" onchange="endDatefilter(this)">
                                <!-- <button onclick="resetChart()">Reset</button> -->
                                <canvas id="myChart"></canvas>
                            </div>
                            <?php
                            $usercount = "SELECT DISTINCT (DATE(created_at)) AS user_date, COUNT(*) AS usercount
                                   FROM users where type= 'user'
                                   GROUP BY user_date
                                   ORDER BY user_date ASC";
                            $day = mysqli_query($conn, $usercount);

                            foreach ($day as $data) {
                                $day_count[] = $data['user_date'];
                                $user_count[] = $data['usercount'];
                            }
                            $businesscount =  "SELECT DISTINCT (DATE(created_at)) AS user_date, COUNT(*) AS business
                            FROM users where type = 'business'
                            GROUP BY user_date
                            ORDER BY business ASC";
                            $day1 = mysqli_query($conn, $businesscount);

                            foreach ($day1 as $data1) {
                                $day_count[] = $data1['user_date'];
                                $business_count[] = $data1['business'];
                            }
                            $freelancecount =  "SELECT DISTINCT (DATE(created_at)) AS user_date, COUNT(*) AS freelance
                     FROM users where type = 'freelance'
                     GROUP BY user_date
                     ORDER BY freelance ASC";
                            $day2 = mysqli_query($conn, $freelancecount);

                            foreach ($day2 as $data2) {
                                $day_count[] = $data2['user_date'];
                                $freelance_count[] = $data2['freelance'];
                            }


                            ?>
                            <script>
                                const daywiseJS = <?php echo json_encode($day_count); ?>;
                                // console.log($daywiseJS)

                                const datesChartJS = daywiseJS.map((day, index) => {
                                    let dayjs = new Date(day);
                                    return dayjs.setHours(0, 0, 0, 0);
                                });
                                // setup 
                                const data = {
                                    labels: datesChartJS,
                                    datasets: [{
                                            label: 'Users',
                                            data: <?php echo json_encode($user_count); ?>,
                                            backgroundColor: ['rgb(252, 103, 3)'],
                                            borderWidth: 1
                                        }, {
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
                                                    unit: 'day'
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
                                                stacked: true,
                                               
                                            },

                                        }
                                    }
                                };

                                // render init block
                                const myChart = new Chart(
                                    document.getElementById('myChart'),
                                    config
                                );
                                //start date filter
                                function startDatefilter(date) {
                                    const startDate = new Date(date.value);
                                    console.log(startDate.setHours(0, 0, 0, 0));
                                    myChart.config.options.scales.x.min = startDate.setHours(0, 0, 0, 0);
                                    myChart.update();
                                }

                                //end date filter
                                function endDatefilter(date) {
                                    const endDate = new Date(date.value);
                                    console.log(endDate.setHours(0, 0, 0, 0));
                                    myChart.config.options.scales.x.max = endDate.setHours(0, 0, 0, 0);
                                    myChart.update();
                                }

                                //reset
                                function resetChart() {
                                    myChart.data.datasets[0].data = data;
                                    myChart.data.labels = labels;
                                    myChart.update();
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>