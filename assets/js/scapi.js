const produkContainer = document.getElementById("produk-container");

fetch("https://6512e2e6b8c6ce52b39667bd.mockapi.io/product")
  .then(response => {
    if (!response.ok) {
      throw new Error('Terjadi error');
    }
    return response.json();
  })
  .then(data => {

    data.forEach(product => {
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
  })
  .catch(error => {
    console.error('Terjadi error dengan fetch.', error);
  });
