<?php
include '../connection/koneksi.php';
$hasil = mysqli_query($koneksi, "SELECT * FROM penjualan");

$totalPendapatan = 0;
$totalHarga = 0;

if ($hasil) {
    while ($baris = mysqli_fetch_assoc($hasil)) {
        $jumlah = $baris['jumlah'];
        $harga = $baris['harga'];
        $beli = $baris['beli'];

        $totalHarga += $jumlah * $harga;

        if ($beli > 0) {
            $totalPendapatan += $baris['pendapatan'];
        }
    }
    mysqli_data_seek($hasil, 0);
}

$querySaldo = mysqli_query($koneksi, "SELECT * FROM pendapatan");
$saldoData = mysqli_fetch_assoc($querySaldo);
$saldo_dapat = $saldoData['saldo_dapat'];
?>