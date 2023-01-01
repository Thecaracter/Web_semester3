<!DOCTYPE html>
<html>

<head>
    <title>Contoh Penggunaan BarsGraph</title>
    <style type="text/css">
        BODY {
            /* width: 550PX; */
            height: 500%;
            width: 100%;
            margin: 0 auto;

        }

        #chart-container {
            width: auto;
            height: auto;
        }
    </style>
    <!-- <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="vendor/chart.js/Chart.min.js"></script> -->
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>

</head>

<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });

        function showGraph() {
            {
                $.post("bar_encode.php",
                    function (data) {
                        console.log(data);
                        var id = [];
                        var jual = [];
                        var nama = [];
                        for (var i in data) {
                            id.push(data[i].id);
                            jual.push(data[i].besar_simpanan);
                            nama.push(data[i].tgl_simpanan)
                        }
                        var chartdata = {
                            labels: nama,
                            datasets: [
                                {
                                    label: 'simpanan',
                                    backgroundColor: '#0045a5',
                                    borderColor: '#0b1d78',
                                    hoverBackgroundColor: '#00c698',
                                    hoverBorderColor: '#00a9b5',
                                    borderWidth: 1,
                                    data: jual
                                }
                            ]
                        };
                        
                        var graphTarget = $('#graphCanvas');

                        var chartOptions = {
                        legend: {
                            position: 'bottom'
                        }
                        };

                        var barGraph = new Chart(graphTarget, {
                            type: 'bar',
                            data: chartdata,
                            options: chartOptions

                        });
                    });
            }
        }
    </script>
</body>

</html>