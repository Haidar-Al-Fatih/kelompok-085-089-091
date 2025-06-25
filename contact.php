<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kontak - Samben Care</title>
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
    <h2>Kontak</h2>
    <p>Jika Anda memiliki pertanyaan atau kendala terkait pengaduan fasilitas umum, silakan hubungi kami melalui:</p>
    <ul class="contact-list">
        <li>
            <span class="contact-label">📧 Email</span>
            <span class="contact-value">: sambencare@gmail.com</span>
        </li>
        <li>
            <span class="contact-label">📞 Telepon</span>
            <span class="contact-value">: (0274) 5298572398</span>
        </li>
    </ul>
    <p>Atau kunjungi langsung kantor desa pada jam kerja:</p>
    <ul class="contact-list contact-address">
        <li>
            <span class="contact-label">📍 Alamat</span>
            <span class="contact-value">: Balai Desa Samben, Dusun Samben, Argomulyo, Sedayu, Bantul.</span>
        </li>
    </ul>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
