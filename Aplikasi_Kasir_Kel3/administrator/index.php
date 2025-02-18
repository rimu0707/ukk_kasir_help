<?php
include "header.php";
include "navbar.php";
?>
<div class="card mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        Data Barang
                        <?php
                        include '../koneksi.php';
                        $data_produk = mysqli_query($koneksi,"SELECT * FROM produk");
                        $jumlah_produk = mysqli_num_rows($data_produk);
                        ?>
                        <h3><?php echo $jumlah_produk; ?></h3>
                        <a href="data_barang.php" class="btn btn-outline-primary btn-sm">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        Data Pembelian
                        <?php
                        include '../koneksi.php';
                        $data_penjualan = mysqli_query($koneksi, "SELECT * FROM penjualan");
                        $jumlah_penjualan = mysqli_num_rows($data_penjualan);
                        ?>
                        <h3><?php echo $jumlah_penjualan; ?></h3>
                        <a href="pembelian.php" class="btn btn-outline-primary btn-sm">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        Data Pengguna
                        <?php
                        include '../koneksi.php';
                        $data_penjualan = mysqli_query($koneksi, "SELECT * FROM petugas");
                        $jumlah_penjualan = mysqli_num_rows($data_penjualan);
                        ?>
                        <h3><?php echo $jumlah_penjualan; ?></h3>
                        <a href="data_pengguna.php" class="btn btn-outline-primary btn-sm">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-2">
    <div class="card-body">
        <p>Selamat Datang Di Halaman Petugas, Anda Dapat Mengakses Beberapa Fitur</p>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php
include "footer.php";
?>  
