<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header("Location: ../index.php");
    exit;
}

$id = (int)$_POST['id'];
$user_id = $_SESSION['user']['id'];
$location = mysqli_real_escape_string($conn, $_POST['location']);
$description = mysqli_real_escape_string($conn, $_POST['description']);

$cek = mysqli_query($conn, "SELECT * FROM reports WHERE id=$id AND user_id=$user_id AND status='menunggu'");
if (mysqli_num_rows($cek) === 0) {
    echo "Laporan tidak valid atau sudah diproses.";
    exit;
}

$photo = '';
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array(strtolower($ext), $allowed)) {
        $photo = 'assets/img/' . uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], '../' . $photo);
        mysqli_query($conn, "UPDATE reports SET location='$location', description='$description', photo='$photo' WHERE id=$id");
    }
} else {
    mysqli_query($conn, "UPDATE reports SET location='$location', description='$description' WHERE id=$id");
}

header("Location: ../home.php");
