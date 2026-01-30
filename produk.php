<?php
session_start();
if(!isset($_SESSION['login'])) header("Location:index.php");

$produk = [
    [
        "id"=>1,
        "nama"=>"Tas Wanita Elegan",
        "harga"=>150000,
        "foto"=>"https://cf.shopee.co.id/file/9285288bd823d2bd1cf395e3646f709f"
    ],
    [
        "id"=>2,
        "nama"=>"Tas Ransel",
        "harga"=>200000,
        "foto"=>"https://down-id.img.susercontent.com/file/7c9e2a3710b1055b0e855ffd18b7dca7"
    ],
    [
        "id"=>3,
        "nama"=>"Tas Selempang",
        "harga"=>120000,
        "foto"=>"https://down-id.img.susercontent.com/file/id-11134211-7r98o-ll3h3gh9uhxz21"
    ]
];

if(isset($_GET['add'])){
    foreach($produk as $p){
        if($p['id']==$_GET['add']){
            $_SESSION['cart'][$p['id']]['nama']  = $p['nama'];
            $_SESSION['cart'][$p['id']]['harga']= $p['harga'];
            $_SESSION['cart'][$p['id']]['qty']  =
                ($_SESSION['cart'][$p['id']]['qty'] ?? 0) + 1;
        }
    }
    header("Location:keranjang.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Produk | Yurryka Store</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <h2>Yurryka Store</h2>
    <div>
        <a href="dashboard.php">Dashboard</a>
        <a href="keranjang.php">Keranjang</a>
        <a href="logout.php">Logout</a>
    </div>
</div>


<div class="produk-container">

<?php foreach($produk as $p){ ?>
<div class="produk-card">
    <img src="<?= $p['foto']; ?>" alt="<?= $p['nama']; ?>">
    <h4><?= $p['nama']; ?></h4>
    <p class="harga">Rp <?= number_format($p['harga']); ?></p>
    <a href="?add=<?= $p['id']; ?>" class="btn">Tambah</a>
</div>
<?php } ?>

</div>

</body>
</html>
