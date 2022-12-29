<?php
    include "koneksi.php"; //menyisipkan file koneksi.php

    $id_tiket = $_GET['id']; //mendapatkan id_tiket

    //perintah menghapus data berdasarkan id_tiket pada tabel pesan_tiket
    $sql = "DELETE FROM pesan_tiket WHERE id_tiket = '$id_tiket'";
    
    //membaca hasil query di database
    $query = $conn->query($sql) or die($conn->error.__LINE__);

    //jika perintah query berhasil
    if ($query){
        //menampilkan alert
        echo '<div class="alert alert-success">Berhasil Menghapus Data!</div>';
        header("Refresh: 2; URL=http://localhost/serkom-web/pesanan_saya.php");
    } else {
        echo '<div class="alert alert-success">Gagal Menghapus Data!</div>';
        header("Refresh: 2; URL=http://localhost/serkom-web/pesanan_saya.php");
    }

    echo (
        '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">'
    );
?>