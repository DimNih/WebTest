<?php
include '../connection/koneksi.php';

if (!isset($_SESSION['balance'])) {
    $result = mysqli_query($koneksi, "SELECT jumlah_saldo FROM saldo WHERE id=1");
    $row = mysqli_fetch_assoc($result);
    $_SESSION['balance'] = $row['jumlah_saldo'] ?? 10000; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateBalance'])) {
    $newBalance = $_POST['newBalance'];
    $nomer = $_POST['nomer_telp'];
    $sandi = $_POST['sandi'];
    
    $checkQuery = "SELECT * FROM user WHERE nomer='$nomer' AND sandi='$sandi'";
    $result = mysqli_query($koneksi, $checkQuery);
    
    if (mysqli_num_rows($result) > 0) {
        if (is_numeric($newBalance) && $newBalance >= 0) {
            $newBalance = (float)$newBalance;
            $_SESSION['balance'] += $newBalance;

            $updateQuery = "UPDATE saldo SET jumlah_saldo='" . $_SESSION['balance'] . "' WHERE id=1";
            if (mysqli_query($koneksi, $updateQuery)) {
                $message = "Saldo berhasil diperbarui dan ditambahkan!";
            } else {
                $message = "Terjadi kesalahan saat menambah saldo.";
            }
        } else {
            $message = "Silakan masukkan jumlah saldo yang valid.";
        }
    } else {
        $message = "Nomer telepon atau sandi salah.";
    }
}
?>