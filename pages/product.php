<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Array</title>
    <link rel="stylesheet" href="../assets/css/stylespro.css">
</head>

<body>
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
</body>

</html>