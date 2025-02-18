<?php
session_start();
    // cek apakah yang mengakses halaman ini sudah login 
if($_SESSION['level']==""){
    header("locatio:../index.php?pesan=gagal");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Administrator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootsrap@5.3.2/dist/css/bootsrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNeoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwkc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="content">
        </div>
    </div>
</body>
</html>