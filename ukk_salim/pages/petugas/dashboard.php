<?php
include '../../config/navbar-petugas.php';


$jumlah_barang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(DISTINCT ProdukID) AS total FROM produk"))['total'] ?? 0;

$jumlah_penjualan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(DISTINCT PenjualanID) AS total FROM penjualan"))['total'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
<div class="container my-4">
        <h2 class="mb-4">Dashboard</h2>
        <div class="row">
            <!-- Jumlah Barang -->
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Barang</h5>
                        <h1 class="card-text text-center">
                            <?php echo $jumlah_barang ?? 0; ?>
                        </h1>
                    </div>
                </div>
            </div>

            <!-- Jumlah Penjualan -->
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Penjualan</h5>
                        <h1 class="card-text text-center">
                            <?php echo $jumlah_penjualan ?? 0; ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>