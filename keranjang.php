<?php
session_start();
include "config/koneksi.php";
if(!isset($_SESSION['login'])) header("Location:index.php");

// Inisialisasi cart
if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

// TAMBAH KE KERANJANG
if(isset($_POST['tambah'])){
    $id = $_POST['id'];

    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['qty'] += 1;
    } else {
        $_SESSION['cart'][$id] = [
            'nama' => $_POST['nama'],
            'harga' => $_POST['harga'],
            'foto' => $_POST['foto'],
            'qty' => 1
        ];
    }
    header("Location: keranjang.php");
}

// HAPUS ITEM
if(isset($_GET['hapus'])){
    unset($_SESSION['cart'][$_GET['hapus']]);
    header("Location: keranjang.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Keranjang | Yurryka Store</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <h2>Yurryka Store</h2>
    <div>
        <a href="produk.php">Produk</a>
        <a href="checkout.php">Checkout</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">
<h1>Keranjang Belanja</h1>

<?php if(empty($_SESSION['cart'])){ ?>
    <p>Keranjang masih kosong</p>
<?php } else { ?>

<table>
<tr>
    <th>Produk</th>
    <th>Harga</th>
    <th>Qty</th>
    <th>Subtotal</th>
    <th>Aksi</th>
</tr>

<?php
$total = 0;
foreach($_SESSION['cart'] as $id => $item){
    $sub = $item['harga'] * $item['qty'];
    $total += $sub;
?>
<tr>
    <td><?= $item['nama']; ?></td>
    <td>Rp <?= number_format($item['harga']); ?></td>
    <td><?= $item['qty']; ?></td>
    <td>Rp <?= number_format($sub); ?></td>
    <td><a href="?hapus=<?= $id ?>">Hapus</a></td>
</tr>
<?php } ?>

<tr>
    <td colspan="3"><strong>Total</strong></td>
    <td colspan="2"><strong>Rp <?= number_format($total); ?></strong></td>
</tr>
</table>

<a href="checkout.php" class="btn">Checkout</a>

<?php } ?>
</div>

</body>
</html>
