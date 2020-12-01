@extends('template')
@section('title', 'Dashboard')
@section('content')
    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <p class="mb-4">Berikut adalah grafik pengeluaran uang perbulan untuk gaji.</p>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <canvas id="chartGaji" width="400" height="400"></canvas>
        </div>
    </div>
    <!-- Content Row -->
@endsection

@section('dashboard.js')
<script type="text/javascript">
    function chartGaji(){
        $.ajax({
            type : 'GET',
            url : '/dashboard/chart-gaji',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                var data = response.data;
                var result = [];
                var labels = [];
                var ctx;

                console.log(response);

                ctx = $('#chartGaji');

                for (var i = 0; i < data.length; i++) {
                    result.push(data[i].total_gaji);
                    labels.push(data[i].bulan_label);
                }

                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total Gaji',
                            data: result,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            },
            error: function(error){
                console.log(error);
            }
        })
    }
    chartGaji();
</script>
@endsection