<?php
// Koneksi database
include '../koneksi.php';

// Menangkap data dari form
$PelangganID = $_POST['PelangganID'];
$NamaPelanggan = $_POST['NamaPelanggan'];
$NomorTelepon = $_POST['NomorTelepon'];
$Alamat = $_POST['Alamat'];
$TanggalPenjualan = $_POST['TanggalPenjualan'];

// Memasukkan data ke tabel pelanggan
$query1 = mysqli_query($koneksi, "INSERT INTO pelanggan (PelangganID, NamaPelanggan, Alamat, NomorTelepon) VALUES ('$PelangganID', '$NamaPelanggan', '$Alamat', '$NomorTelepon')");

if (!$query1) {
    die("Error pada query pelanggan: " . mysqli_error($koneksi));
}

// Memasukkan data ke tabel penjualan
$query2 = mysqli_query($koneksi, "INSERT INTO penjualan (TanggalPenjualan, PelangganID) 
VALUES ('$TanggalPenjualan', '$PelangganID')");

if (!$query2) {
    die("Error pada query penjualan: " . mysqli_error($koneksi));
}

// Mengalihkan halaman kembali ke pembelian.php
header("location:pembelian.php?pesan=simpan");
exit();
?>
