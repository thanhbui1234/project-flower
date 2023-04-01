<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Sản phẩm
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $countProducts ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-mobile-screen-button fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Loại sản phẩm
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $countCategories ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-table fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Người dùng
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php echo $countUsers ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Bình Luận
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $countComments ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-comment  fa-2x text-gray-300 "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Sản phẩm có nhiều lượt xem nhất
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    foreach ($dataViewMax as $viewMax) {
                                        // print_r($viewMax);
                                        echo $viewMax['name'];
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-mobile-screen-button fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- GOOGLE CHART -->
    <h2 class="text-center">Biểu đồ</h2>
    <div id="chart">
        <canvas id="myChart"></canvas>
    </div>


    <!-- Content Row -->


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Sản phẩm', 'Loại sản phẩm', 'Người dùng', 'Bình luận'],
                datasets: [{
                    label: 'Đơn vị',
                    data: [
                        <?php echo $countProducts ?>,
                        <?php echo $countCategories ?>,
                        <?php echo $countUsers ?>,
                        <?php echo $countComments ?>,

                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <!-- END GOOGLE CHART -->

    <style>
        #chart {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>


</div>