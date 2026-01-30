<?php
session_start();
include "config/koneksi.php";

if(isset($_SESSION['login'])){
    header("Location:dashboard.php");
    exit;
}

$error = "";
if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // LOGIN SIMPLE (demo)
    if($user=="admin" && $pass=="admin"){
        $_SESSION['login'] = true;
        header("Location:dashboard.php");
        exit;
    }else{
        $error = "Username atau password salah";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login | Yurryka Store</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="login-body">

<div class="login-card">
    <h2>👜 Yurryka Store</h2>
    <p class="subtitle">Login untuk melanjutkan</p>

    <?php if($error){ ?>
        <div class="error"><?= $error; ?></div>
    <?php } ?>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Login</button>
    </form>
</div>

</body>
</html>
