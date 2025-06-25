<?php
include 'config/koneksi.php';

$nama = "Admin Tambahan";
$no_telp = "0123456789";
$password = "admin123";
$role = "admin";

$sql = "INSERT INTO users (nama, no_telp, password, role)
        VALUES ('$nama', '$no_telp', '$password', '$role')";

if (mysqli_query($conn, $sql)) {
    echo "Admin baru berhasil ditambahkan.";
} else {
    echo "Gagal tambah admin: " . mysqli_error($conn);
}
