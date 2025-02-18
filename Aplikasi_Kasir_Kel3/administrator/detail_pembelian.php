<?php
include "header.php";
include "navbar.php";
?>

<div class="card mt-2">
    <div class="card-body">
        <?php
        include '../koneksi.php';
        $PelangganID = $_GET['PelangganID'];
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.PelangganID=penjualan.PelangganID");

        while ($d = mysqli_fetch_array($data)) {
            if ($d['PelangganID'] == $PelangganID) {
        ?>
                <table>
                    <tr>
                        <td>ID Pelanggan</td>
                        <td>: <?php echo $d['PelangganID']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td>: <?php echo $d['NamaPelanggan']; ?></td>
                    </tr>
                    <tr>
                        <td>No. Telepon</td>
                        <td>: <?php echo $d['NomorTelepon']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?php echo $d['Alamat']; ?></td>
                    </tr>
                    <tr>
                        <td>Total Pembelian</td>
                        <td>: Rp. <?php echo $d['TotalHarga']; ?></td>
                    </tr>
                </table>
                <form method="post" action="tambah_detail_penjualan.php">
                    <input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
                    <input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
                    <button type="submit" class="btn btn-primary btn-sm mt-2">Tambah Barang</button>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jumlah Beli</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nos = 1;
                        $detailpenjualan = mysqli_query($koneksi, "SELECT * FROM detailpenjualan");

                        while ($d_detailpenjualan = mysqli_fetch_array($detailpenjualan)) {
                            if ($d_detailpenjualan['PenjualanID'] == $d['PenjualanID']) {
                        ?>
                                <tr>
                                    <td><?php echo $nos++; ?></td>
                                    <td>
                                        <form action="simpan_barang_beli.php" method="post">
                                            <div class="form-group">
                                                <input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
                                                <input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
                                                <select name="ProdukID" class="form-control" onchange="this.form.submit()">
                                                    <option>--- Pilih Produk ---</option>
                                                    <?php
                                                    $produk = mysqli_query($koneksi, "SELECT * FROM produk");
                                                    while ($d_produk = mysqli_fetch_array($produk)) {
                                                    ?>
                                                        <option value="<?php echo $d_produk['ProdukID']; ?>" <?php if ($d_produk['ProdukID'] == $d_detailpenjualan['ProdukID']) { echo "selected"; } ?>><?php echo $d_produk['NamaProduk']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="hitung_subtotal.php">
                                            <?php
                                            $produk = mysqli_query($koneksi, "SELECT * FROM produk");
                                            while ($d_produk = mysqli_fetch_array($produk)) {
                                                if ($d_produk['ProdukID'] == $d_detailpenjualan['ProdukID']) {
                                            ?>
                                                    <input type="text" name="Harga" value="<?php echo $d_produk['Harga']; ?>" hidden>
                                                    <input type="text" name="ProdukID" value="<?php echo $d_produk['ProdukID']; ?>" hidden>
                                                    <input type="text" name="Stok" value="<?php echo $d_produk['Stok']; ?>" hidden>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <div class="form-group">
                                                <input type="number" name="JumlahProduk" value="<?php echo $d_detailpenjualan['JumlahProduk']; ?>" class="form-control">
                                            </div>
                                    </td>
                                    <td><?php echo $d_detailpenjualan['Subtotal']; ?></td>
                                    <td>
                                        <input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
                                        <input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
                                        <button type="submit" class="btn btn-warning btn-sm">Proses</button>
                                        </form>
                                        <form method="post" action="hapus_detail_pembelian.php">
                                            <input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
                                            <input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>

                <form method="post" action="simpan_total_harga.php">
                    <?php
                    $detailpenjualan = mysqli_query($koneksi, "SELECT SUM(Subtotal) AS TotalHarga FROM detailpenjualan WHERE PenjualanID='$d[PenjualanID]'");
                    $row = mysqli_fetch_assoc($detailpenjualan);
                    $sum = $row['TotalHarga'];
                    ?>
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" class="form-control" name="TotalHarga" value="<?php echo $sum; ?>">
                                <input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
                                <input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <button class="btn btn-info btn-sm form-control" type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>

            <?php }
        } ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php
include "footer.php";
?>
