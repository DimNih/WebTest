<?php
include '../php/user/infoJual.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>BELI</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="../style/user/infojual.css" type="text/css">

</head>

<body>

<p class="logo">
    <img src="../Assets/logo/produk.png" style="width: 200px; padding: 20px; border-radius: 30%;">
    </p>

    <header>
        <button class="menu-btn">
            <label for="menu-toggle">
                <img src="../Assets/logo/user.png" alt="Profile" width="40">
            </label>
        </button>
        <input type="checkbox" id="menu-toggle">
        <div class="baris-bawah">
            <a href="Info.html">KEMBALI</a>
            <a href="https://wa.me/6281585261728?text=Keren%20lu%20bang" target="_blank">
                <img src="../Assets/logo/wa.png" alt="WhatsApp Logo">KONTAK SAYA
            </a>
            <a href="../About/index.html">
                <img src="../Assets/logo/about.png" alt="About Logo">TENTANG WEB
            </a>
        </div>
    </header>


<form method="POST" class="cari" action="">
    <input type="text" name="search" placeholder="Cari produk..." value="<?php echo htmlspecialchars($searchKeyword); ?>" required>
    <button type="submit">Cari</button>
</form>


<div class="saldo">
    <div class="balance">Saldo: Rp <?php echo number_format($row['jumlah_saldo'], 2, ',', '.'); ?>
    </div>
</div>

<div class="loading" id="loading">
    <div class="spinner"></div>
    <p>Loading...</p>
</div>

<div class="isi" id="produk">
    <?php if ($hasil && mysqli_num_rows($hasil)): ?>
        <?php while ($baris = mysqli_fetch_assoc($hasil)): ?>
            <div class="product-card">
                <img src='../Assets/img_data/<?php echo $baris['gambar']; ?>' />
                <h3><?php echo $baris['jenis']; ?>: <?php echo ($baris['nama_produk']) ? $baris['nama_produk'] : 'Data tidak tersedia'; ?></h3>
                <p>Jumlah: <?php echo $baris['jumlah']; ?></p>
                <p>Harga Satuan: Rp <?php echo number_format($baris['harga'], 0, ',', '.'); ?></p>
                <p>
                    <a href='detail.php?id=<?php echo $baris['id']; ?>' class='tombol-bindo'>DETAIL</a>
                    <a href='Beli.php?id=<?php echo $baris['id']; ?>' class='tombol-bindo'>BELI</a>
                </p>
            </div>
        <?php endwhile; ?>



    <?php else: ?>
        <h2 style="color: red; padding: 20px;" align="center">Tidak Ada Data</h2>
    <?php endif; ?>

</div>

<footer>
    <p>&copy; 2024 AmbaShop.</p>
</footer>

<script>
    document.getElementById('loading').style.display = 'flex';

    setTimeout(function() {
        document.getElementById('loading').style.display = 'none';
        var productContainer = document.getElementById('produk');
        productContainer.style.opacity = 2; 
    }, 1000);
</script>

</body>
</html>
