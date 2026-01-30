<?php
session_start();
if(!isset($_SESSION['login'])) header("Location:index.php");

$total = 0;
if(!empty($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $c){
        $total += $c['harga'] * $c['qty'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
<h3>Yurryka Store</h3>
<div>
<a href="dashboard.php">Dashboard</a>
<a href="produk.php">Produk</a>
<a href="keranjang.php">Keranjang</a>
<a href="logout.php">Logout</a>
</div>
</div>

<div class="center">
<div class="card">
<h2>Selamat Datang 👋</h2>
<p>Kelola penjualan tas dengan mudah</p>


</div>
</div>

</body>
</html>
