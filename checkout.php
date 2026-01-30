<?php
session_start();
include "config/koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location:index.php");
    exit;
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location:keranjang.php");
    exit;
}

// hitung total belanja
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['harga'] * $item['qty'];
}

// proses simpan pesanan
if (isset($_POST['pesan'])) {
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp     = $_POST['hp'];
    $metode = $_POST['metode'];

    // INSERT ke database
    mysqli_query($conn, "INSERT INTO pesanan 
        (nama_pembeli, alamat, no_hp, metode_pembayaran, total)
        VALUES 
        ('$nama', '$alamat', '$hp', '$metode', '$total')
    ");

    // ambil ID pesanan terakhir
    $id_pesanan = mysqli_insert_id($conn);

    // kosongkan cart
    unset($_SESSION['cart']);

    // simpan id ke session
    $_SESSION['last_order_id'] = $id_pesanan;

    // redirect ke halaman sukses
    header("Location:pesanan_selesai.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout | Yurryka Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <h2>Yurryka Store</h2>
    <div>
        <a href="keranjang.php">Kembali</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">
<h1>Checkout</h1>

<h3>Ringkasan Pesanan</h3>
<table>
<tr>
    <th>Produk</th>
    <th>Qty</th>
    <th>Subtotal</th>
</tr>

<?php foreach($_SESSION['cart'] as $item){ ?>
<tr>
    <td><?= $item['nama']; ?></td>
    <td><?= $item['qty']; ?></td>
    <td>Rp <?= number_format($item['harga'] * $item['qty']); ?></td>
</tr>
<?php } ?>

<tr>
    <td colspan="2"><strong>Total</strong></td>
    <td><strong>Rp <?= number_format($total); ?></strong></td>
</tr>
</table>

<h3>Data Pembeli</h3>
<form method="post">
    <input type="text" name="nama" placeholder="Nama Lengkap" required>
    <textarea name="alamat" placeholder="Alamat Lengkap" required></textarea>
    <input type="text" name="hp" placeholder="No HP" required>

    <h3>Metode Pembayaran</h3>
    <select name="metode" required>
        <option value="">-- Pilih Metode Pembayaran --</option>
        <option value="Transfer Bank">Transfer Bank</option>
        <option value="COD">COD (Bayar di Tempat)</option>
        <option value="E-Wallet">E-Wallet (Dana / OVO / Gopay)</option>
    </select>

    <button type="submit" name="pesan">Konfirmasi Pesanan</button>
</form>
</div>

</body>
</html>
