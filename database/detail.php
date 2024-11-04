<?php
include '../php/data/detail.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail Produk</title>
    
    <link rel="stylesheet" href="../style/database/detail.css" type="text/css">

</head>
<body>

<div class="container">
    <div class="navigation">
        <?php if ($prev_id): ?>
            <a href="detail.php?id=<?php echo $prev_id; ?>" class="nav-button">&lt;</a>
        <?php else: ?>
            <a href="#" class="nav-button" onclick="alert('Tidak bisa kembali');">&lt;</a>
        <?php endif; ?>

        <b class="info">Detail Produk</b>

        <?php if ($next_id): ?>
            <a href="detail.php?id=<?php echo $next_id; ?>" class="nav-button">&gt;</a>
        <?php else: ?>
            <a href="#" class="nav-button" onclick="alert('Tidak bisa Lanjut');">&gt;</a>
        <?php endif; ?>
    </div>

    <span class="product-name"><?php echo $baris['nama_produk']; ?></span>
    <br>
    <img src="../img/<?php echo $baris['gambar']; ?>" alt="<?php echo $baris['nama_produk']; ?>" />

    <p class="info">Jumlah: <strong><?php echo $baris['jumlah']; ?></strong></p>
    <p class="info">Harga Satuan: <strong>Rp <?php echo number_format($baris['harga'], 2, ',', '.'); ?></strong></p>
    <p class="info">Harga Total: <strong>Rp <?php echo number_format($baris['total'], 2, ',', '.'); ?></strong></p>
    <p class="info">Tanggal: <strong><?php echo $baris['tanggal']; ?></strong></p>

    <p class="info">Jumlah Beli: <strong><?php echo $baris['beli']; ?></strong></p>

    <div class="back-button-container">
        <a href="data.php" class="nav-button">Kembali</a>
    </div>
</div>

</body>
</html>
