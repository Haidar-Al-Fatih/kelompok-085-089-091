<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Samben Care</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <h2>Login Samben Care</h2>
        <?php if (isset($_GET['error'])): ?>
        <div class="alert">
            ⚠️ <?= htmlspecialchars($_GET['error']) ?>
        </div>
        <?php endif; ?>

        <form action="proses/login.php" method="POST">
            <label>Nomor Telepon</label>
            <input type="text" name="no_telp" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <div class="text-center">
            <p>Belum punya akun? <a href="register.php">Daftar sekarang</a></p>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
