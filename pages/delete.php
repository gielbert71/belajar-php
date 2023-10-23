<?php
include_once("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $delete_query = "DELETE FROM products WHERE id = $product_id";
    if (mysqli_query($conn, $delete_query)) {
        echo "Berhasil dihapus";
        // header("Location: crud_products.php");
        echo '<meta http-equiv="refresh" content="0;url=crud-products.php">';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
