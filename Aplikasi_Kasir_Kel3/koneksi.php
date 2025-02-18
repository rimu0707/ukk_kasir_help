<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kasir";

$koneksi = new mysqli($servername, $username, $password, $dbname);
if ($koneksi->connect_error) {
    die("Koneksi_gagal". $conn->connect_error);
}
?>