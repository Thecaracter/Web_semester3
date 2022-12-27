<?php
$koneksi = mysqli_connect("localhost", "root", "", "koperasi");
$nm_simpana = mysqli_query($koneksi, "SELECT * FROM simpanan WHERE produk='nm_simpanan'");
$besar_simpanan = mysqli_query($koneksi, "SELECT * FROM simpanan WHERE produk='besar_simpanan'");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Linchart PHP dan MySQL Demo Grafik Garis</title>
  <script src="js/Chart.js"></script>
  <style type="text/css">
    .container {
      width: 40%;
      margin: 15px auto;
    }
  </style>
</head>

<body>

  <div class="container">
    <canvas id="linechart" width="200" height="200"></canvas>
  </div>

</body>

</html>

<script type="text/javascript">
  var ctx = document.getElementById("linechart").getContext("2d");
  var data = 
  {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: 
    {
        label: "nm_simpana",
        fill: false,
        lineTension: 0.1,
        backgroundColor: "#29B0D0",
        borderColor: "#29B0D0",
        pointHoverBackgroundColor: "#29B0D0",
        pointHoverBorderColor: "#29B0D0",
        data: [<?php while ($p = mysqli_fetch_array($laptop)) {
          echo '"' . $p['jan'] . '","' . $p['feb'] . '","' . $p['mar'] . '","' . $p['apr'] . '","' . $p['may'] . '","' . $p['jun'] . '","' . $p['jul'] . '","' . $p['aug'] . '","' . $p['sep'] . '","' . $p['oct'] . '","' . $p['nov'] . '","' . $p['dec'] . '",';
    } ?>]
  },
   
    {
    label: "besar_simpanan",
      fill: false,
        lineTension: 0.1,
          backgroundColor: "#CBE0E3",
            borderColor: "#CBE0E3",
              pointHoverBackgroundColor: "#CBE0E3",
                pointHoverBorderColor: "#CBE0E3",
                  data: [<?php while ($p = mysqli_fetch_array($printer)) {
                    echo '"' . $p['jan'] . '","' . $p['feb'] . '","' . $p['mar'] . '","' . $p['apr'] . '","' . $p['may'] . '","' . $p['jun'] . '","' . $p['jul'] . '","' . $p['aug'] . '","' . $p['sep'] . '","' . $p['oct'] . '","' . $p['nov'] . '","' . $p['dec'] . '",';
      } ?>]
    
  };

  var myBarChart = new Chart(ctx, 
  {
    type: 'line',
    data: data,
    options: 
    {
      legend: {
        display: true
      },
      barValueSpacing: 20,
      scales: {
        yAxes: [{
          ticks: {
            min: 0,
          }
        }],
        xAxes: [{
          gridLines: {
            color: "rgba(0, 0, 0, 0)",
          }
        }]
      }
    }
  });
</script>