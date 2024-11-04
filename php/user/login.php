<?php
session_start();
include '../connection/koneksi.php';

$notification = ""; // Initialize notification variable

// Proses login pengguna
if (isset($_POST['MASUK'])) {
    $email = $_POST['email'];
    $sandi = $_POST['sandi'];

    $sql = "SELECT * FROM user WHERE email='$email' AND sandi='$sandi'";
    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) > 0) {
        header("Location: ./loading/loading.html");
        exit();
    } else {
        $notification = "Email atau password salah.";
    }
}

// Proses registrasi pengguna
if (isset($_POST['REGISTER'])) {
    $email = $_POST['email'];
    $sandi = $_POST['sandi'];
    $alamatBaru = $_POST['alamat'] ?? '';

    if (!empty($email) && !empty($sandi)) {
        $sql = "UPDATE user SET sandi='$sandi', alamat='$alamatBaru' WHERE email='$email'";
        if (mysqli_query($koneksi, $sql)) {
            $notification = "Registrasi berhasil. Silakan login.";
        } else {
            $notification = "Registrasi gagal.";
        }
    } else {
        $notification = "Email dan password wajib diisi.";
    }
}
?>