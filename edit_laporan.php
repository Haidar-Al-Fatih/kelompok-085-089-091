<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'] ?? 0;
$user_id = $_SESSION['user']['id'];

$data = mysqli_query($conn, "SELECT * FROM reports WHERE id=$id AND user_id=$user_id AND status='menunggu'");
if (mysqli_num_rows($data) == 0) {
    echo "Laporan tidak ditemukan atau tidak bisa diedit.";
    exit;
}

$report = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Laporan - Samben Care</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .content {
      max-width: 600px;
      margin: 30px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <div class="content">
      <h2>Edit Laporan</h2>
      <form action="proses/edit_laporan.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $report['id'] ?>">
          
          <label>Lokasi</label>
          <input type="text" name="location" value="<?= htmlspecialchars($report['location']) ?>" required>

          <label>Deskripsi</label>
          <textarea name="description" required><?= htmlspecialchars($report['description']) ?></textarea>

          <?php if ($report['photo']): ?>
              <p>Foto lama:</p>
              <img src="<?= $report['photo'] ?>" width="150"><br><br>
          <?php endif; ?>

          <label>Ganti Foto (opsional)</label>
          <input type="file" name="photo">

          <button type="submit">Simpan Perubahan</button>
      </form>
  </div>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
