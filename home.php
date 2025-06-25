<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$role = $_SESSION['user']['role'];
$user_id = $_SESSION['user']['id'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Beranda - Samben Care</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .content {
      max-width: 1000px;
      margin: 30px auto;
    }
    .search-bar, .filter-bar {
      margin: 20px 0;
      text-align: right;
    }
    .laporan {
      background: white;
      border-radius: 10px;
      margin-bottom: 20px;
      padding: 20px;
      box-shadow: 0 3px 6px rgba(0,0,0,0.05);
    }
    .laporan img {
      max-width: 200px;
      margin-top: 10px;
      border-radius: 5px;
    }
    .laporan-status {
      margin-top: 10px;
      font-weight: bold;
      color: #3498db;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    table, th, td {
      border: 1px solid #ccc;
    }
    th, td {
      padding: 12px;
      text-align: left;
    }
    th {
      background: #3498db;
      color: white;
    }
    .aksi-user a {
      margin-right: 10px;
      color: #d35400;
    }
  </style>
</head>
<body class="<?= $role ?>">
  <?php include 'includes/navbar.php'; ?>

  <div class="content content-box">
    <?php if ($role === 'admin'): ?>
      <h2>Kelola Semua Laporan</h2>
      <div class="filter-bar">
        <form method="GET">
          <label>Filter Status:</label>
          <select name="status" onchange="this.form.submit()">
            <option value="">-- Semua --</option>
            <?php
              $statuses = ['menunggu', 'diproses', 'selesai', 'ditolak'];
              foreach ($statuses as $s) {
                $selected = ($_GET['status'] ?? '') == $s ? 'selected' : '';
                echo "<option value=\"$s\" $selected>" . ucfirst($s) . "</option>";
              }
            ?>
          </select>
        </form>
      </div>

      <?php
        $filter = mysqli_real_escape_string($conn, $_GET['status'] ?? '');
        $sql = "SELECT reports.*, users.nama FROM reports JOIN users ON reports.user_id = users.id";
        if ($filter) $sql .= " WHERE reports.status = '$filter'";
        $sql .= " ORDER BY reports.created_at DESC";
        $data = mysqli_query($conn, $sql);
      ?>

      <table>
        <tr>
          <th>Nama</th>
          <th>Lokasi</th>
          <th>Deskripsi</th>
          <th>Foto</th>
          <th>Status</th>
          <th>Update</th>
        </tr>
        <?php while ($r = mysqli_fetch_assoc($data)): ?>
        <tr>
          <td><?= htmlspecialchars($r['nama']) ?></td>
          <td><?= htmlspecialchars($r['location']) ?></td>
          <td><?= htmlspecialchars($r['description']) ?></td>
          <td>
            <?php if ($r['photo']): ?>
              <img src="<?= $r['photo'] ?>" width="100">
            <?php else: ?> Tidak Ada <?php endif; ?>
          </td>
          <td><?= strtoupper($r['status']) ?></td>
          <td>
            <form action="proses/update_status.php" method="POST">
              <input type="hidden" name="id" value="<?= $r['id'] ?>">
              <select name="status">
                <?php foreach ($statuses as $s): ?>
                  <option value="<?= $s ?>" <?= $r['status'] == $s ? 'selected' : '' ?>><?= $s ?></option>
                <?php endforeach; ?>
              </select>
              <button type="submit">Ubah</button>
            </form>
          </td>
        </tr>
        <?php endwhile; ?>
      </table>

    <?php else: ?>
      <h2 class="h2-laporan">Daftar Semua Laporan</h2>
      <div class="filter-bar">
        <form method="GET">
          <label>Filter Status:</label>
          <select name="status" onchange="this.form.submit()">
            <option value="">-- Semua --</option>
            <?php
              $statuses = ['menunggu', 'diproses', 'selesai', 'ditolak'];
              foreach ($statuses as $s) {
                $selected = ($_GET['status'] ?? '') == $s ? 'selected' : '';
                echo "<option value=\"$s\" $selected>" . ucfirst($s) . "</option>";
              }
            ?>
          </select>
        </form>
      </div>

      <div class="search-bar">
        <form method="GET">
          <input type="text" name="search" placeholder="Cari laporan..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" />
          <button type="submit">Cari</button>
        </form>
      </div>

      <?php
        $statusFilter = mysqli_real_escape_string($conn, $_GET['status'] ?? '');
        $keyword = mysqli_real_escape_string($conn, $_GET['search'] ?? '');

        $query = "SELECT reports.*, users.nama 
          FROM reports 
          JOIN users ON reports.user_id = users.id 
          WHERE 1=1";

        if ($statusFilter !== '') {
          $query .= " AND reports.status = '$statusFilter'";
        }

        if ($keyword !== '') {
          $query .= " AND (
              reports.location LIKE '%$keyword%' 
              OR reports.description LIKE '%$keyword%' 
              OR users.nama LIKE '%$keyword%'
          )";
        }

        $query .= " ORDER BY reports.created_at DESC";
        $result = mysqli_query($conn, $query);
      ?>

      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while($r = mysqli_fetch_assoc($result)): ?>
          <div class="laporan">
            <div class="laporan-info-box">
              <strong>Pelapor:</strong> <?= htmlspecialchars($r['nama']) ?><br>
              <strong>Lokasi:</strong> <?= htmlspecialchars($r['location']) ?><br>
              <strong>Deskripsi:</strong> <?= htmlspecialchars($r['description']) ?><br>
            </div>
            <?php if ($r['photo']): ?>
              <img src="<?= $r['photo'] ?>" alt="Foto Laporan">
            <?php endif; ?>
            <?php
              $statusClass = '';
              switch ($r['status']) {
                case 'menunggu': $statusClass = 'status-menunggu'; break;
                case 'diproses': $statusClass = 'status-diproses'; break;
                case 'selesai':  $statusClass = 'status-selesai'; break;
                case 'ditolak':  $statusClass = 'status-ditolak'; break;
              }
            ?>
            <div class="laporan-status <?= $statusClass ?>">Status: <?= strtoupper($r['status']) ?></div>
            <?php if ($r['status'] == 'menunggu' && $r['user_id'] == $user_id): ?>
              <div class="aksi-user">
                <a href="edit_laporan.php?id=<?= $r['id'] ?>">✏️ Edit</a>
                <a href="proses/hapus_laporan.php?id=<?= $r['id'] ?>" onclick="return confirm('Yakin ingin hapus laporan ini?')">🗑️ Hapus</a>
              </div>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>Tidak ada laporan ditemukan.</p>
      <?php endif; ?>
    <?php endif; ?>
  </div>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
