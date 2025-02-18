<?php
include '../koneksi.php';

// menangkap data yang di kirim dari form

$id_petugas = $_POST['id_petugas'];
$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

// update data ke database
if (!$password) {
    mysqli_query($koneksi, "UPDATE petugas SET nama_petugas='$nama_petugas', username='$username', level='$level' WHERE id_petugas='$id_petugas'");
} else {
    mysqli_query($koneksi, "UPDATE petugas SET nama_petugas='$nama_petugas', username='$username', password='$password', level='$level' WHERE id_petugas='$id_petugas'");
}


// mengalihkan halaman kembali ke data_barang.php
header("location:data_pengguna.php?pesan=update");

?>