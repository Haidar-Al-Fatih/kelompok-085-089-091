<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header("Location: ../index.php");
    exit;
}

$location = mysqli_real_escape_string($conn, $_POST['location']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$user_id = $_SESSION['user']['id'];

$photo = '';
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array(strtolower($ext), $allowed)) {
        $photo = 'assets/img/' . uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], '../' . $photo);
    }
}

mysqli_query($conn, "INSERT INTO reports (user_id, location, description, photo, status, created_at) 
VALUES ($user_id, '$location', '$description', '$photo', 'menunggu', NOW())");

header("Location: ../home.php");
