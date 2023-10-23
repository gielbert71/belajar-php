<?php
include_once("koneksi.php");
$items = 2;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $items;

$sql = "SELECT * FROM products ORDER BY id DESC LIMIT $items OFFSET $offset";
$result = mysqli_query($conn, $sql);

$totalRecords = mysqli_query($conn, "SELECT COUNT(*) FROM products")->fetch_row()[0];
$totalPages = ceil($totalRecords / $items);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard & Array</title>
    <link rel="stylesheet" href="../assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
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
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
            </ul>
        </nav>
        <div class="main-content">
            <nav class="navbar navbar-expand-lg bg-dark position-fixed" style="width: 100%; margin-top: -60px;">
                <a class="navbar-brand" style="color: #fff; margin-left:20px;" href="product.html">Product</a>
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
                $categories = array();
                $kategori = mysqli_query($conn, "SELECT * FROM product_categories");
                while ($category = $kategori->fetch_assoc()) {
                    $categories[$category['id']] = $category['category_name'];
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="produk-box">';
                    echo '<img class="produk-gambar" src="' . $row["image"] . '" alt="' . $row["product_name"] . '">';
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
                                echo '<img class="produk-gambar" src="' . $row["image"] . '" alt="' . $row["product_name"] . '">';
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
        <script src="../assets/adminlte/plugins/jquery/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="../assets/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</body>

</html>