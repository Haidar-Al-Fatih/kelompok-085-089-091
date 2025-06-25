<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

$id = $_SESSION['user']['id'];
$nama = $_POST['nama'];
$no_telp = $_POST['no_telp'];
$password = $_POST['password'];

if ($password != "") {   
    $sql = "UPDATE users SET nama='$nama', no_telp='$no_telp', password='$password' WHERE id=$id";
} else {
    $sql = "UPDATE users SET nama='$nama', no_telp='$no_telp' WHERE id=$id";
}

if (mysqli_query($conn, $sql)) {
    // Update session juga
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $id"));
    $_SESSION['user'] = $user;

    header("Location: ../profile.php");
} else {
    echo "Gagal memperbarui profil.";
}
