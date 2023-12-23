<?php
include_once("koneksi.php");
include_once("products.php");

$db = new Database();
$product = new Product($db);

$items = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$products = $product->getProducts($items, $page);
$totalPages = $product->getTotalPages($items);

date_default_timezone_set('Asia/Jakarta');


function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $hari = array(
        1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );

    $pecahkan = explode('-', $tanggal);
    return $hari[date('N', strtotime($tanggal))] . ', ' . $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0] . ' ' . date('H:i:s');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="../assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="path-to-adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../assets/css/stylespro.css">
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
        <!-- <nav class="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="../index.html">Index</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login-layout.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
            </ul>
        </nav> -->

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="index3.html" class="brand-link">
                <img src="../assets/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>


            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Gielbert Whilton</a>
                    </div>
                </div>

                <div class="form-inline">
                    <form action="crud-products.php" method="get">
                        <div class="input-group">

                            <input class="form-control form-control-sidebar" type="text" name="query" placeholder="Cari produk..." aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar" type="submit" value="Search">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>

                    </form>
                </div>
            </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Pages
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Login</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="crud-products.php" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CRUD Products</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>

    </div>

    </aside>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg bg-dark position-fixed" style="width: 100%; margin-top: -60px;">
            <a class="navbar-brand" style="color: #fff; margin-left:20px;" href="product.html">Product</a>
            <?php
            echo tgl_indo(date('Y-m-d'));
            ?>
        </nav>
        <h1 style="text-align: center;"><a href="../index.html" class="linkurl">Product</a></h1>
        <center>

            <form action="crud-products.php" method="get">
                <input type="text" name="query" placeholder="Cari..."> &nbsp;
                <input type="submit" value="Search">
            </form>
            <br>
        </center>
        <div>
            <center>
                <a href="create.php" class="produk-beli">Create</a>
            </center>
        </div>
        <div class="produk-etalase">
            <?php
            include_once('../koneksi.php');
            include_once('products.php');

            $db = new Database();
            $product = new Product($db);

            $result = $product->getProducts($items, $page);

            $categories = array();

            $kategori = $conn->query("SELECT * FROM product_categories");

            while ($category = $kategori->fetch_assoc()) {
                $categories[$category['id']] = $category['category_name'];
            }

            while ($row = $result->fetch_assoc()) {
                echo '<div class="produk-box">';
                echo '<h2 class="produk-nama">' . $row["product_name"] . '</h2>';
                echo '<p>' . $row["product_code"] . '</p>';

                if (isset($categories[$row['category_id']])) {
                    echo '<p>' . $categories[$row['category_id']] . '</p>';
                }

                echo '<p>' . $row["description"] . '</p>';
                echo '<p class="produk-harga">Rp' . $row["price"] . '</p><br>';
                echo '<center>';
                echo '<a href="update.php?id=' . $row['id'] . '" class="produk-beli">Update</a>';
                echo '<br><br><a href="delete.php?id=' . $row['id'] . '" class="produk-beli">Delete</a>';
                echo '</center>';
                echo '<br>';
                echo '</div>';
            }
            ?>

            <?php
            if (isset($_GET['query'])) {
                $search = $_GET['query'];
                $sqlsearch = "SELECT * FROM products WHERE product_name LIKE '%$search%' OR category_id LIKE '%$search%' OR description LIKE '%$search%'";
                $hasilsearch = $conn->query($sqlsearch);
                if ($hasilsearch) {
                    if ($hasilsearch->num_rows > 0) {

                        while ($row = $hasilsearch->fetch_assoc()) {
                            echo '<div class="produk-box">';
                            echo '<img class="produk-gambar" src="uploads/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
                            echo '<h2 class="produk-nama">' . $row["product_name"] . '</h2>';
                            echo '<p>' . $row["product_code"] . '</p>';
                            if (isset($categories[$row['category_id']])) {
                                echo '<p>' . $categories[$row['category_id']] . '</p>';
                            }
                            echo '<p>' . $row["description"] . '</p>';
                            echo '<p class="produk-harga">Rp' . $row["price"] . '</p><br>';
                            echo '<center>';
                            echo '<a href="update.php?id=' . $row['id'] . '" class="produk-beli">Update</a>';
                            echo '<br><br><a href="delete.php?id=' . $row['id'] . '" class="produk-beli">Delete</a>';
                            echo '</center>';
                            echo '<br>';
                            echo '</div>';
                        }
                    } else {
                        echo "No results found.";
                    }
                } else {
                    echo "Error in executing the query: " . $mysqli->error;
                }
            }
            ?>
        </div>
        <br>

        <div style="align-items: center;">
            <center>
                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo "<a href='?page=$i' class='produk-beli'>$i</a> ";
                }
                ?>
            </center>
        </div>
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../assets/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../assets/adminlte/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../assets/adminlte/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../assets/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../assets/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../assets/adminlte/plugins/moment/moment.min.js"></script>
    <script src="../assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/adminlte/dist/js/adminlte.js"></script>
    <script src="../assets/adminlte/dist/js/pages/dashboard.js"></script>
    <script src="../assets/adminlte/plugins/jquery/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="../assets/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</body>

</html>