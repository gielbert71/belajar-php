<?php
include_once("koneksi.php");

$queryproduk = "SELECT COUNT(*) as jumlahproduk FROM products;";
$querycustomer = "SELECT COUNT(*) as jumlahcustomer FROM customers";
$queryvendor = "SELECT COUNT(*) as jumlahvendor FROM vendors";

$dataproduk = mysqli_query($conn, $queryproduk);
$datacustomer = mysqli_query($conn, $querycustomer);
$datavendor = mysqli_query($conn, $queryvendor);
$rowproduk = mysqli_fetch_assoc($dataproduk);
$rowcustomer = mysqli_fetch_assoc($datacustomer);
$rowvendor = mysqli_fetch_assoc($datavendor);
$jumlahproduk = $rowproduk['jumlahproduk'];
$jumlahcustomer = $rowcustomer['jumlahcustomer'];
$jumlahvendor = $rowvendor['jumlahvendor'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../assets/css/stylespro.css">
    <link rel="stylesheet" href="../assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../assets/adminlte/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../assets/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../assets/adminlte/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../assets/adminlte/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <style>    
    .fixed-top {
            z-index: 1030 !important;
        }

        .sidebar {
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: #fff;
            z-index: 1020;
        }

        .main-content {
            margin-left: 250px;
            padding-top: 60px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <nav class="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="../index.html">Index</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login-layout.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.html">Dashboard</a>
                </li>
            </ul>
        </nav>
        <div class="main-content">
            <nav class="navbar navbar-expand-lg bg-dark position-fixed" style="width: 100%; margin-top: -60px;">
                <a class="navbar-brand" href="product.html">Product</a>
            </nav>
            <h1 style="text-align: center;">Statistics</h1>
            <br>
            <div class="row" style="margin-left: 20px;">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        
                        <div class="inner">
                            <h3><?php echo $jumlahproduk ?></h3>
                            <p>Products</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="crud-products.php" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        
                        <div class="inner">
                            <h3><?php echo $jumlahcustomer ?></h3>
                            <p>Customers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        
                        <div class="inner">
                            <h3><?php echo $jumlahvendor ?></h3>
                            <p>Vendors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
            </div>
            <!-- <div class="produk-etalase">
            </div> -->
        </div>
        <script src="../assets/adminlte/plugins/jquery/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="../assets/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</body>

</html>