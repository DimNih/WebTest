<?php
session_start(); 
include '../connection/koneksi.php';

$popupMessage = "";
$balance = 0;

$querySaldo = "SELECT jumlah_saldo FROM saldo WHERE id=1"; 
$resultSaldo = mysqli_query($koneksi, $querySaldo);

if ($resultSaldo && mysqli_num_rows($resultSaldo) > 0) {
    $rowSaldo = mysqli_fetch_assoc($resultSaldo);
    $balance = $rowSaldo['jumlah_saldo']; 
} else {
    echo "Gagal mengambil saldo dari database.";
    exit;
}

$baris = []; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $hasil = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE id='$id'");

    if ($hasil && mysqli_num_rows($hasil) > 0) {
        $baris = mysqli_fetch_assoc($hasil);
    } else {
        echo "Produk tidak ditemukan!";
        exit;
    }

    if (isset($_POST['submit'])) {
        $beli = isset($_POST['beli']) ? $_POST['beli'] : 0;
        $nomer = $_POST['nomer'] ?? ''; // Ambil nomor dari input
        $sandi = $_POST['sandi'] ?? ''; // Ambil sandi dari input
        $alamat = $_POST['alamat'] ?? ''; // Ambil alamat dari input

        $queryAlamat = "SELECT * FROM user WHERE alamat='$alamat' AND nomer='$nomer' AND sandi='$sandi'";
        $resultAlamat = mysqli_query($koneksi, $queryAlamat);

        if ($resultAlamat && mysqli_num_rows($resultAlamat) > 0) {
            
            if ($baris) {
                $jumlah = $baris['jumlah'];
                $harga = $baris['harga'];
                $pendapatan = $baris['pendapatan'];
                $totalPrice = $harga * $beli;

                if ($jumlah >= $beli) {
                    if ($balance >= $totalPrice) {
                        $newJumlah = $jumlah - $beli;
                        $Totaldapat = $beli * $harga;

                        $beli_sekarang = $baris['beli']; 
                        $totalBeli = $beli_sekarang + $beli; 

                        $updateProductQuery = "UPDATE penjualan SET jumlah='$newJumlah', beli='$totalBeli', pendapatan=pendapatan + '$Totaldapat' WHERE id='$id'";
                        
                        if (mysqli_query($koneksi, $updateProductQuery)) {
                            $_SESSION['balance'] = $balance - $totalPrice; 
                            
                            $updateSaldoQuery = "UPDATE saldo SET jumlah_saldo='" . $_SESSION['balance'] . "' WHERE id=1";
                            mysqli_query($koneksi, $updateSaldoQuery);

                            header("Location: infoJual.php");
                            exit;
                        } else {
                            $popupMessage = "Gagal memperbarui jumlah produk!";
                        }
                    } else {
                        $popupMessage = "Saldo tidak mencukupi untuk membeli produk ini!";
                    }
                } else {
                    $popupMessage = "Jumlah produk tidak mencukupi!";
                }
            }
        } else {
            $popupMessage = "Alamat, nomor telepon, atau sandi tidak valid!";
        }
    }
}

?>