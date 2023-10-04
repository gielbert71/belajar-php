const products = [
    {
        name: "Honda CBR1000RR 2017",
        image: "../assets/images/products/cbr.webp",
        description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        price: "Rp700.000.000"
    },
    {
        name: "Yamaha YZF-R1M 2022",
        image: "../assets/images/products/r1m.jpg",
        description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        price: "Rp812.000.000"
    },
    {
        name: "Ducati V4R",
        image: "../assets/images/products/v4r.webp",
        description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        price: "Rp2.400.000.000"
    },
    {
        name: "Kawasaki Ninja ZX-10R",
        image: "../assets/images/products/zx10r.png",
        description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        price: "Rp492.000.000"
    },
    {
        name: "Honda NSX Type-R",
        image: "../assets/images/products/nsx.jpg",
        description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        price: "Rp6.193.000.000"
    },
    {
        name: "Toyota Supra A80",
        image: "../assets/images/products/supra.webp",
        description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        price: "Rp2.100.000.000"
    },
    {
        name: "Nissan Skyline R34",
        image: "../assets/images/products/skyline.png",
        description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        price: "Rp2.400.000.000"
    },
    {
        name: "Mazda RX7 FD3S",
        image: "../assets/images/products/rx7.webp",
        description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        price: "Rp2.100.000.000"
    }
];

const produkContainer = document.getElementById("produk-container");

products.forEach((product) => {
    const produkBox = document.createElement("div");
    produkBox.className = "produk-box";

    const produkGambar = document.createElement("img");
    produkGambar.className = "produk-gambar";
    produkGambar.src = product.image;
    produkGambar.alt = product.name;

    const produkNama = document.createElement("h2");
    produkNama.className = "produk-nama";
    produkNama.textContent = product.name;

    const produkDeskripsi = document.createElement("p");
    produkDeskripsi.className = "produk-deskripsi";
    produkDeskripsi.textContent = product.description;

    const produkHarga = document.createElement("p");
    produkHarga.className = "produk-harga";
    produkHarga.textContent = product.price;

    const produkBeli = document.createElement("a");
    produkBeli.href = "#";
    produkBeli.className = "produk-beli";
    produkBeli.textContent = "Pesan";

    produkBox.appendChild(produkGambar);
    produkBox.appendChild(produkNama);
    produkBox.appendChild(produkDeskripsi);
    produkBox.appendChild(produkHarga);
    produkBox.appendChild(document.createElement("br"));
    produkBox.appendChild(produkBeli);

    produkContainer.appendChild(produkBox);
});