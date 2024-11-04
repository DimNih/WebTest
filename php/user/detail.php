<?php
include '../connection/koneksi.php';

$id = $_GET['id'];
$hasil = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE id = '$id'");
$baris = mysqli_fetch_assoc($hasil);

$next_result = mysqli_query($koneksi, "SELECT id FROM penjualan WHERE id > '$id' ORDER BY id ASC LIMIT 1");
$next_product = mysqli_fetch_assoc($next_result);
$next_id = $next_product ? $next_product['id'] : null;

$prev_result = mysqli_query($koneksi, "SELECT id FROM penjualan WHERE id < '$id' ORDER BY id DESC LIMIT 1");
$prev_product = mysqli_fetch_assoc($prev_result);
$prev_id = $prev_product ? $prev_product['id'] : null;
?>