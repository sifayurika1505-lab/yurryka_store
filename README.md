# 👜 Yurryka Store

Aplikasi Yurryka Store merupakan aplikasi penjualan tas berbasis web yang dibuat untuk memenuhi tugas perkuliahan. Aplikasi ini menyediakan fitur login, manajemen produk, keranjang belanja, checkout, metode pembayaran, serta penyimpanan data ke dalam database MySQL.


## 👤 Identitas Pembuat

* **Nama** : Sifa Yurika
* **NIM** : 2341036
* **Prodi** : Teknik Informatika
* **Judul Aplikasi** : Aplikasi Penjualan Tas (Yurryka Store)


## 🛠️ Teknologi yang Digunakan

* **Bahasa Pemrograman** : PHP
* **Database** : MySQL
* **Web Server** : Apache (XAMPP)
* **Frontend** : HTML, CSS, Bootstrap


## ✨ Fitur Aplikasi

* Login dan Logout User
* Menampilkan daftar produk tas
* Menampilkan foto produk melalui link (URL)
* Menambahkan produk ke keranjang
* Mengubah dan menghapus isi keranjang
* Proses checkout pesanan
* Pilihan metode pembayaran
* Menyimpan data pesanan ke database
* Menampilkan halaman pesanan selesai


## 🗂️ Struktur Folder


yurryka_store/
│── assets/
│   └── css/
│       └── style.css
│
│── config/
│   └── koneksi.php
│
│── produk.php
│── keranjang.php
│── checkout.php
│── proses_checkout.php
│── selesai.php
│── login.php
│── logout.php
│── index.php


## ⚙️ Cara Menjalankan Aplikasi

1. Pastikan **XAMPP** sudah terinstall
2. Jalankan **Apache** dan **MySQL**
3. Salin folder `yurryka_store` ke direktori:
   C:/xampp/htdocs/
 
4. Buat database di phpMyAdmin dengan nama:
   yurryka_store
  
5. Import file SQL (jika tersedia)
6. Sesuaikan konfigurasi database pada file:

   config/koneksi.php
  
7. Akses aplikasi melalui browser:
   http://localhost/yurryka_store
   

## 🧾 Contoh Metode Pembayaran

* Transfer Bank
* E-Wallet
* Cash on Delivery (COD)


## 📌 Catatan

Aplikasi ini dibuat untuk keperluan pembelajaran dan tugas akademik. Pengembangan selanjutnya dapat menambahkan fitur admin, laporan penjualan, dan keamanan data yang lebih baik.


Terima kasih 🙏
