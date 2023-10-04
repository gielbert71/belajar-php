//Variabel & Tipe Data
var nama = "Gielbert Whilton"; // String
let umur = 21; // number
const asaldaerah = "Pontianak";
console.log(`Nama : ${nama}\nUmur : ${umur}\nAsal Daerah : ${asaldaerah}`);

let identity = {
    asal_instansi: "Universitas Tanjungpura",
    provinsi: "Kalimantan Barat"
};

console.log(identity);

//Operator
let a = 70;
let b = 25;
console.log(`a = ${a}\nb = ${b}`);
console.log(`a + b = ${a + b}`);
console.log(`a - b = ${a - b}`);
console.log(`a * b = ${a * b}`);
console.log(`a / b = ${a / b}`);
console.log(`a % b = ${a % b}`);
console.log(`a > b = ${a > b}`);

//Pop Up & Kondisi
alert("Gielbert Whilton - Fundamental JS");
let name = prompt("Input Nama Anda: ");
if(name) {
    alert(`Halo ${name}`);
} else {
    alert("Tidak masalah jika anda tidak ingin menginput nama Anda.");
};

//type conversion & function
let angka = 30;
console.log(`Datawal Angka : ${angka}`);

function conv(num) {
    console.log(`Angka -> String : ${String(num)}`)
    console.log(`Angka -> Boolean : ${Boolean(num)}`)
};

conv(angka);

//Perulangan (Loop)
for (let index = 0; index < 5; index++) {
    console.log(`Perulangan ke-${index}`)
};