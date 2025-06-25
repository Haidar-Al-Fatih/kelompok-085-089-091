<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'] ?? '';
$user_id = $_SESSION['user']['id'];
$role = $_SESSION['user']['role'];

if (!$id) {
    header("Location: ../home.php");
    exit;
}

// cek apakah laporan milik user & statusnya menunggu
$cek = mysqli_query($conn, "SELECT * FROM reports WHERE id = '$id'");
$laporan = mysqli_fetch_assoc($cek);

if (!$laporan) {
    header("Location: ../home.php");
    exit;
}

// hanya user bisa hapus jika statusnya "menunggu" DAN miliknya sendiri
if ($role === 'user' && $laporan['user_id'] == $user_id && $laporan['status'] == 'menunggu') {
    mysqli_query($conn, "DELETE FROM reports WHERE id = '$id'");
}

header("Location: ../home.php");
exit;
