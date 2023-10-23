<?php
    $hostname = "127.0.0.1";
    $database = "pos_shop";
    $username = "root";
    $password = '';

    $conn = mysqli_connect($hostname, $username, $password, $database);
    if (!$conn){
        die("Tidak terkoneksi". mysqli_connect_error());
    }
    echo "Berhasil terkoneksi.";
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . $conn->error);
    }
    
    // mysqli_close($conn);
?>