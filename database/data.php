<?php
include '../php/data/data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA PENJUALAN</title>

    <link rel="stylesheet" href="../style/database/data.css" type="text/css">
    
</head>

<body>

<header>
    <h1>DATA PENJUALAN</h1>
    <div class="saldo">
        <strong>Saldo: </strong> RP <?php echo number_format($saldo_dapat, 2, ',', '.'); ?>
    </div>
</header>

<marquee class="Bekgrond" scrollamount="10">
    <strong>Selamat Datang di Halaman Data Penjualan</strong>
</marquee>

<div class="isi">
    <?php if ($hasil && mysqli_num_rows($hasil)): ?>
        <table>
            <tr>
                <th>UID</th>
                <th>Jenis</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Ubah</th>
            </tr>

            <?php
mysqli_data_seek($hasil, 0);
while ($baris = mysqli_fetch_assoc($hasil)) {
    $jumlah = $baris['jumlah'];
    $harga = $baris['harga'];
    $beli = $baris['beli'];
    $total = $jumlah * $harga;
    $tanggal = date('d/m/Y', strtotime($baris['tanggal']));

    echo "<tr>
        <td>{$baris['id']}</td>
        <td>{$baris['jenis']}</td>
        <td>{$baris['nama_produk']}</td>
        <td>{$jumlah}</td>
        <td>RP " . number_format($harga, 2, ',', '.') . "</td>
        <td>RP " . number_format($total, 2, ',', '.') . "</td>
        <td>{$tanggal}</td>
        <td>
            <a href='detail.php?id={$baris['id']}' class='tombol-bindo'>DETAIL</a>
            <a href='edit.php?id={$baris['id']}' class='tombol-bindo'>EDIT</a>
            <a href='hapus.php?id={$baris['id']}' class='tombol-bindo' onclick=\"return confirm('Yakin ingin hapus?')\">HAPUS</a>
        </td>
    </tr>";
}
?>

        </table>
    <?php else: ?>
        <h2 style="color: red;padding:20px;text-align:center;">Tidak Ada Data</h2>
    <?php endif; ?>

    <div class="total-pendapatan">
        <strong>Total Pendapatan: </strong> RP <?php echo number_format($totalPendapatan, 2, ',', '.'); ?>
    </div>

    <form action="../connection/tarik_saldo.php" method="post" class="total-pendapatan">
        <input type="hidden" name="saldo_dapat" value="<?php echo $totalPendapatan; ?>">
        <button type="submit" >TARIK SALDO</button> 
    </form>

    <div class="footer">
        <a href="tambah.php" class="tombol-bindo">TAMBAH PRODUK</a>
    </div>
</div>

</body>
</html>
