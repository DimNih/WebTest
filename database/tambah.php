<?php
include '../php/data/detail.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Penjualan</title>

    <link rel="stylesheet" href="../style/database/tambah.css" type="text/css">


</head>
<body>

    <h1>Tambah Penjualan</h1>
    
    <form method="post" action="tambah.php
include '../connection/koneksi.php';" enctype="multipart/form-data">
    
        <div>
            <label>Jenis Produk:</label>
            <select name="jenis" id="jenis" required onchange="updateProdukOptions()">
                <option value="">-- Pilih Produk --</option>
                <option value="Hp">HP</option>
                <option value="Laptop">Laptop</option>
                <option value="Tablet">Tablet</option>
                <option value="Smartwatch">Smartwatch</option>
                <option value="Headphone">Headphone</option>
            </select>
        </div>
        
        <div>
            <label>Nama Produk:</label>
            <select name="nama_produk" id="nama_produk" required>
                <option value="">-- Pilih Nama Produk --</option>
            </select>
        </div>

        <div>
            <label>Jumlah:</label>
            <input type="number" name="jumlah" required>
        </div>
        
        <div>
            <label>Harga:</label>
            <input type="text" name="harga" required>
        </div>
        
        <div>
            <label>Tanggal:</label>
            <input type="date" name="tanggal" required>
        </div>

        <div>
            <label class="file-label" for="file-upload">
                Pilih Gambar
            </label>
            <input id="file-upload" type="file" name="gambar" accept="image/*" required style="display: none;" onchange="updateFileName();">
        </div>

        <div>
            <a id="Nama JPG" class="file-name"></a>
            <b id="Sukses" class="sukses"></b>
        </div>

        <input type="submit" name="submit" value="Simpan" class="button">
        <br><br>
        <a href="data.php" class="button">kembali</a>
    </form>






    <script>
        function updateProdukOptions() {
            var jenis = document.getElementById('jenis').value;
            var namaProduk = document.getElementById('nama_produk');
            namaProduk.innerHTML = '';
            if (jenis === 'Hp') {
                var options = [
                    'Samsung (HP)',
                    'Apple (HP)',
                    'Xiaomi (HP)',
                    'Oppo (HP)',
                    'Vivo (HP)'
                ];
            } else if (jenis === 'Laptop') {
                var options = [
                    'Acer (Laptop)',
                    'Dell (Laptop)',
                    'Asus (Laptop)',
                    'HP (Laptop)',
                    'Lenovo (Laptop)'
                ];
            } else if (jenis === 'Tablet') {
                var options = [
                    'iPad (Tablet)',
                    'Samsung Galaxy Tab (Tablet)',
                    'Microsoft Surface (Tablet)',
                    'Lenovo Tab (Tablet)',
                    'Huawei MediaPad (Tablet)'
                ];
            } else if (jenis === 'Smartwatch') {
                var options = [
                    'Apple Watch (Smartwatch)',
                    'Samsung Galaxy Watch (Smartwatch)',
                    'Fitbit (Smartwatch)',
                    'Garmin (Smartwatch)',
                    'Huawei Watch (Smartwatch)'
                ];
            } else if (jenis === 'Headphone') {
                var options = [
                    'Sony (Headphone)',
                    'Bose (Headphone)',
                    'JBL (Headphone)',
                    'Beats (Headphone)',
                    'Sennheiser (Headphone)'
                ];
            } else {
                var options = [];
            }
         options.forEach(function(option) {
                var newOption = document.createElement('option');
                newOption.value = option.split(' (')[0]; 
                newOption.textContent = option; 
                namaProduk.appendChild(newOption);
            });
        }

        function updateFileName() {
            var inputFile = document.getElementById('file-upload');
            var fileNameDisplay = document.getElementById('Nama JPG');
            var TextSukses = document.getElementById('Sukses')
            
            if (inputFile.files.length) { 
                fileNameDisplay.textContent = inputFile.files[0].name;
                TextSukses.textContent = 'Berhasil Memasukan';
            }
        }
    </script>



</body>
</html>
