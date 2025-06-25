<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header("Location: ../index.php");
    exit;
}

$id = (int)($_GET['id'] ?? 0);
$user_id = $_SESSION['user']['id'];

$cek = mysqli_query($conn, "SELECT * FROM reports WHERE id=$id AND user_id=$user_id AND status='menunggu'");
if (mysqli_num_rows($cek) === 0) {
    echo "Laporan tidak valid atau tidak bisa dihapus.";
    exit;
}

$laporan = mysqli_fetch_assoc($cek);
if ($laporan['photo']) {
    $foto_path = '../' . $laporan['photo'];
    if (file_exists($foto_path)) {
        unlink($foto_path);
    }
}

mysqli_query($conn, "DELETE FROM reports WHERE id=$id");
header("Location: ../home.php");
