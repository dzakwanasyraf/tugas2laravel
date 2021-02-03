<?php
//ambil data json dari file
$content = file_get_contents("barang.json");
//mengubah data json menjadi data array 
$result = json_decode($content, true);

echo "<h1>Toko Online A Lagi Diskon Lhoooo!!! Mampir Yuukk!!</h1>";
//untuk menampilkan data perulangan
foreach ($result as $value) {

    $hargaAsli =  $value['hargaBarang'];
    //untuk soal pertama kita harus menggunakan if dengan kondisi value dari jenisBarang harus Elektronik 
    if ($value['jenisBarang'] == "Elektronik") {
        //modulus karena menggunakan ini  "%" ga bsia jadi yaa pake itu. 
        //karena sisa dari diskon 30% adalah 70% jadi saya tulis demikian 
        //jika anda kurang puas dengan cara saya yg pertama anda dapat menggunakan cara kedua yang saya komen dibawah cara pertama 
        $diskonElektro = $value['hargaBarang'] * 70 / 100;
        $value['hargaBarang'] = " $hargaAsli diskon 30% menjadi $diskonElektro";
        // $diskonElektro = $value['hargaBarang'] * 30 / 100;
        // $hasil = $hargaAsli - $diskonElektro;
        // $value['hargaBarang'] = " $hargaAsli diskon 30% menjadi $hasil";
    }
    //yaa klo ini sama yaa cuma tinggal nambahin - 10.000
    if ($value['jenisBarang'] == "Makanan") {
        $diskonMakanan = $value['hargaBarang'] * 90 / 100 - 10000;
        $value['hargaBarang'] = "$hargaAsli diskon 10% plus 10.000 menjadi $diskonMakanan";
    }
    //ini juga sama 
    if ($value['jenisBarang'] == "Pakaian") {
        //nah karena perintahnya yang di diskon hanya yang di atas 200.000 maka saya buat iff lagi jika hargaBarang lebih dari 200.000 seperti dibawah
        if ($value['hargaBarang'] >= 200000) {
            $diskonPakaian = $value['hargaBarang'] * 80 / 100;
            $value['hargaBarang'] = "$hargaAsli diskon 20% menjadi $diskonPakaian";
        }
    }
    // yaa klo yang dibawah ini untuk menampilkan data yang sudah di jelaskan diatas ok
    echo "Nama : " . $value['namaBarang'] . "<br>";
    echo "Id : " . $value['kodeBarang'] . "<br>";
    echo "Jenis : " . $value['jenisBarang'] . "<br>";
    echo "Harga : " . $value['hargaBarang'] . "<br>";
    //ini buat kasih garis doang kok biar bisa bedain 
    echo "<hr>";
}
// ini iseng wkwkwk
echo "<span>Copyright&copy by Dzakwan Asyraf</span>";
