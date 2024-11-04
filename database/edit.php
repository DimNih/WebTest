<?php
include '../php/data/edit.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Penjualan</title>
    
    <link rel="stylesheet" href="../style/database/edit.css" type="text/css">

</head>
<body>

    <h1>Edit Penjualan</h1>

    <div class="form-container">
    <form method="post" action="edit.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
        
        <label>Jenis Produk:</label>
        <select name="jenis" id="jenis" required onchange="updateProdukOptions()">
            <option value="">-- Pilih Produk --</option>
            <option value="HP" <?php echo ($baris['jenis'] == 'HP') ? 'selected' : ''; ?>>HP</option>
            <option value="Laptop" <?php echo ($baris['jenis'] == 'Laptop') ? 'selected' : ''; ?>>Laptop</option>
            <option value="Tablet" <?php echo ($baris['jenis'] == 'Tablet') ? 'selected' : ''; ?>>Tablet</option>
            <option value="Smartwatch" <?php echo ($baris['jenis'] == 'Smartwatch') ? 'selected' : ''; ?>>Smartwatch</option>
            <option value="Headphone" <?php echo ($baris['jenis'] == 'Headphone') ? 'selected' : ''; ?>>Headphone</option>
        </select>
    
        <label>Nama Produk:</label>
        <select name="nama_produk" id="nama_produk" required>
            <option value="">--Pilih Nama Produk--</option>
           </select>

        <label>Jumlah:</label>
        <input type="number" name="jumlah" value="<?php echo ($baris['jumlah']); ?>" required>

        <label>Harga:</label>
        <input type="text" name="harga" value="<?php echo ($baris['harga']); ?>" required>

        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="<?php echo ($baris['tanggal']); ?>" required>

        <label>Gambar Produk (kosongkan jika tidak ingin mengganti):</label>
        <input type="file" name="gambar">
        
        <?php if (!empty($baris['gambar'])): ?>
            <img src="../img/<?php echo $baris['gambar']; ?>" alt="Gambar Produk" style="width:30%;">
        <?php endif; ?>

        <input type="submit" name="submit" value="UBAH" class="submit-btn">
    </form>

    <a href="data.php" class="back-btn">Kembali</a>
</div>

<script>
    window.onload = function() {
        updateProdukOptions();
    };

    function updateProdukOptions() {
        var jenis = document.getElementById('jenis').value;
        var namaProduk = document.getElementById('nama_produk');
        namaProduk.innerHTML = '';
        var selectedNamaProduk = "<?php echo $baris['nama_produk']; ?>"; 
        
        var options = [];

        if (jenis === 'HP') {
            options = [
                'Samsung (HP)',
                'Apple (HP)',
                'Xiaomi (HP)',
                'Oppo (HP)',
                'Vivo (HP)'
            ];
        } else if (jenis === 'Laptop') {
            options = [
                'Acer (Laptop)',
                'Dell (Laptop)',
                'Asus (Laptop)',
                'HP (Laptop)',
                'Lenovo (Laptop)'
            ];
        } else if (jenis === 'Tablet') {
            options = [
                'iPad (Tablet)',
                'Samsung Galaxy Tab (Tablet)',
                'Microsoft Surface (Tablet)',
                'Lenovo Tab (Tablet)',
                'Huawei MediaPad (Tablet)'
            ];
        } else if (jenis === 'Smartwatch') {
            options = [
                'Apple Watch (Smartwatch)',
                'Samsung Galaxy Watch (Smartwatch)',
                'Fitbit (Smartwatch)',
                'Garmin (Smartwatch)',
                'Huawei Watch (Smartwatch)'
            ];
        } else if (jenis === 'Headphone') {
            options = [
                'Sony (Headphone)',
                'Bose (Headphone)',
                'JBL (Headphone)',
                'Beats (Headphone)',
                'Sennheiser (Headphone)'
            ];
        }

        options.forEach(function(option) {
            var newOption = document.createElement('option');
            var optionValue = option.split(' (')[0];
            newOption.value = optionValue; 
            newOption.textContent = option;

            if (optionValue === selectedNamaProduk) {
                newOption.selected = true;
            }
            namaProduk.appendChild(newOption);
        });
    }
</script>

</body>
</html>
