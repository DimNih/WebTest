<?php
include '../connection/koneksi.php';
$id = $_GET['id'];
$hasil = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE id=$id");
$baris = mysqli_fetch_assoc($hasil);

if (isset($_POST['submit'])) {
    $jenis = $_POST['jenis'];
    $nama_produk = $_POST['nama_produk'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $tanggal = $_POST['tanggal'];

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $namaFile = $_FILES['gambar']['name'];
        $tmpFile = $_FILES['gambar']['tmp_name'];
        $Asal = "../Assets/img_data/";
        $targetFile = $Asal . basename($namaFile);

        move_uploaded_file($tmpFile, $targetFile);

        if (!empty($baris['gambar']) && file_exists($targetDir . $baris['gambar'])) {
            unlink($targetDir . $baris['gambar']);
        }

        $sql = "UPDATE penjualan SET jenis='$jenis', nama_produk='$nama_produk', jumlah='$jumlah', harga='$harga', tanggal='$tanggal', gambar='$namaFile' WHERE id=$id";
    } else {
        $sql = "UPDATE penjualan SET jenis='$jenis', nama_produk='$nama_produk', jumlah='$jumlah', harga='$harga', tanggal='$tanggal' WHERE id=$id";
    }

    if (mysqli_query($koneksi, $sql)) {
        header("Location: data.php");
    }
}
?>