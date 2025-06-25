<?php
include '../config/koneksi.php';

$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$no_telp = mysqli_real_escape_string($conn, $_POST['no_telp']);
$password = $_POST['password'];

$cek = mysqli_query($conn, "SELECT * FROM users WHERE no_telp='$no_telp'");
if (mysqli_num_rows($cek) > 0) {
    echo "Nomor telepon sudah terdaftar. <a href='../register.php'>Kembali</a>";
    exit;
}

mysqli_query($conn, "INSERT INTO users (nama, no_telp, password, role) VALUES ('$nama', '$no_telp', '$password', 'user')");
header("Location: ../index.php");
