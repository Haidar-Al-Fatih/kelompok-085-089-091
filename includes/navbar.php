<?php
    if (!isset($_SESSION)) session_start();
    $role = $_SESSION['user']['role'] ?? 'guest';
?>

<style>
.navbar {
    background-color: #3498db;
    padding: 15px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.navbar a {
    color: white;
    margin-left: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 16px;
    transition: opacity 0.2s;
}

.navbar a:hover {
    opacity: 0.85;
}

.navbar .logo {
    font-size: 20px;
    font-weight: bold;
    color: #fff;
}

.navbar .menu {
    display: flex;
    align-items: center;
}
</style>

<div class="navbar">
    <div class="logo"><a href="home.php">Samben Care</a></div>
    <div class="menu">
    <?php if ($role === 'admin'): ?>
        <a href="home.php">Laporan</a>
    <?php elseif ($role === 'user'): ?>
        <a href="home.php">Beranda</a>
        <a href="tambah_laporan.php">Buat Laporan</a>
        <a href="profile.php">Profil Saya</a>

    <?php endif; ?>
        <a href="about.php">Tentang</a>
        <a href="contact.php">Kontak</a>
        <?php if ($role !== 'guest'): ?>
            <a href="proses/logout.php">Logout</a>
        <?php endif; ?>
    </div>
</div>
