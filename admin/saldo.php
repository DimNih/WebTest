<?php
include '../php/user/saldo.php';
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <title>PENGISIAN SALDO</title>
   
    <link rel="stylesheet" href="../style/user/saldo.css" type="text/css">
  

</head>
<body>

<header>
    <h1>PENGISIAN SALDO</h1>
</header>

<div class="container">
    <div class="balance">
        <p>Saldo Saat Ini:</p> Rp <?php echo number_format($_SESSION['balance'], 2, ',', '.'); ?>
    </div>

    <?php if (isset($message)) { ?>
        <div class="message" style="color: red;"><?php echo $message; ?></div>
    <?php } ?>

    <form method="POST" action="">
        <label for="nomer_telp">Nomer Telepon:</label>
        <input type="number" name="nomer_telp" placeholder="Masukkan nomer telepon" required>

        <label for="sandi">Sandi:</label>
        <input type="text" name="sandi" placeholder="Masukkan sandi" required>

        <label for="newBalance">Isi Saldo:</label>
        <select name="newBalance" required>
            <option value="">Pilih Saldo</option>
            <option value="10000">Rp 10.000</option>
            <option value="50000">Rp 50.000</option>
            <option value="100000">Rp 100.000</option>
            <option value="500000">Rp 500.000</option>
            <option value="1000000">Rp 1.000.000</option>
            <option value="2000000">Rp 10.000.000</option>
        </select>

        <button type="submit" name="updateBalance">ISI</button>
    </form>

    <a href="Info.html" class="back-button">Kembali</a>
</div>

</body>
</html>
