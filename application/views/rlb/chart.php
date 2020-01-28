<script type="text/javascript">
  var canvas = document.getElementById("barChart");
  var ctx = canvas.getContext('2d');

  // Global Options:
  Chart.defaults.global.defaultFontColor = 'black';
  Chart.defaults.global.defaultFontSize = 16;

  var data = {
    labels: [
      <?php 
          foreach ($rlb as $data) {
            echo '"'.date('M-Y', ($data->bulan - 25569) * 86400).'",';
          }
      ?>
    ],
    datasets: [{
        label: "Jumlah Pelanggan",
        fill: false,
        lineTension: 0.1,
        //backgroundColor: "rgba(225,0,0,0.4)",
        borderColor: "red", // The main line color
        borderCapStyle: 'square',
        borderDash: [], // try [5, 15] for instance
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        pointBorderColor: "black",
        pointBackgroundColor: "white",
        pointBorderWidth: 1,
        pointHoverRadius: 8,
        pointHoverBackgroundColor: "yellow",
        pointHoverBorderColor: "brown",
        pointHoverBorderWidth: 2,
        pointRadius: 4,
        pointHitRadius: 10,
        // notice the gap in the data and the spanGaps: true
        data: [<?php 
          foreach ($rlb as $data) {
            echo $data->jumlah_pelanggan.',';
          }
         ?>],
        spanGaps: true,
      }, {
        label: "Jumlah Produk",
        fill: true,
        lineTension: 0.1,
        //backgroundColor: "rgba(167,105,0,0.4)",
        borderColor: "blue",
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        pointBorderColor: "white",
        pointBackgroundColor: "black",
        pointBorderWidth: 1,
        pointHoverRadius: 8,
        pointHoverBackgroundColor: "brown",
        pointHoverBorderColor: "yellow",
        pointHoverBorderWidth: 2,
        pointRadius: 4,
        pointHitRadius: 10,
        // notice the gap in the data and the spanGaps: false
        data: [
          <?php 
          foreach ($rlb as $data) {
            echo $data->jumlah_produk.',';
          }
         ?>
        ],
        spanGaps: true,
      }, {
        label: "Pendapatan",
        fill: true,
        lineTension: 0.1,
        //backgroundColor: "rgba(167,105,0,0.4)",
        borderColor: "green",
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        pointBorderColor: "white",
        pointBackgroundColor: "black",
        pointBorderWidth: 1,
        pointHoverRadius: 8,
        pointHoverBackgroundColor: "brown",
        pointHoverBorderColor: "yellow",
        pointHoverBorderWidth: 2,
        pointRadius: 4,
        pointHitRadius: 10,
        // notice the gap in the data and the spanGaps: false
        data: [
          <?php 
          foreach ($rlb as $data) {
            echo $data->pendapatan.',';
          }
         ?>
        ],
        spanGaps: true,
      }

    ]
  };

  // Notice the scaleLabel at the same level as Ticks
  var options = {
    responsive: true,
    title: {
      display: true,
      text: 'Relasi Linear Berganda'
    },
    scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  },
                  scaleLabel: {
                       display: true,
                       labelString: 'Relasi Linear Berganda',
                       fontSize: 20 
                    }
              }]            
          }  
  };

  // Chart declaration:
  var myBarChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: options
  });
</script>


<!-- barchart1 -->
<script type="text/javascript">
  var canvas = document.getElementById("barChart1");
  var ctx = canvas.getContext('2d');

  // Global Options:
  Chart.defaults.global.defaultFontColor = 'black';
  Chart.defaults.global.defaultFontSize = 16;

  var data = {
    labels: [
      <?php 
          foreach ($rlb as $data) {
            echo $data->jumlah_pelanggan.",";
          }
      ?>
    ],
    datasets: [{
        label: "Pendapatan",
        fill: false,
        lineTension: 0.1,
        backgroundColor: "rgba(225,0,0,0.4)",
        borderColor: "red", // The main line color
        borderCapStyle: 'square',
        borderDash: [], // try [5, 15] for instance
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        pointBorderColor: "black",
        pointBackgroundColor: "white",
        pointBorderWidth: 1,
        pointHoverRadius: 8,
        pointHoverBackgroundColor: "yellow",
        pointHoverBorderColor: "brown",
        pointHoverBorderWidth: 2,
        pointRadius: 4,
        pointHitRadius: 10,
        // notice the gap in the data and the spanGaps: true
        data: [<?php 
          foreach ($rlb as $data) {
            echo $data->pendapatan.',';
          }
         ?>],
        spanGaps: true,
      }
    ]
  };

  // Notice the scaleLabel at the same level as Ticks
  var options = {
    responsive: true,
    title: {
      display: true,
      text: 'Jumlah Pelanggan'
    },
    scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  },
                  scaleLabel: {
                       display: true,
                       labelString: 'Relasi Linear Berganda',
                       fontSize: 20 
                    }
              }]            
          }  
  };

  // Chart declaration:
  var myBarChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: options
  });
</script>

<!-- barchart2 -->
<script type="text/javascript">
  var canvas = document.getElementById("barChart2");
  var ctx = canvas.getContext('2d');

  // Global Options:
  Chart.defaults.global.defaultFontColor = 'black';
  Chart.defaults.global.defaultFontSize = 16;

  var data = {
    labels: [
      <?php 
          foreach ($rlb as $data) {
            echo $data->jumlah_produk.",";
          }
      ?>
    ],
    datasets: [{
        label: "Pendapatan",
        fill: false,
        lineTension: 0.1,
        backgroundColor: "rgba(0, 0, 255, 0.4)",
        borderColor: "blue", // The main line color
        borderCapStyle: 'square',
        borderDash: [], // try [5, 15] for instance
        borderDashOffset: 1.0,
        borderJoinStyle: 'miter',
        pointBorderColor: "black",
        pointBackgroundColor: "white",
        pointBorderWidth: 1,
        pointHoverRadius: 8,
        pointHoverBackgroundColor: "yellow",
        pointHoverBorderColor: "brown",
        pointHoverBorderWidth: 2,
        pointRadius: 4,
        pointHitRadius: 10,
        // notice the gap in the data and the spanGaps: true
        data: [<?php 
          foreach ($rlb as $data) {
            echo $data->pendapatan.',';
          }
         ?>],
        spanGaps: true,
      }
    ]
  };

  // Notice the scaleLabel at the same level as Ticks
  var options = {
    responsive: true,
    title: {
      display: true,
      text: 'Jumlah Produk'
    },
    scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true,
                  },
                  scaleLabel: {
                       display: true,
                       labelString: 'Relasi Linear Berganda',
                       fontSize: 20 
                    }
              }]            
          }  
  };

  // Chart declaration:
  var myBarChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: options
  });
</script>