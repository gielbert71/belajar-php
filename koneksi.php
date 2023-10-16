<?php
    $hostname = "127.0.0.1";
    $database = "online_shop";
    $username = "root";
    $password = '';

    $conn = mysqli_connect($hostname, $username, $password, $database);
    if (!$conn){
        die("Tidak terkoneksi". mysqli_connect_error());
    }
    echo "Berhasil terkoneksi.";
    mysqli_close($conn);
?>