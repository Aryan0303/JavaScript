<?php
$pageTitle = "Products";
include('../header/header.php');
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    /* cards */
  
    /* .card {
        border-radius:;
        bx-shadow:o 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    } */
        .card-title {
            color: #7258db;
        } 
        p.d-flex.align-items-center.mb-1 {
            color: #7258db;
            font-size: 23px;
        }
        /* cards  end  */




    </style>

<div class="container ">
    <!-- cards start  -->
        <div class="row">
        <div class="col-md-3">
    <div class="card l-bg-cherry">
        <div class="card-statistic-3 p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="fas fa-box me-2"></i> Total Product</h5>
                <p class="d-flex align-items-center mb-1">10</p>
            </div>
        </div>
    </div>
</div>



          <div class="col-md-3">
                <div class="card l-bg-cherry">
                    <div class="card-statistic-3 p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title "><i class="fas fa-check-circle me-2"></i>In-Stock</h5>
                            <p class="d-flex align-items-center mb-1 ">
                                32
                            </p>
                        </div>
                    </div>
                </div>
          </div>

          <div class="col-md-3">
                <div class="card l-bg-cherry">
                    <div class="card-statistic-3 p-4">
                        <div class=" d-flex justify-content-between align-items-center">
                            <h5 class="card-title "><i class="fas fa-times-circle me-2"></i>Out-Stock</h5>
                            <p class="d-flex align-items-center mb-1 ">
                                43
                            </p>
                        </div>
                    </div>
                </div>
          </div>

          <div class="col-md-3">
                <div class="card l-bg-cherry">
                    <div class="card-statistic-3 p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title " style="font-size: 18px;"><i class="fas fa-exclamation-triangle me-1
                            "></i>Reached Limit</h5>
                            <p class="d-flex align-items-center mb-1 ">
                                324
                            </p>
                        </div>
                    </div>
                </div>
          </div>

          
        </div>
        <!-- cards end/ -->


        
        <!-- graphs   -->
        <div class="row  mt-4">
                <div class="col-md-6 me-5">
                    <canvas id="histogramChart" width="300" height="200"></canvas>
                </div>
                <div class="col-md-5">
                    <div style="height: 300px; width: 300px;">
                     <canvas id="pieChart" width="300" height="300"></canvas>
                   </div>
         </div>
        <!-- graphs end  -->
</div>

<script>
    
    // Chart.js code for histogram chart
    var histogramCtx = document.getElementById('histogramChart').getContext('2d');
    var topProducts = ['Collar', 'Leash', 'Harness', 'Bed', 'Toy', 'Balls']; // Top 6 selling products
    var histogramData = [10, 8, 15, 5, 12, 7]; // Corresponding sales data for each product

    // Calculate the total number of products
    var totalProducts = histogramData.reduce(function (acc, val) {
        return acc + val;
    }, 0);

    // Chart configuration
    var histogramChart = new Chart(histogramCtx, {
        type: 'bar',
        data: {
            labels: topProducts,
            datasets: [{
                label: 'Purchased Data  ',
                backgroundColor: '#7258db',
                data: histogramData,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            legend: {
                display: false
            },
            plugins: {
                datalabels: {
                    anchor: 'end',
                    align: 'end',
                    color: '#7258db',
                    font: {
                        weight: 'bold'
                    },
                    formatter: function (value, context) {
                        return value;
                    }
                }
            }
        }
    });

    
    //  code for pie chart
    var pieCtx = document.getElementById('pieChart').getContext('2d');
        var pieData = [25, 35, 20, 10, 10]; 
        var pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Dogs', 'Cats', 'Birds', 'Small Pets', 'Reptiles'], 
                datasets: [{
                    label: 'Pie Chart',
                    backgroundColor: ['#7258db', '#9b7ede', '#c8b1e6', '#b3b3cc', '#ffc299'], 
                    data: pieData,
                }]
            },
            options: {
                legend: {
                    display: true,
                    position: 'bottom', 
                    labels: {
                        boxwidth:10,
                    }
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data) {
                            var dataset = data.datasets[tooltipItem.datasetIndex];
                            var total = dataset.data.reduce(function (previousValue, currentValue, currentIndex, array) {
                                return previousValue + currentValue;
                            });
                            var currentValue = dataset.data[tooltipItem.index];
                            var percentage = ((currentValue / total) * 100).toFixed(2) + "%";
                            return data.labels[tooltipItem.index] + ": " + percentage;
                        }
                    }
                },
                hover: {
                    onHover: function (event, elements) {
                        event.target.style.cursor = elements[0] ? 'pointer' : 'default';
                    }
                }
            }
        });
</script>


<?php include_once("../foot.php") ?>
