<?php
include '../koneksi.php';

$PelangganID = $_POST['PelangganID'];
$PenjualanID = $_POST['PenjualanID'];

// Menambahkan data ke dalam tabel detailpenjualan
mysqli_query($koneksi, "INSERT INTO detailpenjualan VALUES ('', '$PenjualanID', '', '', '')");

// Mengalihkan halaman kembali ke detail_pembelian.php dengan membawa parameter PelangganID
header("location:detail_pembelian.php?PelangganID=$PelangganID");
exit();
?>
