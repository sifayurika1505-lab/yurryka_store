<?php
session_start();
include "config/koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location:index.php");
    exit;
}

if (!isset($_SESSION['last_order_id'])) {
    header("Location:dashboard.php");
    exit;
}

$id = $_SESSION['last_order_id'];

$data = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pesanan='$id'");
$p = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Selesai | Yurryka Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <h2>Yurryka Store</h2>
    <div>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">
    <div class="success-box">
        <h1>✅ Pesanan Berhasil!</h1>
        <p>Terima kasih telah berbelanja di <strong>Yurryka Store</strong>.</p>
    </div>

    <h3>Detail Pesanan</h3>
    <table>
        <tr>
            <td><strong>Nama Pembeli</strong></td>
            <td><?= $p['nama_pembeli']; ?></td>
        </tr>
        <tr>
            <td><strong>Alamat</strong></td>
            <td><?= $p['alamat']; ?></td>
