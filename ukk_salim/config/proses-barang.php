<?php
// koneksi database
include '../config/koneksi.php';

// Menangkap aksi yang diinginkan
$action = isset($_GET['action']) ? $_GET['action'] : '';
if ($action == 'simpan') {
    // Menangkap data yang dikirim dari form untuk menyimpan
    $NamaProduk = $_POST['NamaProduk'];
    $Harga = $_POST['Harga'];
    $Stok = $_POST['Stok'];

    // Mengingat data ke database
    mysqli_query($conn, "INSERT INTO produk (NamaProduk, Harga, Stok) VALUES ('$NamaProduk', '$Harga', '$Stok')");
    // Mengalihkan halaman kembali ke data_barang.php
    header("location: ../../pages/admin/data-barang.php?pesan=simpan");

} elseif ($action == 'update') {
    // Menangkap data yang dikirim dari form untuk update
    $ProdukID = $_POST['ProdukID'];
    $NamaProduk = $_POST['NamaProduk'];
    $Harga = $_POST['Harga'];
    $Stok = $_POST['Stok'];

    // Update data ke database
    mysqli_query($conn, "UPDATE produk SET NamaProduk='$NamaProduk', Harga='$Harga', Stok='$Stok' WHERE ProdukID='$ProdukID'");
    // Mengalihkan halaman kembali ke data_barang.php
    header("location: ../../pages/admin/data-barang.php?pesan=update");

} elseif ($action == 'hapus') {
    // Menangkap data id yang dikirim dari url untuk menghapus
    $ProdukID = $_POST['ProdukID'];

    // Menghapus data dari database
    mysqli_query($conn, "DELETE FROM produk WHERE ProdukID='$ProdukID'");
    // Mengalihkan halaman kembali ke data_barang.php
    header("location: ../../pages/admin/data-barang.php?pesan=hapus");
} else {
    // Jika aksi tidak dikenali
    header("location: ../../pages/admin/data-barang.php?pesan=aksi_tidak_dikenali");
}
?>