<?php
// koneksi database
include '../koneksi.php';
// menangkap data id yang di nkirim dari url
$id_petugas = $_POST['id_petugas'];
// menghapus data dari database
mysqli_query($koneksi, "delete from petugas wherre id_petugas='$id_petugas'");
// mengalihkan halaman kembali ke data_barang.php
header("location:data_pengguna.php?pesan=hapus");
?>