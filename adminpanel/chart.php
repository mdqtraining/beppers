<?php
                                    include 'connect.php';
       $search_result = mysqli_query($conn, $search);

if(mysqli_connect_errno())
{
    echo "Failed to connect db:".mysqli_connect_error();
}
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
    <div class="chartMenu">
        <p>WWW.CHARTJS3.COM (Chart JS 3.7.1)</p>
    </div>
    <div class="chartCard">
        <div class="chartBox">
            <input type="date" onchange="startDatefilter(this)">
            <input type="date" onchange="endDatefilter(this)">
            <button onclick="resetChart()">Reset</button>
            <canvas id="myChart"></canvas>
        </div>
    

    <?php
        $sql = "SELECT * FROM  chartjs.telsa";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($result);
        if($row > 0){
            while($row=mysqli_fetch_array($result)){
                $dateArray[] = $row['date'];
                $priceArray[] = $row['price'];
            }
            unset($result);
        }else{

            echo 'No results in DB';
        }

    unset($result);
    ?>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>    <script>
        const dateArrayJS = <?php echo json_encode($dateArray); ?>;
        // console.log($dateArrayJS)

        const dateChartJS = dateArrayJS.map((day,index) => {
            let dayjs = new Date(day);
            return dayjs.setHours(0,0,0,0);
        });
        // setup 
        const data = {
            labels: dateChartJS,
            datasets: [{
                label: 'dateArray',
                data: <?php echo json_encode($priceArray); ?>,
                backgroundColor:
                ['rgba(255, 26, 104, 0.2)'],
                borderColor:
                ['rgba(255, 26, 104, 1)'],
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
        function startDatefilter(date){
            const startDate = new Date(date.value);
            console.log(startDate.setHours(0,0,0,0));
            myChart.config.options.scales.x.min = startDate.setHours(0,0,0,0);
            myChart.update();
        }

        //end date filter
        function endDatefilter(date){
            const endDate = new Date(date.value);
            console.log(endDate.setHours(0,0,0,0));
            myChart.config.options.scales.x.max = endDate.setHours(0,0,0,0);
            myChart.update();
        }

        function resetChart(){
            myChart.data.datasets[0].data = data;
            myChart.data.labels = labels;
            myChart.update();
        }
    </script>
    </div>

</body>

</html>