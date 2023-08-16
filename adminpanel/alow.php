<?php
include "connect.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Getting Started with Chart JS with www.chartjs3.com</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .chartMenu {
            width: 100vw;
            height: 40px;
            background: #1A1A1A;
            color: rgba(255, 26, 104, 1);
        }

        .chartMenu p {
            padding: 10px;
            font-size: 20px;
        }

        .chartCard {
            width: 100vw;
            height: calc(100vh - 40px);
            background: rgba(255, 26, 104, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chartBox {
            width: 700px;
            padding: 20px;
            border-radius: 20px;
            border: solid 3px rgba(255, 26, 104, 1);
            background: white;
        }
    </style>
</head>

<body>
    <div id="chart" class="tabcontent container-fluid">
        <div class="col-12 py-3">
            <div class="card shadow rounded-3 p-2">
                <input type="date" onchange="startDatefilter(this)">
                <input type="date" onchange="endDatefilter(this)">
                <canvas id="myChart"></canvas>
            </div>


            <?php
            $count =  "SELECT DISTINCT (DATE(created_at)) AS unique_date, COUNT(*) AS amount
                                   FROM users
                                   GROUP BY unique_date
                                   ORDER BY unique_date ASC";
            $day = mysqli_query($conn, $count);

            foreach ($day as $data) {
                $daywise[] = $data['unique_date'];
                $daycount[] = $data['amount'];
            }
            unset($result);
            ?>

            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
            <script>
                const daywiseJS = <?php echo json_encode($daywise); ?>;
                // console.log($daywiseJS)

                const dateChartJS = daywiseJS.map((day, index) => {
                    let dayjs = new Date(day);
                    return dayjs.setHours(0, 0, 0, 0);
                });
                // setup 
                const data = {
                    labels: dateChartJS,
                    datasets: [{
                        label: 'dateArray',
                        data: <?php echo json_encode($daycount); ?>,
                        backgroundColor: ['rgba(255, 26, 104, 0.2)'],
                        borderColor: ['rgba(255, 26, 104, 1)'],
                        borderWidth: 1
                    }]
                };

                // config 
                const config = {
                    type: 'bar',
                    data,
                    options: {
                        // autoSkip: false,
                        scales: {
                            x: {
                                type: 'time',
                                time: {
                                    unit: 'day'
                                }
                            },
                            y: {
                                beginAtZero: true
                            }
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
            </script>
        </div>
</body>
</html>