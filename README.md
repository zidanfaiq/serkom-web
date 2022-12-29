# Website Bus AKAP (Antar Kota Antar Provinsi)
Website Bus AKAP merupakan website yang digunakan untuk pemesanan tiket Bus Antar Kota Antar Provinsi. Website ini mememiliki beberapa halaman diantaranya adalah menampilkan daftar kelas deskripsi bus, harga bus, form pesan tiket, daftar pemesanan, dan grafik pemesanan tiket.

## Features
- Login
- Register
- CRUD Pesan Tiket
- Grafik Pemesanan Tiket

## Tech
Website ini dibangun dengan menggunakan :
- [HTML](https://html.com/)
- [CSS](https://www.w3.org/Style/CSS/Overview.en.html)
- [PHP](https://www.php.net/)
- [Javascript](https://www.javascript.com/)
- [Bootstrap](https://getbootstrap.com/)
- [XAMPP](https://www.apachefriends.org/download.html)
- [Visual Studio Code](https://code.visualstudio.com/)

## Structure
```
📦serkom-web
 ┣ 📂assets
 ┃ ┣ 📂image
 ┃ ┃ ┣ 📜bisnis.jpg
 ┃ ┃ ┣ 📜ekonomi.jpg
 ┃ ┃ ┣ 📜eksekutif.jpg
 ┃ ┃ ┣ 📜kabin-bisnis.jpg
 ┃ ┃ ┣ 📜kabin-ekonomi.jpg
 ┃ ┃ ┗ 📜kabin-eksekutif.jpg
 ┃ ┣ 📂js
 ┃ ┃ ┗ 📜chart.js
 ┃ ┗ 📂style
 ┃ ┃ ┗ 📜style.css
 ┣ 📂database
 ┃ ┗ 📜tiket_bus.sql
 ┣ 📂proses
 ┃ ┣ 📜hapus.php
 ┃ ┣ 📜koneksi.php
 ┃ ┣ 📜login.php
 ┃ ┣ 📜logout.php
 ┃ ┣ 📜pesan.php
 ┃ ┣ 📜signup.php
 ┃ ┗ 📜update.php
 ┣ 📜detail.php
 ┣ 📜grafik_saya.php
 ┣ 📜harga_tiket.php
 ┣ 📜index.php
 ┣ 📜pesanan_saya.php
 ┣ 📜pesan_tiket.php
 ┣ 📜semua_grafik.php
 ┣ 📜semua_pesanan.php
 ┗ 📜ubah_data.php
 ```

## Installation
Pindahkan folder serkom-web kedalam folder.
```
c:\xampp\htdocs\
```
Start Apache dan MySQL pada XAMPP.

Import file tiket_bus.sql melalui browser dengan url : 
```
http://localhost/phpmyadmin/
```
Akses website melalui browser dengan url :
```
http://localhost/serkom-web/index.php
```