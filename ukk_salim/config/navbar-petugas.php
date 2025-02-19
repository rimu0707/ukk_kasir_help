<?php
session_start();
include '../../config/koneksi.php';

$nama_petugas = '';
if (!empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $nama_petugas = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama_petugas FROM petugas WHERE username = '$username'"))['nama_petugas'] ?? '';
}
?>

<nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd;">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="../../assets/icon/kasir-32x32.png" alt="Logo" width="32" height="32" class="d-inline-block align-text-top"> Cashier App
    </a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active bi bi-house-fill" aria-current="page" href="../../pages/petugas/dashboard.php"> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active bi-cart-fill" aria-current="page" href="#"> Penjualan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active bi-receipt-cutoff" aria-current="page" href="../../pages/petugas/data-barang.php"> Data Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active bi bi-box-arrow-left" href="../../config/logout.php"> Logout</a>
        </li>
      </ul>
      <span class="navbar-text">
      Selamat Datang Petugas : <?php echo htmlspecialchars($nama_petugas); ?>
    </span>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">