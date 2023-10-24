<?php
include_once("koneksi.php");

$kategori = "SELECT * FROM product_categories";
$result_kategori = mysqli_query($conn, $kategori);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $category_id = $_POST["category_id"];
    $product_code = $_POST["product_code"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    $update_query = "UPDATE products SET product_name = '$product_name', category_id = '$category_id', product_code = '$product_code', description = '$description', price = '$price' WHERE id = $product_id";

    if (mysqli_query($conn, $update_query)) {
        echo "Berhasil.";
        header("Location: crud-products.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $fetch_query = "SELECT * FROM products WHERE id = $product_id";
    $product = mysqli_query($conn, $fetch_query);

    if (mysqli_num_rows($product) == 1) {
        $row = mysqli_fetch_assoc($product);
        $product_name = $row["product_name"];
        $category_id = $row["category_id"];
        $product_code = $row["product_code"];
        $description = $row["description"];
        $price = $row["price"];
    } else {
        echo "Product not found.";
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
        <div class="main-content">
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
            <h1 style="text-align: center;"><a href="../index.html" class="linkurl">Product</a></h1>
            <div class="produk-etalase">
            <div class="container">
                <h1>Update Product</h1>
                <form method="post" action="update.php">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <div class="form-group">
                        <label for="product_name">Nama produk:</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product_name; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="product_code">Kategori Produk:</label>
                        <select class="form-select" name="category_id" id="category_id">
                            <?php
                            foreach ($result_kategori as $category) {
                                $selected = ($category['id'] == $category_id) ? "selected" : "";
                                echo "<option value='" . $category['id'] . "' $selected>" . $category['category_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image_url">Produk Kode:</label>
                        <input type="text" class="form-control" id="product_code" name="product_code" value="<?php echo $product_code; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="image_url">Deskripsi:</label>
                        <input type="text" class="form-control" id="description" name="description" value="<?php echo $description; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga:</label>
                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $price; ?>" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
        
    </div>
    
</body>

</html>
