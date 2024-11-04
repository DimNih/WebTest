<?php
include '../connection/koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM penjualan WHERE id = $id";
    
    if (mysqli_query($koneksi, $sql)) {

        $set = "SET @id = 0";
        mysqli_query($koneksi, $set);
        $update_id = "UPDATE penjualan SET id = (@id := @id + 1) ";
        mysqli_query($koneksi, $update_id);

        mysqli_query($koneksi, "ALTER TABLE penjualan AUTO_INCREMENT= 1");

        header("Location: data.php");
    }
}
?>
