<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil - Samben Care</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container">
    <h2>Edit Profil Saya</h2>
    <form action="proses/update_profile.php" method="POST">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($user['nama']) ?>" required>

        <label>Nomor Telepon</label>
        <input type="text" name="no_telp" value="<?= htmlspecialchars($user['no_telp']) ?>" required>

        <label>Password Baru</label>
        <input type="password" name="password" placeholder="Biarkan kosong jika tidak ingin mengubah">

        <button type="submit">Simpan Perubahan</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
