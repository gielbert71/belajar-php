<?php
include_once("koneksi.php");

$kategori = "SELECT * FROM product_categories";
$result_kategori = mysqli_query($conn, $kategori);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST["product_name"];
    $category_id = $_POST["category_id"];
    $product_code = $_POST["product_code"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    $insert_query = "INSERT INTO products (product_name, category_id, product_code, description, price) VALUES ('$product_name', '$category_id', '$product_code', '$description', '$price')";
    if (mysqli_query($conn, $insert_query)) {
        header("Location: crud-products.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

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
                <a class="navbar-brand" href="product.html">Product</a>
            </nav>
            <h1 style="text-align: center;"><a href="../index.html" class="linkurl">Product</a></h1>
            <div class="produk-etalase">
                <div class="container">
                    <h1>Create a New Product</h1>
                    <form method="post" action="create.php">
                        <div class="form-group">
                            <label for="product_name">Nama produk:</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                        </div>
                        <div class="form-group">
                            <label for="product_code">Kategori Produk:</label>
                            <select class="form-select" name="category_id" id="category_id">
                                <?php
                                foreach ($result_kategori as $category) {
                                    echo "<option value='" . $category['id'] . "'>" . $category['category_name'] . "</option>";
                                }
                                ?>
                            </select>
                            <!-- <input type="text" class="form-control" id="product_code" name="product_code" required> -->
                        </div>
                        <div class="form-group">
                            <label for="image_url">Produk Kode:</label>
                            <input type="text" class="form-control" id="product_code" name="product_code" required>
                        </div>
                        <div class="form-group">
                            <label for="image_url">Deskripsi:</label>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga:</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Create Product</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="../assets/adminlte/plugins/jquery/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="../assets/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</body>

</html>