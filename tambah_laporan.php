<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Laporan - Samben Care</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <h2>Buat Laporan Baru</h2>
        <form action="proses/tambah_laporan.php" method="POST" enctype="multipart/form-data">
            <label>Lokasi Kerusakan</label>
            <input type="text" name="location" required>

            <label>Deskripsi</label>
            <textarea name="description" rows="4" required></textarea>

            <label>Foto (opsional)</label>
            <input type="file" name="photo" accept="image/*">

            <button type="submit">Kirim Laporan</button>
        </form>
        <div class="text-center">
            <p><a href="home.php">← Kembali ke Beranda</a></p>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
