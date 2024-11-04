<?php
include '../connection/koneksi.php';

$result = mysqli_query($koneksi, "SELECT jumlah_saldo FROM saldo WHERE id");
$row = mysqli_fetch_assoc($result);
$saldo = $row['jumlah_saldo'];

$_SESSION['balance'] = $saldo; 

$searchKeyword = isset($_POST['search']) ? mysqli_real_escape_string($koneksi, $_POST['search']) : '';
$produkQuery = "SELECT * FROM penjualan WHERE nama_produk LIKE '%$searchKeyword%' ORDER BY id ASC";
$hasil = mysqli_query($koneksi, $produkQuery);
?>