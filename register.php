<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar - Samben Care</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <h2>Daftar Pengguna Baru</h2>
        <form action="proses/register.php" method="POST">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" required>

            <label>Nomor Telepon</label>
            <input type="text" name="no_telp" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Daftar</button>
        </form>
        <div class="text-center">
            <p>Sudah punya akun? <a href="index.php">Login</a></p>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
