<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

$id = (int)$_POST['id'];
$status = mysqli_real_escape_string($conn, $_POST['status']);

mysqli_query($conn, "UPDATE reports SET status='$status' WHERE id=$id");

header("Location: ../home.php");
