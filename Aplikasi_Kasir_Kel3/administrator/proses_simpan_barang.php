<?php
// koneksi database
include '../koneksi.php';
// menangkap data yang di kirim dari form
$NamaProduk = $_POST['NamaProduk'];
$Harga = $_POST['Harga'];
$Stok = $_POST['Stok'];
// mengingat data ke database
mysqli_query($koneksi, "INSERT INTO produk (NamaProduk, Harga, Stok) VALUES ('$NamaProduk', '$Harga', '$Stok')");
// mengalihkan halaman kembali ke data_bara;ng.php
header("location:data_barang.php?pesan=simpan");
