<?php
session_start();
include '../config/koneksi.php';

$no_telp = mysqli_real_escape_string($conn, $_POST['no_telp']);
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE no_telp='$no_telp'");
$data = mysqli_fetch_assoc($query);

if ($password === $data['password']) {
    $_SESSION['user'] = $data;
    header("Location: ../home.php");
} else {
    echo "Login gagal. <a href='../index.php'>Coba lagi</a>";
}

header("Location: ../index.php?error=Nomor telepon atau password salah");
exit;