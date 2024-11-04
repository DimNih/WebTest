<?php
include '../php/user/login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="../style/user/login.css" type="text/css">
</head>
<body>

<div class="container">
    <div class="header">Welcome</div>
    <div class="toggle-btns">
        <button id="loginBtn" onclick="toggleForm('login')">LOGIN</button>
        <button id="registerBtn" onclick="toggleForm('register')">REGISTER</button>
    </div>

    <div class="form-container">
        <form method="post" action="login.php" class="form login-form active">
            <h2>LOGIN</h2>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="sandi" required>
            <input type="submit" name="MASUK" value="LOGIN" class="submit-btn">
        </form>

        <form method="post" action="login.php" class="form register-form">
            <h2>REGISTER</h2>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="sandi" required>
            <label>Alamat:</label>
            <input type="text" name="alamat" placeholder="Masukkan alamat (opsional)">
            <input type="submit" name="REGISTER" value="REGISTER" class="submit-btn">
        </form>
    </div>

    <!-- Notification Area -->
    <?php if ($notification): ?>
        <div class="notification" id="notification"><?php echo $notification; ?></div>
    <?php endif; ?>
</div>

<script>
    window.onload = function() {
        const notification = document.getElementById('notification');
        if (notification) {
            setTimeout(function() {
                notification.style.opacity = '0'; 
                setTimeout(() => {
                    notification.style.display = 'none'; 
                }, 500); 
            }, 2000);
        }
    }

    function toggleForm(type) {
        const loginForm = document.querySelector('.login-form');
        const registerForm = document.querySelector('.register-form');
        const loginBtn = document.getElementById('loginBtn');
        const registerBtn = document.getElementById('registerBtn');

        if (type === 'register') {
            loginForm.classList.remove('active');
            registerForm.classList.add('active');
            registerForm.style.transform = 'translateX(0)'; // Slide register in
            loginForm.style.transform = 'translateX(100%)'; // Slide login out
        } else {
            registerForm.classList.remove('active');
            loginForm.classList.add('active');
            loginForm.style.transform = 'translateX(0)'; // Slide login in
            registerForm.style.transform = 'translateX(100%)'; // Slide register out
        }
    }
</script>

</body>
</html>
