<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tentang Website - Samben Care</title>
<link rel="stylesheet" href="assets/css/style.css">
<style>
    .content {
        max-width: 800px;
        margin: 30px auto;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }
    .contact-list {
        list-style: none;
        padding: 0;
        margin: 0 0 20px 0;
    }
    .contact-list li {
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }
    .contact-label {
        width: 110px;
        font-weight: bold;
        color: #333;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .contact-value {
        color: #555;
    }
    .contact-address {
        margin-top: 15px;
        padding-left: 0;
    }
</style>
</head>
<body>
<?php include 'includes/navbar.php'; ?>

<div class="content">
    <h2>Tentang Website Samben Care</h2>
    <ul class="contact-list">
        <li>
            <span class="contact-label">🖥️ Sistem</span>
            <span class="contact-value">: Samben Care</span>
        </li>
        <li>
            <span class="contact-label">🌐 Tujuan</span>
            <span class="contact-value">: Memudahkan pengaduan fasilitas umum di Desa Samben</span>
        </li>
    </ul>
    <p><strong>Samben Care</strong> adalah sistem pengaduan berbasis web untuk masyarakat Desa Samben yang ingin melaporkan kerusakan fasilitas umum seperti jalan rusak, lampu mati, saluran air, dan lainnya.</p>
    <p>Website ini dibuat untuk mempercepat penanganan fasilitas umum yang rusak dan memudahkan warga dalam menyampaikan laporan langsung ke pengurus desa.</p>
    <p>Fitur utama:</p>
    <ul class="contact-list">
        <li>
            <span class="contact-label">👤 Pengguna</span>
            <span class="contact-value">: Dapat mendaftarkan akun dan mengirimkan laporan</span>
        </li>
        <li>
            <span class="contact-label">🛠️ Admin</span>
            <span class="contact-value">: Memverifikasi dan mengelola status laporan</span>
        </li>
        <li>
            <span class="contact-label">👀 Publik</span>
            <span class="contact-value">: Melihat laporan yang sudah ditindaklanjuti</span>
        </li>
    </ul>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
