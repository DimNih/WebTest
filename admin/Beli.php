<?php
include '../php/user/beli.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Beli Produk</title>
    <link rel="stylesheet" href="../style/user/beli.css" type="text/css">
</head>
<body>

    <div class="header">
        <div class="balance">Saldo Anda: Rp <?php echo number_format($balance, 2, ',', '.'); ?></div>
    </div>

    <div class="container">
        <h1>BELI PRODUK</h1>

        <?php if ($baris['jumlah'] == 0): ?>
            <div class="out-of-stock">Produk lagi kosong!</div>
            <a href="infoJual.php" class="button">Kembali</a>
        <?php else: ?>
            <?php if ($popupMessage): ?>
                <div class="error-message">
                    <?php echo $popupMessage; ?>
                </div>
            <?php endif; ?>

            <form method="post" action="Beli.php?id=<?php echo $id; ?>">
                <div class="info">
                    <p>Jenis: <?php echo $baris['jenis'] ?? ''; ?></p>
                    <p>Nama: <?php echo $baris['nama_produk'] ?? ''; ?></p>
                    <p>Jumlah Tersedia: <?php echo $baris['jumlah'] ?? ''; ?></p>
                    <p>Harga: Rp <?php echo number_format($baris['harga'], 2, ',', '.'); ?></p>
                </div>

                <div>
                    <input type="number" name="beli" placeholder=" " required min="1" max="<?php echo $baris['jumlah']; ?>">
                    <label class="floating-label">Beli</label>
                </div>

                <div>
                    <input type="text" name="alamat" placeholder="" required>
                    <label class="floating-label">Alamat</label>
                </div>

                <div>
                    <input type="text" name="nomer" placeholder=" " required>
                    <label class="floating-label">Nomor Telepon</label>
                </div>

                <div>
                    <input type="password" name="sandi" placeholder=" " required>
                    <label class="floating-label">Sandi</label>
                </div>

                <button type="submit" name="submit" class="button">Beli</button>
                <a href="infoJual.php" class="button">Kembali</a>
            </form>
        <?php endif; ?>
    </div>

</body>
</html>
