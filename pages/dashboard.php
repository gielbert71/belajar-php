<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard & Array</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="path-to-adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../assets/css/stylespro.css">
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
            <h1 style="text-align: center;"><a href="../index.html" class="linkurl">Product</a></h1>
            <div class="produk-etalase">
                <?php
                $produk = array(
                    array(
                        "gambar" => "../assets/images/products/cbr.webp",
                        "nama" => "Honda CBR1000RR 2017",
                        "deskripsi" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                        "harga" => "Rp700.000.000"
                    ),
                    array(
                        "gambar" => "../assets/images/products/r1m.jpg",
                        "nama" => "Yamaha YZF-R1M 2022",
                        "deskripsi" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                        "harga" => "Rp812.000.000"
                    ),
                    array(
                        "gambar" => "../assets/images/products/v4r.webp",
                        "nama" => "Ducati V4R",
                        "deskripsi" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                        "harga" => "Rp2.400.000.000"
                    ),
                    array(
                        "gambar" => "../assets/images/products/zx10r.png",
                        "nama" => "Kawasaki Ninja ZX-10R",
                        "deskripsi" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                        "harga" => "Rp492.000.000"
                    ),
                    array(
                        "gambar" => "../assets/images/products/nsx.jpg",
                        "nama" => "Honda NSX Type-R",
                        "deskripsi" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                        "harga" => "Rp6.193.000.000"
                    ),
                    array(
                        "gambar" => "../assets/images/products/supra.webp",
                        "nama" => "Toyota Supra A80",
                        "deskripsi" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                        "harga" => "Rp2.100.000.000"
                    ),
                    array(
                        "gambar" => "../assets/images/products/skyline.png",
                        "nama" => "Nissan Skyline R34",
                        "deskripsi" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                        "harga" => "Rp2.400.000.000"
                    ),
                    array(
                        "gambar" => "../assets/images/products/rx7.webp",
                        "nama" => "Mazda RX7 FD3S",
                        "deskripsi" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                        "harga" => "Rp2.100.000.000"
                    )
                );

                foreach ($produk as $item) {
                    echo '<div class="produk-box">';
                    echo '<img class="produk-gambar" src="' . $item["gambar"] . '" alt="' . $item["nama"] . '">';
                    echo '<h2 class="produk-nama">' . $item["nama"] . '</h2>';
                    echo '<p>' . $item["deskripsi"] . '</p>';
                    echo '<p class="produk-harga">' . $item["harga"] . '</p><br>';
                    echo '<center>';
                    echo '<a href="#" type="submit" class="produk-beli">Pesan</a>';
                    echo '</center>';
                    echo '<br>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <script src="../assets/adminlte/plugins/jquery/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="../assets/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</body>

</html>